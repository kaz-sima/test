<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function(){
    Route::middleware('guest:admin')->group(function(){
            
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
            
        Route::get('password/rest', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    });
    Route::middleware('auth:admin')->group(function(){
                
        Route::get('logout', 'Auth\LoginController@logout')->name('logout');
        Route::get('/home', 'HomeController@index')->name('top');
                
        // book manage
        Route::get('/book', 'BooksController@index')->name('book');
        Route::post('/booksadd','BooksController@register');
        Route::get('/booksadd','BooksController@add');
        Route::delete('/book/{book}','BooksController@destroy');
        Route::get('/booksedit/{book}', 'BooksController@edit');
        Route::post('/bookupdate', 'BooksController@update');
        
     });
});
        
// enabling the mail verification
Auth::routes(['verify' => true]);
    
Route::get('/home', 'HomeController@index')->name('user.top');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('profile/edit','ProfileController@edit')->name('profile.edit');
Route::get('profile/update','ProfileController@confirm')->name('profile.update');
Route::post('profile/edit','ProfileController@validation');
Route::post('profile/update','ProfileController@update');
