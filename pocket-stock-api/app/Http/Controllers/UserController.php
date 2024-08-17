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
            if ($request->filled('password')) {
                $user->password = $request->password;
            }
            if ($request->filled('name')) {
                $user->name = $request->name;
            }
            if ($request->filled('rol_id')) {
                $user->rol_id = $request->rol_id;
            }
            $user->save();
            return response()->json(['message' => 'User updated successfully.', 'user' => $user], 200);
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

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('name', 'password'), true)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {


        $request->user()->tokens()->delete();
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
