<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Home;
use App\Http\Controllers\ProductManagementController;
use App\Http\Controllers\StickerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\TypeFormController;
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

Route::get('login', function () {
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
 
});

Auth::routes();

// -----------------------------login-------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate');
    Route::get('/logout', 'logout')->name('logout');
});

// ------------------------------ register ---------------------------------//
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register','storeUser')->name('register');    
});

// -------------------------- main dashboard ----------------------//
Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->middleware('auth')->name('home');
});

// -------------------------- user management ----------------------//
Route::controller(UserManagementController::class)->group(function () {
    Route::get('user/table', 'index')->middleware('auth')->name('user/table');
    Route::post('user/update', 'updateRecord')->name('user/update');
    Route::post('user/delete', 'deleteRecord')->name('user/delete');
    Route::get('user/profile', 'profileUser')->middleware('auth')->name('user/profile');

});

// -------------------------- type form ----------------------//
Route::controller(TypeFormController::class)->group(function () {
    Route::get('form/input/new', 'index')->middleware('auth')->name('form/input/new');

});


// product management

Route::controller(ProductManagementController::class)->group(function () {
    Route::get('product/table', 'index')->middleware('auth')->name('product/table');
    Route::get('product/from', 'showForm')->middleware('auth')->name('product/form');
    Route::post('product/add', 'store')->name('product/add');
    Route::post('product/update', 'updateRecord')->name('product/update');
    Route::post('product/delete', 'deleteRecord')->name('product/delete');


});

Route::controller(StickerController::class)->group(function () {
    Route::get('sticker/table', 'index')->middleware('auth')->name('sticker/table');
    Route::get('sticker/from', 'showForm')->middleware('auth')->name('sticker/form');
    Route::post('sticker/add', 'store')->name('sticker/add');
    Route::post('sticker/update', 'updateRecord')->name('sticker/update');
    Route::post('sticker/delete', 'deleteRecord')->name('sticker/delete');


});

Route::controller(Home::class)->group(function () {
    Route::get('/', 'index')->name('user/home');
    Route::get('product/{category}', 'getCategory')->name('product.category');
    Route::get('product/{id}/detail', 'showProductDetail')->name('product.detail');
    // Route::post('sticker/add', 'store')->name('sticker/add');
    // Route::post('sticker/update', 'updateRecord')->name('sticker/update');
    // Route::post('sticker/delete', 'deleteRecord')->name('sticker/delete');


});


Route::controller(CategoryController::class)->group(function () {
    Route::get('category/table', 'index')->middleware('auth')->name('category/table');
    Route::get('category/from', 'showForm')->middleware('auth')->name('category/form');
    Route::post('category/add', 'store')->name('category/add');
    Route::post('product/update', 'updateRecord')->name('category/update');
    Route::post('category/delete', 'deleteRecord')->name('category/delete');


});