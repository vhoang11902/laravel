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
/*-----------front end--------*/
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
//danh muc san pham trang chu
Route::get('/category-product/{category_id}','CategoryProduct@show_category_home');
Route::get('/products/{product_id}','ProductController@details_product');

/*-----------backend--------*/
Route::get('/admin', 'AdminController@admin');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::post('/admin-dashboard', 'AdminController@dashboard');
Route::get('/logout', 'AdminController@logout');
/*-----------atributte-product--------*/
Route::get('/add-attribute','AttributeController@add_attribute');
Route::get('/all-attribute','AttributeController@all_attribute');

Route::get('/edit-attribute/{id}','AttributeController@edit_attribute');
Route::get('/delete-attribute/{id}','AttributeController@delete_attribute');

Route::post('/save-attribute','AttributeController@save_attribute');
Route::post('/update-attribute/{id}','AttributeController@update_attribute');

/*-----------category-product--------*/
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');

Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');

Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');

Route::post('/export-csv','CategoryProduct@export_csv');
Route::post('/import-csv','CategoryProduct@import_csv');



/*-----------product--------*/

Route::get('/add-product','ProductController@add_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/all-product','ProductController@all_product');

Route::get('/unactive-product/{category_product_id}','ProductController@unactive_product');
Route::get('/active-product/{category_product_id}','ProductController@active_product');

Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{category_product_id}','ProductController@update_product');
//attribute
Route::get('/product-attr/{product_id}','ProductController@add_product_attr');
Route::post('/save-product-attr/{product_id}','ProductController@save_product_attr');
Route::get('/delete-product-attr/{id}','ProductController@delete_product_attr');

//CART
Route::post('/save-cart','CartController@save_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::post('/update-to-cart','CartController@update-to-cart');

//CHECKOUT
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save-checkout','CheckoutController@save_checkout');
Route::get('/payment','CheckoutController@payment');
