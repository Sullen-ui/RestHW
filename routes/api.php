<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
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
//GET
Route::get('/products', [ProductController::class, 'showProducts']);
Route::get('/products/{id}', [ProductController::class, 'showProduct']);


//POST
Route::post('/products', [ProductController::class, 'storeProducts']);

//DELETE
Route::delete('/products/{id}', [ProductController::class, 'deleteProduct']);
