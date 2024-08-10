<?php

//use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use Spatie\Activitylog\Models\Activity;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('products', 'ProductController');
    Route::post('/updatephoto/{id}', 'PhotoController@updatephoto');
    Route::resource('brands', 'MarcaController');
    Route::resource('categories', 'CategoryController');
    Route::resource('crossbars', 'CrossbarController');
    Route::resource('racks', 'RackController');
    Route::resource('users', 'UserController');

    //Route::resource('rol', 'RolController');
    //Route::resource('tipo', 'TipoController');
    // Route::resource('proveedor', 'ProveedorController');
    // Route::resource('status', 'StatusController');
    //Route::resource('activitylog', 'ActivitylogController');
});

Route::post('login', [UserController::class, 'login']);
