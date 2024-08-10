<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

use App\Http\Requests\CategoryValidationRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $data = Category::all();
        return  response()->json($data, 200);
    }

    public function store(CategoryValidationRequest $request)
    {
        if (Category::where('name', '=', $request->get('name'))->exists()) {
            return response([
                'message' => ['Nombre el nombre de la categoria  ya exite.']
            ], 409);
        } else {
            $data = Category::create($request->all());
            return response()->json($data, 201);
        }
    }


    public function show($id)
    {
        $data = Category::find($id);
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $data = $category->update($request->all());
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $data = Category::destroy($id);
        return response()->json($data, 200);
    }
}
