<?php

use App\Http\Controllers\Auth\LoginController;
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

Route::redirect('/', 'products/')->name('main.url');

Route::prefix('')->group(function($router) {
    /** Auth routes */
    $router->get('/login', [LoginController::class, 'showLoginForm'])->name('showLogin');
    $router->post('/login', [LoginController::class, 'login'])->name('login');
    $router->post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

    /** products */
    $router->resource('products', ProductController::class)->middleware('auth');
});

