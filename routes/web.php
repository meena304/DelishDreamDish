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

// Route::get('/', function () {
    // return view('welcome');
// });

// Route::get('googleLogin', function () {
//     return view('frontend.googleLogin');
// });
Route::get('auth/google', 'UserController@redirectToGoogle');
Route::get('auth/google/callback', 'UserController@handleGoogleCallback'); 

Route::post('/paytm-callback', 'FrontendController@paytmCallback');

# AdminController
Route::get('admin/dashboard','AdminController@dashboard');
Route::get('admin/category','AdminController@category');
Route::get('admin/delivery_boy','AdminController@delivery_boy');
Route::get('admin/coupon','AdminController@coupon');
Route::get('admin/dish','AdminController@dish');
Route::get('admin/slider','AdminController@slider');
Route::get('admin/about','AdminController@about');
Route::get('admin/order','AdminController@order');
Route::get('admin/order_items/{id}','AdminController@order_items');
Route::get('admin/invoice/{id}','AdminController@invoice');

Route::post('order_status/update','AdminController@ord_status_update');

#CategoryController
Route::post('category/add','CategoryController@add');
Route::get('category/delete/{id}','CategoryController@delete');
Route::get('category/edit/{id}','CategoryController@edit');
Route::post('category/update','CategoryController@update');
Route::get('category/all_category','CategoryController@all_category');


# DeliveryboyController
Route::post('delivery_boy/add','DeliveryboyController@add');
Route::get('delivery_boy/delete/{id}','DeliveryboyController@delete');
Route::get('delivery_boy/edit/{id}','DeliveryboyController@edit');
Route::post('delivery_boy/update','DeliveryboyController@update');

# CouponController
Route::post('coupon/add','CouponController@add');
Route::get('coupon/delete/{id}','CouponController@delete');
Route::get('coupon/edit/{id}','CouponController@edit');
Route::post('coupon/update','CouponController@update');

# DishController
Route::post('dish/add','DishController@add');
Route::get('dish/delete/{id}','DishController@delete');
Route::get('dish/edit/{id}','DishController@edit');
Route::post('dish/update','DishController@update');
Route::get('dish/add_image/{id}','DishController@add_image');
Route::get('dish/delete_image/{id}','DishController@delete_image');
Route::post('dish/more_image','DishController@dish_images');


# SliderController
Route::post('slider/add','SliderController@add');
Route::get('slider/delete/{id}','SliderController@delete');
Route::get('slider/edit/{id}','SliderController@edit');
Route::post('slider/update','SliderController@update');

#AboutController
Route::post('about/add','AboutController@add');
Route::get('about/delete/{id}','AboutController@delete');
Route::get('about/edit/{id}','AboutController@edit');
Route::post('about/update','AboutController@update');

// ReviewController
Route::post('add_review','ReviewController@add_review');

# FrontendController
Route::get('/','FrontendController@home');
Route::get('dish/show/{id}','FrontendController@dishshow');
Route::get('dish/detail/{id}','FrontendController@dishdetail');
Route::get('cart/update_quantity/{id}/{dish_quantity}','FrontendController@update_quantity');
Route::post('placeorder','FrontendController@placeOrder');
Route::get('thanks','FrontendController@thanks');
// Route::get('user_login','FrontendController@thanks');


Route::group(['middleware'=>['Frontlogin']],function() 
{
    Route::get('my_account','FrontendController@my_account');
    Route::get('address','FrontendController@address');
    Route::get('orders','FrontendController@orders');
    Route::post('edit_address','FrontendController@edit_address');

}); 


# cart
Route::get('cart','FrontendController@cart');
Route::post('add_to_cart','FrontendController@add_to_cart');

//coupon
Route::post('coupon-code-apply','Frontendcontroller@coupon_code_apply');

# UserController
Route::post('user/registration','UserController@registration');
Route::get('user_registration','UserController@registration_page');

Route::post('user/login','UserController@login');
Route::get('user_login','UserController@login_page');



Route::get('user/logout','UserController@logout');
Route::get('user/checkout','UserController@checkout');
Route::post('registerusers','UserController@registerusers');
Route::match(['get', 'post'], '/confirm/{code}','UserController@confirmAccount');

// Route::get('search', 'UserController@index')->name('search');
Route::get('search', 'ProductController@index')->name('search');
Route::get('autocomplete', 'UserController@autocomplete')->name('autocomplete');


// ResetPasswordController
Route::get('forgot/password', function () {
    return view('frontend.forgot_password');
});
Route::post('password/reset/link','UserController@password_reset_link');
Route::match(['get', 'post'], '/reset/password/{code}','UserController@confirmPassword');
Route::post('reset/password','UserController@reset_password');



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/dashboard','AdminController@dashboard');

Route::get('/clear', function() { 
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('route:clear'); 
        return "Cleared!"; 
    });