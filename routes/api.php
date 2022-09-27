<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// // });

// Route::get('/category/{category}', [CategoryController::class, 'show']);
// Route::get('category', [CategoryController::class, 'index']);

Route::get('categories/last', [CategoryController::class, 'getLastCategory']);
Route::get('categories/exact', [CategoryController::class, 'getExactCategory']);
Route::apiResource('categories', CategoryController::class);

Route::get('books/exact', [BookController::class, 'getExactBook']);
Route::get('books/exactISBN', [BookController::class, 'getExactBookISBN']);
Route::get('books/last', [BookController::class, 'getLastBook']);
Route::apiResource('books', BookController::class);
