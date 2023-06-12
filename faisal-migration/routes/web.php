<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get( '/', function () {
 return view( 'welcome' );
} );

Route::get( '/excerptDescription', [PostController::class, 'getExcerptDescription'] );

Route::get( '/distinct', [PostController::class, 'distinct'] );

Route::get( '/firstDes', [PostController::class, 'firstDes'] );

Route::get( '/getDescription', [PostController::class, 'getDescription'] );

Route::get( '/pluck', [PostController::class, 'pluck'] );

Route::post( '/insertData', [PostController::class, 'insertData'] );

Route::put( '/posts/{id}', [PostController::class, 'update'] );

Route::delete( '/delPost', [PostController::class, 'destroy'] );

Route::get( '/question11', [PostController::class, 'countPrice'] );

Route::get( '/question12', [PostController::class, 'question12'] );

Route::get( '/whereBetween', [PostController::class, 'whereBetween'] );

Route::get( '/increment', [PostController::class, 'increment'] );