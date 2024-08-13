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
        try {
            $loggeduser = Auth::id();
            $data = DB::table('users')
                ->where('users.id', '!=', $loggeduser)
                ->rightJoin('rols', 'users.rol_id', '=', 'rols.id')
                ->select(
                    'users.id',
                    'users.name',
                    'users.password',
                    'rols.name as rol_name',
                    'users.rol_id'
                )
                ->get();

            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred.'], 500);
        }
    }

    public function store(UserValidationRequest $request)
    {
        try {
            $data = User::create($request->all(
                'name',
                'password',
                'rol_id'
            ));

            return response()->json($data, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred.'], 500);
        }
    }

    public function show($id)
    {
        try {
            $data = User::find($id);
            if (!$data) {
                return response()->json(['message' => 'User not found.'], 404);
            }
            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred.'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                return response()->json(['message' => 'User not found.'], 404);
            }

            if ($request->password != $user->password) {

                $request->merge([
                    'password' => Hash::make($request->password)
                ]);
            }
            $data = $user->update($request->all(
                'name',
                'password',
                'rol_id'
            ));

            return response()->json($data, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred.'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $deleted = User::destroy($id);
            if (!$deleted) {
                return response()->json(['message' => 'User not found.'], 404);
            }
            return response()->json(['message' => 'User deleted successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred.'], 500);
        }
    }

    function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'name' => ['required'],
                'password' => ['required'],
            ]);
            $user = User::where('name', $request->name)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['message' => 'Invalid credentials.'], 404);
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
                return response()->json($response, 200);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred.'], 500);
        }
    }
}
