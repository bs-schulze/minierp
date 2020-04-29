<?php

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
use App\Http\Resources\ProductResource;
use App\Product;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/api/product/store', 'ProductController@store');

Route::get('/api/product/list', function () {
    return new ProductResource(Product::all());
});
