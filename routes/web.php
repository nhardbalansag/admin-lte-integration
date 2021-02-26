<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ChartController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware('auth')->group(function(){

    // add category
    Route::get('/add-category', [ProductController::class, 'index']);
    Route::post('/submit-category/submit', [ProductController::class, 'createCategory']);
    // view all category
    Route::get('/category/view-all-publish', [ProductController::class, 'viewCategoryList']);
    Route::get('/category/edit-category/{id}', [ProductController::class, 'editCategoryIndex']);
    Route::post('/category/edit-category/submit/{id}', [ProductController::class, 'submitEditCategory']);

    // Products
    Route::get('/product/index', [ProductController::class, 'productIndex']);
    Route::post('/product/add-product', [ProductController::class, 'createProduct']);
    Route::get('/product/edit-product/{id}', [ProductController::class, 'editProductIndex']);
    Route::post('/product/edit-product/submit/{id}', [ProductController::class, 'submitEditProduct']);
    // view all products
    Route::get('/product/view-all-product', [ProductController::class, 'viewProductList']);

    // charts
    Route::get('/charts/all-charts', [ChartController::class, 'index']);
    // charts
    Route::get('/tables/data/tables', [ProductController::class, 'dataTable']);

     // charts
     Route::get('/logout', [ProductController::class, 'logout']);

});

