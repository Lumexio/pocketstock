<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Articulo;

use App\Http\Requests\ArticuleValidationRequest;

use Illuminate\Support\Facades\Auth;


class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dat = DB::table('products')
            ->leftJoin('users', 'products.user_id', '=', 'users.id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('status', 'products.status_id', '=', 'status.id')
            ->leftJoin('racks', 'products.rack_id', '=', 'racks.id')
            ->leftJoin('crossbars', 'products.crossbar_id', '=', 'crossbars.id')
            ->select('products.id', 'products.name', 'products.quantity', 'products.description', 'products.foto_articulo', 'users.name', 'categories.name', 'status.name', 'crossbars.name', 'racks.name')
            ->get()
            ->map(
                function ($item) {
                    $item->foto_articulo = url("images/{$item->foto_articulo}");
                    return $item;
                }
            );
        return response()->json($dat);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * dentro hay una validacion para saber si el nombre del articulo ya exite en los registros.
     */
    public function store(ArticuleValidationRequest $request)
    {


        if (Articulo::where('name', '=', $request->get('name'))->exists()) {
            return response([
                'message' => ['Uno de los parametros ya exite.']
            ], 409);
        } else {
            $photo = $request->file('foto_articulo');
            $articulo = $request->all();
            $articulo['user_id'] = Auth::id();
            if (isset($photo)) {
                $extension = $request->file('foto_articulo')->guessExtension();
                $name_foto =  $request->name . '.' . $extension;
                $request->foto_articulo->move(public_path('images'), $name_foto);
                $articulo["foto_articulo"] = $name_foto;
            }
            $articulo = Articulo::create($articulo);

            return $articulo;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Articulo::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $articulo = Articulo::find($id);
        //Obtener nombre venidero
        $newname = $request->name;
        //newname de archivo ya guardado
        $filename = $articulo->foto_articulo;

        //lugar donde esta guardado el archivo existente
        $oldpath = public_path("/images/$filename");
        $filename =  $newname . '.' . "jpg";
        $newpath = public_path("/images/$filename");
        rename($oldpath, $newpath);
        $articulo["foto_articulo"] = $filename;
        $articulo->update($request->all());
        $articulo['user_id'] = Auth::id();
        return $articulo;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // $articulo = Articulo::find($id);

        // $filename = $articulo->foto_articulo;
        // $path = public_path("/images/$filename");

        // File::delete($path);
        try {
            $articulo = Articulo::destroy($id);
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Articulo eliminado'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
