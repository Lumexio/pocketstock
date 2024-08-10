<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use File;
use Illuminate\Support\Facades\DB;


class PhotoController extends Controller
{
    public function updatephoto(Request $request, $id)
    {

        $articulo = Articulo::find($id);
        $filename = $articulo->foto_articulo;
        if ($filename != null) {
            $path = public_path("/images/$filename");
            File::delete($path);
        }
        $extension = $request->file('foto_articulo')->guessExtension();
        if ($extension === 'jpg' || $extension === 'png') {
            $name_foto =  $articulo->name . '.' . $extension;
        } else if ($extension != 'jpg' || $extension != 'png') {
            $name_foto =  $articulo->name . '.' . 'jpg';
        }
        $request->foto_articulo->move(public_path('images'), $name_foto);
        $articulo["foto_articulo"] = $name_foto;
        $articulo->save();

        return $articulo;
    }
}
