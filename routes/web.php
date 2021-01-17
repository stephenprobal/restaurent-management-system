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
//Frontend controller route
Route::get('product/details/{slug}','FrontendController@productdetails');
// Route::get('category/details/{slug}','FrontendController@categorydetails');
Route::get('banner/details/{slug}','FrontendController@bannerdetails');
Route::get('/', 'FrontendController@index');
Route::get('contact', 'FrontendController@contact');
Route::get('about/view', 'FrontendController@aboutview');
Route::post('contact/insert','FrontendController@contactinsert')->name('contactinsert');
Route::get('shop', 'FrontendController@shop')->name('shop');
// Route::get('shop/{category_id}', 'FrontendController@shopWithId')->name('shopId');
// Route::post('review/post','FrontendController@reviewpost');
// Route::get('search','FrontendController@search');


Auth::routes(['verify' => true]);
//Home controller route
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('send/newsletter', 'HomeController@sendnewsletter');
Route::post('marked/delete', 'HomeController@markeddelete');
//category controller  
Route::get('add/category', 'CategoryController@addcategory')->name('addcategory');
Route::post('add/category/post', 'CategoryController@addcategorypost');
Route::get('delete/category/{category_id}', 'CategoryController@deletecategory');
Route::get('edit/category/{category_id}', 'CategoryController@editcategory');
Route::post('edit/category/post', 'CategoryController@editcategorypost');
Route::post('mark/delete', 'CategoryController@markdelete');
Route::get('restore/category/{category_id}', 'CategoryController@restorecategory');
Route::get('force/delete/category/{category_id}', 'CategoryController@forcedeletecategory');
// profile controller route
Route::get('profile', 'ProfileController@profile');
Route::post('edit/profile/post', 'ProfileController@editprofilepost');
Route::post('edit/password/post', 'ProfileController@editpasswordpost');
Route::post('change/profile/photo', 'ProfileController@changeprofilephoto');
// product controller route
Route::resource('product', 'ProductController');
//banner Controller Routes
Route::resource('banner','BannerController');
//contact Controller Routes
Route::get('contact/upload/download/{contact_id}', 'ContactController@contactuploaddownload');
Route::get('contact/view', 'ContactController@contactview')->name('contactview');
Route::get('delete/contact/{contact_id}', 'ContactController@deletecontact');
//about Controller Routes
Route::resource('about','AboutController');
//cart Controller Routes
Route::get('cart', 'CartController@index')->name('cart.index');
Route::post('cart/store', 'CartController@store')->name('cart.store');
Route::get('cart/{coupon_name}', 'CartController@index');
Route::get('cart/remove/{cart_id}', 'CartController@remove')->name('cart.remove');
Route::post('cart/update', 'CartController@update')->name('cart.update');
//coupon Controller Routes
Route::resource('coupon','CouponController');
//Github Controller Routes
// Route::get('login/{website}', 'GithubController@redirectToProvider');
// Route::get('login/{website}/callback', 'GithubController@handleProviderCallback');
//Newsleetter controller Routes
Route::resource('newsleetter','NewsleetterController');
