<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rack;

use App\Http\Requests\RackValidationRequest;

class RackController extends Controller
{

    public function index()
    {
        try {
            $data = Rack::all(
                'id',
                'name'
            );
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response([
                'message' => 'An error occurred while retrieving the data.'
            ], 500);
        }
    }


    public function store(RackValidationRequest $request)
    {
        if (Rack::where('name', '=', $request->get('name'))->exists()) {
            return response([
                'message' => ['Uno de los parametros ya exite.']
            ], 409);
        } else {
            try {
                $rack = Rack::create($request->all(
                    'name',
                    'description'
                ));
                return $rack;
            } catch (\Exception $e) {
                return response([
                    'message' => 'An error occurred while storing the data.'
                ], 500);
            }
        }
    }


    public function show($id)
    {
        try {
            $rack = Rack::findOrFail($id);
            return $rack;
        } catch (\Exception $e) {
            return response([
                'message' => 'Un error ocurrió al mostrar el dato.'
            ], 500);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $rack = Rack::findOrFail($id);
            $data = $rack->update($request->all(
                'name',
                'description'
            ));
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Error al actualizar'
            ]);
        }
    }


    public function destroy($id)
    {
        try {
            $data = Rack::destroy($id);
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Error al eliminar'
            ]);
        }
    }
}
