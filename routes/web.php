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

Auth::routes();

Route::group(['namspace' => 'Auth'],function(){
    Route::get('register','RegisterController@getRegister')->name('get.register');
    Route::post('register','RegisterController@postRegister')->name('post.register');
    Route::get('confirm-register','RegisterController@confirmRegister')->name('confirm.register');

    Route::get('login','LoginController@getLogin')->name('get.login');
    Route::post('login','LoginController@postLogin')->name('post.login');

    Route::get('logout', 'LoginController@getLogout')->name('get.logout');

    Route::get('forgot-password', 'ForgotPasswordController@getResetPassword')->name('get.reset.password');
    Route::post('forgot-password', 'ForgotPasswordController@sendCodeResetPassword');
    Route::get('get-code', 'ForgotPasswordController@getCodeResetPassword')->name('get.code.password');
    Route::post('get-code', 'ForgotPasswordController@setCodeResetPassword');
    Route::get('get-password', 'ForgotPasswordController@getPassword')->name('get.password');
    Route::post('get-password', 'ForgotPasswordController@setPassword');
});

Route::get('/', 'HomeController@index')->name('home');

Route::get('category/{slug}-{id}','CategoryController@getListProduct')->name('get.list.product');
Route::get('product/{slug}-{id}','ProductDetailController@productDetail')->name('get.detail.product');

Route::prefix('shopping')->group(function(){
    Route::get('/add/{id}','ShoppingCartController@addProduct')->name('add.shopping.cart');
    Route::get('/cart','ShoppingCartController@getListShoppingCart')->name('get.list.shopping.cart');
    Route::get('/','ShoppingCartController@destroyShoppingCart')->name('destroy.shopping.cart');
    Route::get('/delete/{id}','ShoppingCartController@deleteProductItem')->name('delete.product.shopping.cart');
});

Route::group(['prefix' => 'shopping', 'middleware' => 'CheckLoginUser'],function (){
    Route::get('/cart/payment','ShoppingCartController@getFormPay')->name('get.form.pay');
    Route::get('/cart/online-payment','ShoppingCartController@onlinePayment')->name('online.pay.form');
    Route::get('/cart/return-payment','ShoppingCartController@onlinePaymentReturn')->name('payment.return');
    Route::get('/cart/paypal-payment','ShoppingCartController@onlinePaymentPaypal')->name('paypal.form');
    Route::post('/cart/online-payment','ShoppingCartController@onlinePaymentHandling');
    Route::post('/cart/paypal-payment','ShoppingCartController@onlinePaymentPaypalHandling');
    Route::post('/cart/payment','ShoppingCartController@saveInfoShoppingCart');
});

Route::prefix('')->group(function(){
    Route::get('contact','ContactController@getContact')->name('get.contact');
    Route::post('contact','ContactController@saveContact');
});

Route::group(['prefix' => 'ajax', 'middleware' => 'CheckLoginUser'],function () {
    Route::post('/rating/{id}', 'RatingController@saveRating')->name('post.rating.product');
});

Route::group(['prefix' => 'ajax'],function () {
    Route::post('/view-product', 'HomeController@renderViewProduct')->name('view.product');
});

Route::prefix('')->group(function(){
    Route::get('article', 'ArticleController@getListArticle')->name('get.list.article');
    Route::get('article/{slug}-{id}', 'ArticleController@getDetailArticle')->name('get.detail.article');
});

Route::prefix('page-static')->group(function (){
   Route::get('aboutUs', 'PageStaticController@aboutUs')->name('get.aboutUs');
});

Route::group(['middleware' => 'CheckLoginUser'],function () {
    Route::get('user', 'UserController@index')->name('view.info.user');
});

