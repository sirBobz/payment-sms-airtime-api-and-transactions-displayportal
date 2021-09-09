<?php

use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login');

Route::redirect('/home', 'admin/dashboard');

Auth::routes();

Route::get('verify/resend', 'Auth\TwoFactorController@resend')->name('verify.resend');

Route::get('verify/account/{emailId}', 'Auth\LoginController@verify')->name('verify.account');

Route::get('verify/{email}', 'Auth\LoginController@verifyAccountEmail');

Route::resource('verify', 'Auth\TwoFactorController')->only(['index', 'store']);

Route::group(['middleware' => ['auth', 'twofactor'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/dashboard', 'V1\DashboardController@index')->name('home');

    //Airtime
    Route::resource('airtime', 'V1\AirtimeController');

    //Sms
    Route::resource('sms', 'V1\SmsController');
    Route::get('bulk-sms', 'V1\SmsController@bulkSms')->name('sms.bulkSms');
    Route::get('sms-upload-file', 'V1\SmsController@downloadFile')->name('sms.downloadFile');
    Route::post('sms-upload-file', 'V1\SmsController@fileUpload')->name('sms.fileUpload');

    //Mpesa Business to customer
    Route::resource('business-to-customer', 'V1\MpesaBusinessToCustomerController');

    //Mpesa customer to Business
    Route::resource('customer-to-business', 'V1\MpesaCustomerToBusinessController');

    //Api settings
    Route::resource('api', 'V1\ApiController');
    Route::get('generate-api-credentials', 'V1\ApiController@storeCredentials')->name('api.credentials');


    //Account billing
    Route::resource('account-billing', 'V1\AccountBillingController');
    Route::get('/alert-delete/{id}', 'V1\AccountBillingController@destroy')->name('alertDelete');
    Route::get('/get-account-balance', 'V1\AccountBillingController@getAccountBalance')->name('getAccountBalance');

    //Webhook
    Route::resource('webhook', 'V1\WebhookController');
    Route::delete('delete-webhook', 'V1\WebhookController@delete')->name('webhook.delete');

    //permissions
    Route::resource('permissions', 'V1\PermissionsController');
    Route::delete('permissions_mass_destroy', 'V1\PermissionsController@massDestroy')->name('permissions.mass_destroy');

    //roles
    Route::resource('roles', 'V1\RolesController');
    Route::delete('roles_mass_destroy', 'V1\RolesController@massDestroy')->name('roles.mass_destroy');

    // Users
    Route::resource('users', 'V1\UserController');
    Route::get('/delete-user/{id}', 'V1\UserController@destroy')->name('users.destroy');
});
