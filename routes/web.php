<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ProductController::class,'index'])->name('products.index');
Route::get('product/create',[ProductController::class,'create'])->name('products.create');
Route::post('product/store',[ProductController::class,'store'])->name('products.store');
Route::get('product/{id}/edit',[ProductController::class,'edit']);
Route::put('product/{id}/update',[ProductController::class,'update']);
Route::get('product/{id}/delete',[ProductController::class,'delete']);

