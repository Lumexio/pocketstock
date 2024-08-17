<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Http\Requests\ProductValidationRequest;

class ProductController extends Controller
{

    public function index()
    {
        try {
            $dat = Product::query()
                ->leftJoin('users', 'products.user_id', '=', 'users.id')
                ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                ->leftJoin('status', 'products.status_id', '=', 'status.id')
                ->leftJoin('racks', 'products.rack_id', '=', 'racks.id')
                ->leftJoin('crossbars', 'products.crossbar_id', '=', 'crossbars.id')
                ->select(
                    'products.id',
                    'products.name',
                    'products.quantity',
                    'products.description',
                    'users.name as user_name',
                    'categories.name as category_name',
                    'products.category_id',
                    'products.status_id',
                    'products.rack_id',
                    'products.crossbar_id',
                    'status.name as status_name',
                    'crossbars.name as crossbar_name',
                    'racks.name as rack_name'
                )
                ->get();
            return response()->json($dat, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Error al mostrar los productos'
            ]);
        }
    }

    public function store(ProductValidationRequest $request)
    {
        try {
            $request->merge(['user_id' => auth()->user()->id]);
            $product = $request->all(
                'name',
                'quantity',
                'description',
                'category_id',
                'rack_id',
                'crossbar_id',
                'status_id',
                'user_id'
            );

            $data = Product::create($product);

            return response()->json($data, 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' =>  $th->getMessage(),
                'code' => 500,
                'message' => 'Error al guardar'
            ]);
        }
    }


    public function show($id)
    {
        try {
            $data = Product::find($id);
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Error al mostrar el producto'
            ]);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            $data = $product->update($request->all(
                'name',
                'quantity',
                'description',
                'category_id',
                'rack_id',
                'crossbar_id',
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
            $product = Product::destroy($id);
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Product eliminado'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'code' => 500,
                'message' => 'Error al eliminar'
            ]);
        }
    }
}
