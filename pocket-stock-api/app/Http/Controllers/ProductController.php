<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Http\Requests\ArticuleValidationRequest;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{

    public function index()
    {
        $dat = DB::table('products')
            ->leftJoin('users', 'products.user_id', '=', 'users.id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('status', 'products.status_id', '=', 'status.id')
            ->leftJoin('racks', 'products.rack_id', '=', 'racks.id')
            ->leftJoin('crossbars', 'products.crossbar_id', '=', 'crossbars.id')
            ->select('products.id', 'products.name', 'products.quantity', 'products.description', 'products.foto_product', 'users.name', 'categories.name', 'status.name', 'crossbars.name', 'racks.name')
            ->get()
            ->map(
                function ($item) {
                    $item->foto_product = url("images/{$item->foto_product}");
                    return $item;
                }
            );
        return response()->json($dat);
    }

    public function store(ArticuleValidationRequest $request)
    {


        if (Product::where('name', '=', $request->get('name'))->exists()) {
            return response([
                'message' => ['Uno de los parametros ya exite.']
            ], 409);
        } else {
            $photo = $request->file('foto_product');
            $product = $request->all();
            $product['user_id'] = Auth::id();
            if (isset($photo)) {
                $extension = $request->file('foto_product')->guessExtension();
                $name_foto =  $request->name . '.' . $extension;
                $request->foto_product->move(public_path('images'), $name_foto);
                $product["foto_product"] = $name_foto;
            }
            $data = Product::create($product);

            return response()->json($data, 201);
        }
    }


    public function show($id)
    {
        return Product::find($id);
    }


    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        //Obtener nombre venidero
        $newname = $request->name;
        //newname de archivo ya guardado
        $filename = $product->foto_product;

        //lugar donde esta guardado el archivo existente
        $oldpath = public_path("/images/$filename");
        $filename =  $newname . '.' . "jpg";
        $newpath = public_path("/images/$filename");
        rename($oldpath, $newpath);
        $product["foto_product"] = $filename;
        $product->update($request->all());
        $product['user_id'] = Auth::id();
        return $product;
    }

    public function destroy($id)
    {

        // $product = Product::find($id);

        // $filename = $product->foto_product;
        // $path = public_path("/images/$filename");

        // File::delete($path);
        try {
            $product = Product::destroy($id);
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Product eliminado'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
