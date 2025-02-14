<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;


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

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::prefix('foods')->group(function () {
    Route::middleware(['auth:sanctum', 'roleId:1'])->group(function () {
        Route::post('/create', [FoodController::class, 'createFood']);
        Route::post('/update/{id}', [FoodController::class, 'updateFood']);
        Route::delete('/delete/{id}', [FoodController::class, 'deleteFood']);
        Route::get('/search/{id}', [FoodController::class, 'searchFood']);
    });
});

Route::prefix('category')->group(function () {
    Route::middleware(['auth:sanctum','roleId:2'])->group(function(){
        Route::post('/create', [CategoryController::class, 'createCategory']);
        Route::put('/update/{id}', [CategoryController::class, 'updateCategory']);
        Route::delete('/delete/{id}', [CategoryController::class, 'deleteCategory']);
        Route::get('/search/{id}', [CategoryController::class, 'searchCategory']);
    });
});
