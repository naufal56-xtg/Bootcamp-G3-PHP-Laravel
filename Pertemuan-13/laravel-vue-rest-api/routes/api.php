<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/products', [ProductController::class, 'index'])->name('');
Route::get('/products/detail/{id}', [ProductController::class, 'show'])->name('');
Route::post('/products/store', [ProductController::class, 'store'])->name('');
Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('');
Route::delete('/products/delete/{id}', [ProductController::class, 'delete'])->name('');
