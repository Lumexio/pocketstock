<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;


class StatusController extends Controller
{

    public function index()
    {
        $data = Status::all();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $status = Status::create($request->all());

        return $status;
    }

    public function show($id)
    {
        return Status::find($id);
    }


    public function update(Request $request, $id)
    {
        $status = Status::find($id);
        $status->update($request->all());

        return $status;
    }
    public function destroy($id)
    {
        return Status::destroy($id);
    }
}
