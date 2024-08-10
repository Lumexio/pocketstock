<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use File;
use Illuminate\Support\Facades\DB;


class PhotoController extends Controller
{
    public function updatephoto(Request $request, $id)
    {

        $product = Product::find($id);
        $filename = $product->foto_product;
        if ($filename != null) {
            $path = public_path("/images/$filename");
            File::delete($path);
        }
        $extension = $request->file('foto_product')->guessExtension();
        if ($extension === 'jpg' || $extension === 'png') {
            $name_foto =  $product->name . '.' . $extension;
        } else if ($extension != 'jpg' || $extension != 'png') {
            $name_foto =  $product->name . '.' . 'jpg';
        }
        $request->foto_product->move(public_path('images'), $name_foto);
        $product["foto_product"] = $name_foto;
        $product->save();

        return $product;
    }
}
