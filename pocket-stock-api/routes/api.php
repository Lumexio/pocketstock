<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('products', 'ProductController');
    Route::resource('categories', 'CategoryController');
    Route::resource('crossbars', 'CrossbarController');
    Route::resource('racks', 'RackController');
    Route::resource('users', 'UserController');

    Route::resource('rols', 'RolController');
    Route::post('logout', [UserController::class, 'logout']);
    //Route::resource('status', 'StatusController');
});

Route::post('login', [UserController::class, 'login']);
