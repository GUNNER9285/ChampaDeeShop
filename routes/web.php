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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
]);

Route::group(['prefix' => 'user'], function (){
    Route::get('/signup',[
        'uses' => 'UserController@getSignup',
        'as' => 'user.signup'
    ]);

    Route::post('/signup',[
        'uses' => 'UserController@postSignup',
        'as' => 'user.signup'
    ]);

    Route::get('/signin',[
        'uses' => 'UserController@getSignin',
        'as' => 'user.signin'
    ]);

    Route::post('/signin',[
        'uses' => 'UserController@postSignin',
        'as' => 'user.signin'
    ]);
    Route::get('/profile',[
        'uses' => 'UserController@getProfile',
        'as' => 'user.profile'
    ]);

    Route::get('/history',[
        'uses' => 'UserController@getHistory',
        'as' => 'user.history'
    ]);

    Route::get('/logout',[
        'uses' => 'UserController@getLogout',
        'as' => 'user.logout'
    ]);
});

Route::get('/howto', [
    'uses' => 'USerController@getHowTo',
    'as' => 'user.howto'
]);

Route::get('/transfer/{id}', [
    'uses' => 'ProductController@getTransfer',
    'as' => 'product.transfer'
]);

Route::post('/transfer', [
    'uses' => 'ProductController@postTransfer',
    'as' => 'product.acceptTransfer'
]);

Route::get('/get-to-cart/{id}', [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
]);
Route::get('/shopping-cart', [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
]);
Route::get('/reduce/{id}', [
    'uses' => 'ProductController@getReduceByOne',
    'as' => 'product.reduceByOne'
]);
Route::get('/remove/{id}', [
    'uses' => 'ProductController@getRemoveItem',
    'as' => 'product.removeItem'
]);

Route::get('/search', [
    'uses' => 'ProductController@getSearch',
    'as' => 'product.search'
]);
Route::get('/product/{id}', [
    'uses' => 'ProductController@getProduct',
    'as' => 'product.show'
]);

Route::get('/checkout',[
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout'
]);

Route::post('/checkout',[
    'uses' => 'ProductController@postCheckout',
    'as' => 'checkout'
]);

Route::get('/cancelcart',[
    'uses' => 'ProductController@getCancelCart',
    'as' => 'cancelCart'
]);

Route::get('/category',[
    'uses' => 'ProductController@getPageCategory',
    'as' => 'product.category'
]);

Route::get('/category/{id}',[
    'uses' => 'ProductController@getCategoryByType',
    'as' => 'product.categoryByType'
]);

Route::group(['prefix' => 'admin'], function (){
    Route::get('/show', [
        'uses' => 'ProductController@getShowProduct',
        'as' => 'admin.showProduct'
    ]);
    Route::get('/create', [
        'uses' => 'ProductController@getCreateProduct',
        'as' => 'admin.createProduct'
    ]);
    Route::post('/create', [
        'uses' => 'ProductController@postCreateProduct',
        'as' => 'admin.createProduct'
    ]);
    Route::get('/edit/{id}', [
        'uses' => 'ProductController@getEditProduct',
        'as' => 'admin.editProduct'
    ]);
    Route::post('/edit/{id}', [
        'uses' => 'ProductController@postEditProduct',
        'as' => 'admin.editProduct'
    ]);
    Route::get('/delete/{id}', [
        'uses' => 'ProductController@getDeleteProduct',
        'as' => 'admin.deleteProduct'
    ]);
    Route::get('/create_categories', [
        'uses' => 'ProductController@getCreateCategory',
        'as' => 'admin.createCategory'
    ]);
    Route::post('/create_categories', [
        'uses' => 'ProductController@postCreateCategory',
        'as' => 'admin.createCategory'
    ]);
    Route::get('/delete_categories', [
        'uses' => 'ProductController@getDeleteCategory',
        'as' => 'admin.delCategory'
    ]);
    Route::get('/delete_categories/{id}', [
        'uses' => 'ProductController@getDeleteCategoryOne',
        'as' => 'admin.delCategoryOne'
    ]);
    Route::get('/check_bill', [
        'uses' => 'ProductController@getCheckBill',
        'as' => 'admin.checkBill'
    ]);
    Route::get('/accept_bill/{id}', [
        'uses' => 'ProductController@getAcceptBill',
        'as' => 'admin.acceptBill'
    ]);
    Route::get('/cancel_bill/{id}', [
        'uses' => 'ProductController@getCancelBill',
        'as' => 'admin.cancelBill'
    ]);
    Route::get('/check_send', [
        'uses' => 'ProductController@getCheckSend',
        'as' => 'admin.checkSend'
    ]);
    Route::post('/accept_send/{id}', [
        'uses' => 'ProductController@getAcceptSend',
        'as' => 'admin.acceptSend'
    ]);
    Route::get('/send', [
        'uses' => 'ProductController@getSend',
        'as' => 'admin.send'
    ]);
    Route::get('/report', [
        'uses' => 'ProductController@getReport',
        'as' => 'admin.report'
    ]);
    Route::post('/report', [
        'uses' => 'ProductController@getCustomReport',
        'as' => 'admin.customReport'
    ]);
});