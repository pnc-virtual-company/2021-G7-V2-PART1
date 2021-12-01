<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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

// ----------------------- Public Route-------------------------

/* Create & Login Account*/
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::get('users', [UserController::class, 'getAllUser']);
Route::get('users/{id}', [UserController::class, 'getUserId']);

Route::group(['middleware'=>['auth:sanctum']], function() {

    // _____________________Private Route____________________
    Route::post('logout', [UserController::class, 'logout']);
    Route::put('users/{id}', [UserController::class, 'updateUser']);
    Route::delete('users/{id}', [UserController::class, 'deleteUser']);

});

// ____________________Category Route___________________
Route::get('categories', [CategoryController::class, 'getAllCategory']);
Route::get('categories/{id}', [CategoryController::class, 'categoryId']);
Route::post('categories', [CategoryController::class, 'createCategory']);
Route::put('categories/{id}', [CategoryContrller::class, 'updateCategory']);
Route::delete('categories/{id}', [CategoryController::class, 'deleteCategory']);



















