<?php

/*
|--------------------------------------------------------------------------
| Web Admin Panel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

app()->singleton('admin', function () {
	return 'admin';
});

\L::Panel(app('admin')); /// Set Lang redirect to admin
\L::LangNonymous(); // Run Route Lang 'namespace' => 'Admin',

Route::group(['prefix' => app('admin'), 'middleware' => 'Lang'], function () {

	Route::get('theme/{id}', 'Admin\Dashboard@theme');
	Route::group(['middleware' => 'admin_guest'], function () {

		Route::get('login', 'Admin\AdminAuthenticated@login_page');
		Route::post('login', 'Admin\AdminAuthenticated@login_post');

		Route::post('reset/password', 'Admin\AdminAuthenticated@reset_password');
		Route::get('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_final');
		Route::post('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_change');
	});
	/*
		|--------------------------------------------------------------------------
		| Web Routes
		|--------------------------------------------------------------------------
		| Do not delete any written comments in this file
		| These comments are related to the application (it)
		| If you want to delete it, do this after you have finished using the application
		| For any errors you may encounter, please go to this link and put your problem
		| phpanonymous.com/it/issues
		 */

	Route::group(['middleware' => 'admin:admin'], function () {
		//////// Admin Routes /* Start */ //////////////
		Route::get('/', 'Admin\Dashboard@home');
		Route::get('/setting', 'Admin\SettingController@show');
		Route::get('/setting/icon', 'Admin\SettingController@icon');
		Route::get('/setting/logo', 'Admin\SettingController@logo');
		Route::post('/setting', 'Admin\SettingController@situpdate');
		Route::any('logout', 'Admin\AdminAuthenticated@logout');

		Route::resource('slider', 'Admin\SliderController');
		Route::resource('service', 'Admin\ServiceController');
		Route::resource('hire', 'Admin\HireController');
		Route::resource('home_login', 'Admin\Home_loginController');
		Route::resource('order', 'Admin\OrderController');
		Route::resource('comment', 'Admin\CommentController');
		Route::resource('tag', 'Admin\TagController');
		Route::resource('post', 'Admin\PostController');
		Route::get('post/{id}/recovery', 'Admin\PostController@recovery');
		Route::get('tag/{id}/recovery', 'Admin\TagController@recovery');
		Route::get('product/{id}/recovery', 'Admin\ProductController@recovery');
		Route::resource('user', 'Admin\UserController');
		Route::resource('contact', 'Admin\ContactController');
		Route::resource('admin', 'Admin\AdminController');
		Route::resource('departments', 'Admin\DepartmentsController');
		Route::resource('product', 'Admin\ProductController');
		Route::get('product/image/{id}', 'Admin\ProductController@product_image');
		Route::get('partner', 'Admin\PartnerController@index');
        Route::resource('partner', 'Admin\PartnerController');
        Route::get('send', 'Admin\SendController@index');
		Route::post('send', 'Admin\SendController@store');
		Route::post('hire/multi_delete', 'Admin\HireController@multi_delete');
		Route::post('order/multi_delete', 'Admin\OrderController@multi_delete');
		Route::post('tag/multi_delete', 'Admin\TagController@multi_delete');
		Route::post('/post/multi_delete', 'Admin\PostController@multi_delete');
		Route::post('/comment/multi_delete', 'Admin\CommentController@multi_delete');
		Route::post('/admin/multi_delete', 'Admin\AdminController@multi_delete');
		Route::post('/user/multi_delete', 'Admin\UserController@multi_delete');
		Route::post('/product/multi_delete', 'Admin\ProductController@multi_delete');
		//////// Admin Routes /* End */ //////////////
	});

});
