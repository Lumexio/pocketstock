<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserValidationRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $loggeduser = Auth::id();
        $data = DB::table('users')
            ->where('users.id', '!=', $loggeduser)
            ->rightJoin('rols', 'users.rol_id', '=', 'rols.id')
            ->select(
                'users.id',
                'users.name',
                'users.password',
                'rols.name as rol_name'
            )
            ->get();

        return response()->json($data, 200);
    }

    public function store(UserValidationRequest $request)
    {
        $data = User::create($request->all());

        return response()->json($data, 201);
    }

    public function show($id)
    {
        $data = User::find($id);
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $user->update($request->all());
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        return User::destroy($id);
    }


    function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);
        $user = User::where('name', $request->name)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['Las credentials no concuerdan con ningun registro.']
            ], 404);
        }
        if (Auth::attempt($credentials)) {
            $token = $user->createToken('my-app-token')->plainTextToken;

            auth()->setUser($user);
            $request->session()->regenerate();
            $response = [
                'user' => $user,
                'token' => $token,
            ];

            Auth::login($user, true);
            $request->session()->save();
            return response($response, 200);
        }
    }
}
