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


/**
 * Auth routes
 */
Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@logint');
    Route::get('logout', 'LoginController@logout')->name('logout');
    
    Route::get('reset1', 'LoginController@reset1')->name('reset1');
    Route::post('setreset', 'LoginController@setreset');
    Route::post('setpass', 'LoginController@setpass');
    Route::post('setnewpass', 'LoginController@setnewpass');
    
    // Registration Routes...
    if (config('auth.users.registration')) {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    }

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');
    Route::post('resetpass', 'ForgotPasswordController@resetpass')->name('resetpass');
    Route::post('restnewpass', 'ForgotPasswordController@restnewpass')->name('restnewpass');
    
    // Confirmation Routes...
    if (config('auth.users.confirm_email')) {
        Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
        Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');
    }

    // Social Authentication Routes...
    Route::get('social/redirect/{provider}', 'SocialLoginController@redirect')->name('social.redirect');
    Route::get('social/login/{provider}', 'SocialLoginController@login')->name('social.login');
});

/**
 * Backend routes
 */

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'administrator'], function () {
   // Dashboard
   Route::get('/', 'DashboardControllerv@index')->name('dashboard');

    
    //member function

    Route::get('member/edit/{member}', 'MemberController@edit')->name('member.edit');
     Route::get('member/add', 'MemberController@create')->name('member.add');
    Route::get('member','MemberController@index')->name('member');
    Route::get('member/{member}', 'MemberController@show')->name('member.show');
    Route::post('member/edit/editmember','MemberController@update');
    Route::post('member/addmember', 'MemberController@store')->name('member.store');
    Route::get('member/delete/{member}', 'MemberController@destroy')->name('member.delete');
    Route::post('member/delete/deletemember','MemberController@sedelete');
    Route::post('searchMember','MemberController@searchMember');


    //inverty function
    Route::get('inventory','InvertyController@index')->name('inventory');
    Route::get('inventory/add', 'InvertyController@create')->name('inventory.add');
    Route::post('inventory/addinventory', 'InvertyController@store')->name('inventory.addbook');
    Route::get('inventory/{inverty}', 'InvertyController@show')->name('inventory.show');
    Route::get('inventory/edit/{inverty}', 'InvertyController@edit')->name('inventory.edit');
    Route::post('inventory/edit/updateinverty','InvertyController@update');
    Route::get('inventory/delete/{inverty}', 'InvertyController@destroy')->name('inventory.delete');
    Route::post('inventory/delete/deleteinventory','InvertyController@sedelete');
    Route::post('searchInventory', 'InvertyController@searchInverty');
   
    //delivery function 

    Route::get('delivery/print','DeliveryController@print')->name('delivery.print');
    Route::get('delivery/print','DeliveryController@print')->name('delivery.print');
    Route::get('delivery','DeliveryController@index')->name('delivery');
    Route::get('delivery/today','DeliveryController@today')->name('delivery.today');
    Route::post('delivery/add','DeliveryController@create')->name('delivery.add');
    Route::get('delivery/addin','DeliveryController@find')->name('delivery.addin');
    Route::get('delivery/{delivery}', 'DeliveryController@show')->name('delivery.show');
    Route::post('searchBook', 'DeliveryController@searchBook')->name('delivery.searchBook');
    Route::get('delivery/delete/{Delivery}', 'DeliveryController@destroy')->name('delivery.delete');

   Route::post('delivery/add/adddeliverynew', 'DeliveryController@store')->name('delivery.adddeliverynew');
    Route::post('delivery/delete/deletedelivery','DeliveryController@sedelete');

    Route::post('delivery/searchInverty', 'DeliveryController@searchInverty');

    Route::post('searchdelivery', 'DeliveryController@searchdelivery');

    Route::post('Selectdate', 'DeliveryController@Selectdate');

    });

Route::group(['prefix' => 'member', 'as' => 'member.', 'namespace' => 'member', 'middleware' => 'patient'], function () {
   
    // Dashboard
    Route::get('/', 'PatientDashboardController@index')->name('dashboard');
     //member function

     Route::get('member/edit/{member}', 'MemberController@edit')->name('member.edit');
     Route::get('member/add', 'MemberController@create')->name('member.add');
    Route::get('member','MemberController@index')->name('member');
    Route::get('member/{member}', 'MemberController@show')->name('member.show');
    Route::post('member/edit/editmember','MemberController@update');
    Route::post('member/addmember', 'MemberController@store')->name('member.store');
    Route::get('member/delete/{member}', 'MemberController@destroy')->name('member.delete');
    Route::post('member/delete/deletemember','MemberController@sedelete');
    Route::post('searchMember','MemberController@searchMember');


    //inverty function
    Route::get('inventory','InvertyController@index')->name('inventory');
    Route::get('inventory/add', 'InvertyController@create')->name('inventory.add');
    Route::post('inventory/addinventory', 'InvertyController@store')->name('inventory.addbook');
    Route::get('inventory/{inverty}', 'InvertyController@show')->name('inventory.show');
    Route::get('inventory/edit/{inverty}', 'InvertyController@edit')->name('inventory.edit');
    Route::post('inventory/edit/updateinverty','InvertyController@update');
    Route::get('inventory/delete/{inverty}', 'InvertyController@destroy')->name('inventory.delete');
    Route::post('inventory/delete/deleteinverty','InvertyController@sedelete');
    Route::post('searchInventory', 'InvertyController@searchInverty');
   
    //delivery function 

    Route::get('delivery/print','DeliveryController@print')->name('delivery.print');


    Route::get('delivery/print','DeliveryController@print')->name('delivery.print');
    Route::get('delivery','DeliveryController@index')->name('delivery');
    Route::get('delivery/today','DeliveryController@today')->name('delivery.today');
    Route::get('delivery/add/{delivery}','DeliveryController@create')->name('delivery.add');
    Route::get('delivery/addin','DeliveryController@find')->name('delivery.addin');
    Route::post('delivery/add/adddelivery', 'DeliveryController@store');
    Route::get('delivery/{delivery}', 'DeliveryController@show')->name('delivery.show');
    Route::post('searchBook', 'DeliveryController@searchBook')->name('delivery.searchBook');
    Route::get('delivery/delete/{Delivery}', 'DeliveryController@destroy')->name('delivery.delete');
    Route::post('delivery/delete/deletedelivery','DeliveryController@sedelete');

    Route::post('delivery/searchInverty', 'DeliveryController@searchInverty');

    Route::post('searchdelivery', 'DeliveryController@searchdelivery');
    Route::post('searchtoday', 'DeliveryController@searchtoday');
    
    Route::post('Selectdate', 'DeliveryController@Selectdate');
   
});

Route::get('/', 'HomeController@index')->name('/');

/**
 * Membership
 */
Route::group(['as' => 'protection.'], function () {
    Route::get('membership', 'MembershipController@index')->name('membership')->middleware('protection:' . config('protection.membership.product_module_number') . ',protection.membership.failed');
    Route::get('membership/access-denied', 'MembershipController@failed')->name('membership.failed');
    Route::get('membership/clear-cache/', 'MembershipController@clearValidationCache')->name('membership.clear_validation_cache');
});

