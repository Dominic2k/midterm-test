<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\CreateTable;
use  App\Http\Controllers\PageController;
use  App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AuthController;

//Route::get('/', [CreateTable::class,'createTable']);
Route::get('/', [PageController::class,'getIndex'])->name('homepage');

Route::get('homepage/product', [PageController::class,'getProduct']);
Route::get('homepage/type_product/{id}', [PageController::class,'getTypeProduct']);

Route::get('/detail/{id}', [PageController::class,'getDetail'])->name('product.detail');

Route::post('/comment/{id}', [PageController::class,'newComment']);
Route::get('/about', [PageController::class,'getAbout'])->name('about');
Route::get('/contact', [PageController::class,'getContact'])->name('contact');

Route::get('/admin', [AdminPageController::class,'index']);

Route::get('/add_product', [AdminPageController::class,'create'])->name('add_product');
Route::post('/storeProduct', [AdminPageController::class,'store']);

Route::get('/editProduct/{id}', [AdminPageController::class,'edit']);
Route::post('/updateProduct', [AdminPageController::class,'update']);

Route::post('/deleteProduct/{id}', [AdminPageController::class,'destroy']);



Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('registerHandle');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('loginHandle');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

