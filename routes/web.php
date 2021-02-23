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
 Route::get('/','PageController@getIndex')->name('index');

 Route::get('index',[
    'as'=>'trang-chu',
    'uses' =>'PageController@getIndex'
]);

/* Route::get('index','PageController@getIndex')->name('index'); */

Route::get('loai-san-pham/{type?}',[
    'as' =>'loaisanpham',
    'uses' =>'PageController@getProductType'
]);

Route::get('chi-tiet-san-pham/{id}',[
    'as' =>'chitietsanpham',
    'uses' =>'PageController@getDetailProduct'
]);

Route::get('lien-he',[
    'as' =>'lienhe',
    'uses' =>'PageController@getContact'
]);

Route::get('gioi-thieu',[
    'as' =>'gioithieu',
    'uses' =>'PageController@getAbout'
]);
Route::get('search',[
    'as' => 'search-product',
    'uses' => 'PageController@search'
]);



//login,Logout,Register
/* Auth::routes(); */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('login','PageController@getLogin')->name('get.login');
Route::post('login','PageController@postLogin')->name('post.login');
Route::get('register','PageController@getRegister')->name('get.register');
Route::post('register','PageController@postRegister')->name('post.register'); 
Route::get('logout','PageController@logout')->name('logout');
/* Route::match(['post'], '/register', 'PageController@postRegister')->name('post.register'); */

/// admin
Route::get('admin/login','AdminController@getLoginAdmin')->name('get.login.admin');
Route::post('admin/login','AdminController@postLoginAdmin')->name('post.login.admin');
/* Route::middleware(['auth'])->group(function () {
    
    
}); */
Route::get('admin/create','AdminController@getCreateProduct')->name('get.create.product');
Route::post('admin/create','AdminController@postCreateProduct')->name('post.create.product');
Route::get('admin/logout','AdminController@Logout')->name('logout.admin');


 
