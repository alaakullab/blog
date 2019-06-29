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

Route::group(['prefix' => '/', 'middleware' => 'Lang'], function () {
  Visitor::log();
    Route::group(['middleware' => 'Maintenance'], function () {
        Route::group(['middleware' => 'guest'], function () {


        });
        Route::group(['middleware' => 'Guest_shop'], function () {
            //shop
            Route::get('/E-commerce/register', 'thame\shop\HomeController@Register');
            Route::post('/E-commerce/register', 'thame\shop\HomeController@Register_post');
            Route::post('/E-commerce/register_checkout', 'thame\shop\HomeController@register_checkout');
            Route::post('/E-commerce/login_ecommerce', 'thame\shop\HomeController@login_ecommerce');
            Route::post('/E-commerce/login_ecommerce_checkout', 'thame\shop\HomeController@login_ecommerce_checkout');
            // Password Reset Routes...
            Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
            Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
            Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
            Route::post('password/reset', 'Auth\ResetPasswordController@reset');

            //end shop
        });
        Route::group(['middleware' => 'Guest_blog'], function () {
            Route::get('/bloger/register', 'thame\bloger\HomeController@Register');
            Route::post('/bloger/register', 'thame\bloger\HomeController@Register_post');
        });
        //draftsman
        Route::get('/draftsman/all', 'thame\home\DraftsmanController@draftsman_all_index');
        Route::get('/draftsman/{username}/index', 'thame\home\DraftsmanController@index');
        Route::get('/draftsman/{username}/create', 'thame\home\DraftsmanController@create');
        Route::post('/draftsman/add_action', ['as'=>'ajaxImageUpload','uses'=>'thame\home\DraftsmanController@store']);
        Route::post('/draftsman/myportfolio/delete', 'thame\home\DraftsmanController@destroy_myportfoliofile')->name('myportfolio.delete');
        Route::post('/draftsman/about', 'thame\home\DraftsmanController@about')->name('draftsman.about');
        Route::post('/draftsman/skills/create', ['as'=>'ajaxskillscreate','uses'=>'thame\home\DraftsmanController@skills_store']);
        Route::get('/draftsman/skills/delete', ['as'=>'ajaxskillsdelete','uses'=>'thame\home\DraftsmanController@destroy_my_skill']);

        // end draftsman
        Route::get('/team/{username}', 'thame\home\HomeController@team_index');
        Route::post('/team/about', 'thame\home\HomeController@team_about')->name('team.about');
        Route::get('/hire', 'thame\home\HomeController@hire_index');
        Route::post('/hire/create', 'thame\home\HomeController@hire_post');
        Route::get('/hire/post/{id}','thame\home\HomeController@hire_show');
        Route::post('/hire/comment', 'thame\home\HomeController@hire_comment_store')->name('hire.comment');
        Route::get('/bloger', 'thame\bloger\HomeController@index');
        Route::post('/bloger/loaddataposts','thame\bloger\HomeController@loadDataAjaxPosts' )->name('bloger.loaddataposts');
        Route::get('/bloger/category/{name}','thame\bloger\HomeController@posts_category_index');
        Route::post('/bloger/search', 'thame\bloger\HomeController@search');
        Route::post('/bloger/search/ajax', 'thame\bloger\HomeController@loadDataAjaxsearch')->name('bloger.loadDataAjaxsearch');
        Route::get('/bloger/post/{id}', 'Api\PostController@show');
        Route::post('/bloger/comment', 'thame\bloger\CommentController@store')->name('bloger.comment');
        Route::any('/bloger/logout', 'thame\home\UserController@logout');
        Route::any('logoutany', 'thame\home\UserController@logout_any');
        Route::get('/partner', 'thame\home\HomeController@partner_index');
        Route::get('/', 'thame\home\HomeController@index');


        Route::post('/bloger/New_news', 'thame\bloger\HomeController@New_news');

        Route::post('/user_post', 'thame\home\HomeController@User_create');

        Route::group(['middleware' => 'UserGuest'], function () {


        });


        //E-commerce
        Route::get('/E-commerce', 'thame\shop\HomeController@index');
        //cart
        Route::resource('/E-commerce/cart', 'thame\shop\CartController');
        Route::get('/E-commerce/cart/delete/{id}', 'thame\shop\CartController@delete_cart')->name('cart.delete');
        Route::post('/E-commerce/login', 'thame\shop\HomeController@login_post')->name('shop.login');
        Route::get('/E-commerce/contact', 'thame\shop\HomeController@contact');
        Route::post('/E-commerce/New_news', 'thame\shop\HomeController@New_news');
        Route::post('/Contact', 'Admin\ContactController@store');
        // auth
        Route::group(['middleware' => 'roles', 'roles' => ['Editor']], function () {
            Route::get('/bloger/add/post', 'thame\bloger\HomeController@post_add');
            Route::post('/bloger/store/post', 'thame\bloger\HomeController@post_store');
            Route::get('/bloger/post/{id}/edit', 'thame\bloger\HomeController@post_edit');
            Route::post('/bloger/post/{id}/update', 'thame\bloger\HomeController@post_update');
        });
        Route::group(['middleware' => 'UserGuest_blog'], function () {
          Route::get('/bloger/my-account/home', 'thame\home\AccountController@account_index');
          Route::get('/bloger/my-account/edit', 'thame\home\AccountController@account_edit');
          Route::post('/bloger/my-account/account_store', 'thame\home\AccountController@account_store');
          Route::get('/bloger/my-account/upload-image', 'thame\home\AccountController@account_upload');
          Route::post('/bloger/my-account/upload-image/post', 'thame\home\AccountController@account_upload_post');
          Route::get('/bloger/my-account/change-password', 'thame\home\AccountController@change_password');
          Route::post('/bloger/my-account/change-password/post', 'thame\home\AccountController@change_password_post');
          Route::get('/bloger/account/exp', 'thame\bloger\AccountController@exp');
          Route::get('/bloger/account/exp/{id}', 'thame\bloger\AccountController@exp_id');
          Route::post('/bloger/account/exp', 'thame\bloger\AccountController@exp_post');
          Route::post('/bloger/rating', 'thame\bloger\HomeController@rating')->name('bloger.rating');
      
          Route::get('/bloger/account', 'thame\bloger\AccountController@index');
          Route::get('/bloger/account/Account_information', 'thame\bloger\AccountController@Account_information');
          Route::post('/bloger/account/Account_information', 'thame\bloger\AccountController@Account_information_post');
          Route::get('/bloger/account/Change_profile', 'thame\bloger\AccountController@Change_profile');
          Route::post('/bloger/account/Change_profile', 'thame\bloger\AccountController@Change_profile_post');
          Route::post('/bloger/account/Change_password', 'thame\bloger\AccountController@Change_password');
          Route::get('/bloger/account/social-media', 'thame\bloger\AccountController@social_media');
          Route::post('/bloger/account/social-media', 'thame\bloger\AccountController@social_media_post');
          Route::get('/bloger/contact', 'thame\bloger\HomeController@contact');
});
        Route::group(['middleware' => 'UserGuest_shop'], function () {

            Route::get('/E-commerce/payment-method', 'thame\shop\CartController@payment_method')->name('cart.payment_method');
            Route::post('/E-commerce/payment-method', 'thame\shop\CartController@payment_method_post')->name('cart.payment_method_post');
            Route::get('/E-commerce/Order/{key}', 'thame\shop\CartController@Order')->name('cart.Order');
            Route::post('/E-commerce/Order/{key}', 'thame\shop\CartController@Order_post')->name('cart.Order_post');
            Route::get('/E-commerce/payment', 'thame\shop\CartController@payment_show')->name('cart.payment_show');
            Route::post('/E-commerce/payment', 'thame\shop\CartController@payment_post')->name('cart.payment_post');
            Route::get('/E-commerce/Paypal', 'thame\shop\CartController@paypal_show')->name('cart.paypal_show');
            Route::post('/E-commerce/Paypal', 'thame\shop\CartController@paypal_post')->name('cart.paypal_post');
            Route::get('/E-commerce/Paypal', 'thame\shop\PaymentController@payWithpaypal');
            Route::get('/E-commerce/paypal/status', 'thame\shop\PaymentController@getPaymentStatus');
            Route::get('/E-commerce/done', 'thame\shop\HomeController@done');
            Route::any('/E-commerce/logout', 'thame\shop\HomeController@logout');
            Route::get('/E-commerce/wishlist/{id}', 'thame\shop\HomeController@wishlist');
            Route::get('/E-commerce/wishlist', 'thame\shop\HomeController@wishlist_show');
            Route::get('/E-commerce/delete/wishlist/{id}', 'thame\shop\HomeController@wishlist_delete');
            Route::get('/E-commerce/orders', 'thame\shop\HomeController@orders_show');
            Route::resource('/E-commerce/address', 'thame\shop\AddressController');
            Route::post('/E-commerce/address/{id}', 'thame\shop\AddressController@update_address');
            //account

            Route::get('/E-commerce/account', 'thame\shop\AccountController@index');
            Route::get('/E-commerce/account/Account_information', 'thame\shop\AccountController@Account_information');
            Route::post('/E-commerce/account/Account_information', 'thame\shop\AccountController@Account_information_post');
            Route::get('/E-commerce/account/Change_profile', 'thame\shop\AccountController@Change_profile');
            Route::post('/E-commerce/account/Change_profile', 'thame\shop\AccountController@Change_profile_post');
            Route::post('/E-commerce/account/Change_password', 'thame\shop\AccountController@Change_password');
            Route::get('/E-commerce/account/social-media', 'thame\shop\AccountController@social_media');
            Route::post('/E-commerce/account/social-media', 'thame\shop\AccountController@social_media_post');
            // end account


        });
        // end auth



        Route::get('/E-commerce/product/{id}', 'thame\shop\HomeController@single_product')->name('shop.single_product');
        Route::get('/E-commerce/category/{name}', 'thame\shop\HomeController@category');
        Route::post('/E-commerce/category/{name}/filter', 'thame\shop\HomeController@filter');
        Route::get('/E-commerce/contact', 'thame\shop\HomeController@contact');

        Route::get('/E-commerce/search', 'thame\shop\HomeController@search');

    });
    Route::get('maintenance', function () {
        if (setting()->maintenance == 'open') {
            return redirect('/');
        } else {
            return view('maintenance');
        }
    });
});
