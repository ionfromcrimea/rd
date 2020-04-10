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

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::group([
    'middleware' => 'auth',
    'namespace' => 'Admin',
    'prefix' => 'admin',
], function() {
    Route::group(['middleware' => 'is_admin'], function () {
        Route::get('/orders', 'OrderController@index')->name('home');
    });
    Route::resource('categories', 'CategoryController');
    Route::resource('products', 'ProductController');
});

Route::get('logout', 'Auth\LoginController@logout')->name('get-logout');

Route::get('/', 'MainConrtoller@index')->name('index');

Route::get('/categories', 'MainConrtoller@categories')->name('categories');

Route::group(['prefix' => 'basket'], function () {
    Route::post('/add/{id}', 'BasketController@basketAdd')->name('basket-add');

    Route::group(['middleware' => 'basket_not_empty',], function() {
        Route::get('/', 'BasketController@basket')->name('basket');
        Route::get('/place', 'BasketController@basketPlace')->name('basket-place');
        Route::post('/confirm', 'BasketController@basketConfirm')->name('basket-confirm');
        Route::post('/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
    });
});

Route::get('/{category}', 'MainConrtoller@category')->name('category');

Route::get('/{category}/{product?}', 'MainConrtoller@product')->name('product');


