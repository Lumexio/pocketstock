<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crossbar;

use App\Http\Requests\CrossbarValidationRequest;

class CrossbarController extends Controller
{

    public function index()
    {
        try {
            $data =  Crossbar::all(
                'id',
                'name'
            );
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Error al mostrar las barras'
            ]);
        }
    }


    public function store(CrossbarValidationRequest $request)
    {
        if (Crossbar::where('name', '=', $request->get('name'))->exists()) {
            return response([
                'message' => ['Uno de los parametros ya exite.']
            ], 409);
        } else {
            $data = Crossbar::create($request->all());
            return response()->json($data, 201);
        }
    }

    public function show($id)
    {
        return Crossbar::find($id);
    }

    public function update(Request $request, $id)
    {
        $crossbar = Crossbar::find($id);
        $data = $crossbar->update($request->all());
        return response()->json($data, 200);
    }


    public function destroy($id)
    {
        $data = Crossbar::destroy($id);
        return response()->json($data, 200);
    }
}
