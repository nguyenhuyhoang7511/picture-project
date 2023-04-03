<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::middleware('auth:sanctum')->group(function () {

});



// WITH ADMIN 
Route::get('/users/list', [UserController::class,'getUsersForAdmin']);
Route::get('/users/{id}/detail', [UserController::class,'getUserForAdmin']);
Route::post('/users/{id}/block', [UserController::class,'blockUser']);
Route::post('/users/{id}/remove', [UserController::class,'removeUser']);
Route::post('/products/create', [ProductController::class,'createProduct']);
Route::post('/products/{id}/delete', [ProductController::class,'removeProduct']);



// WITH USER
Route::post('/users/profile', [User::class,'profile']);
Route::post('/users/profile/edit', [User::class,'editProfile']);


// CẢ HAI 
Route::get('/products/list', [ProductController::class,'getAllProduct']);
Route::get('/products/{id}/detail', [ProductController::class,'getProductDetail']);


// COMMENT
Route::post('/products/{id}/comment/create', [CommentController::class,'store']);
Route::get('/comments/list/products{productId}', [CommentController::class,'getCommentsInProduct']);
Route::get('/comments/{comment}/products', [CommentController::class,'getCommentsDetail']);
