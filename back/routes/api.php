<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;

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

// _____________________Public Route____________________
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::get('users', [UserController::class, 'getAllUser']);
Route::get('users/{id}', [UserController::class, 'getUserId']);

// _____________________Private Route____________________
Route::put('users/{id}', [UserController::class, 'updateUser']);
Route::delete('users/{id}', [UserController::class, 'deleteUser']);


// ____________________Category Route___________________
Route::get('categories', [CategoryController::class, 'getAllCategory']);
Route::get('categories/{id}', [CategoryController::class, 'categoryId']);
Route::post('categories', [CategoryController::class, 'createCategory']);
Route::put('categories/{id}', [CategoryController::class, 'updateCategory']);
Route::delete('categories/{id}', [CategoryController::class, 'deleteCategory']);
Route::get ('categories/search/{categoryName}',[CategoryController::class,'search']);


// ________________________Event Route___________________

Route::get('events', [EventController::class, 'getAllEvent']);
Route::get('events/{id}', [EventController::class, 'eventId']);
Route::post('events', [EventController::class, 'store']);
Route::put('events/{id}', [EventController::class, 'updateEvent']);
Route::delete('events/{id}', [EventController::class, 'deleteEvent']);
Route::get('events/search/{eventName}', [EventController::class, 'search']);

// ________________________Event Route___________________

Route::get('/countries', [CountryController::class, 'getCountries']);

