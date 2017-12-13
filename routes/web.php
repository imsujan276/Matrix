<?php

Route::get('/','frontController@index');

Auth::routes();

/*
	Back Office
*/
Route::group(['prefix' => 'back_office',  'middleware' => 'auth'], function()
{
	Route::get('/', 'HomeController@index')->name('back_office');

    Route::get('profile', 'profileController@getProfile');
    Route::post('profile/{id}', 'profileController@updateProfile');

    Route::post('change_password/{id}', 'profileController@updatePassword');
    Route::post('change_security/{id}', 'profileController@updateSecurity');
    Route::post('change_preference/{id}', 'profileController@updatePreferences');

    Route::get('promotion', 'promotionController@getPromotionLink');

    Route::get('wallet', 'walletController@getwallet');
    Route::post('wallet/{id}', 'walletController@setwallet');
    Route::get('upgrade','walletController@getUpgrade');
    Route::post('upgrade/{id}/{upgrade_to}','walletController@setUpgrade');
    Route::get('donation','walletController@getDonations');

    Route::get('referrals', 'referralController@getMyReferrals');

    Route::post('invite', 'referralController@sendInvitation');

    Route::get('testimonial', 'testimonialController@index');
    Route::post('testimonial/{id}', 'testimonialController@add');

    Route::get('pages', 'pageController@index');
    Route::get('page/create', 'pageController@create');
    Route::post('page/create', 'pageController@store');
    Route::get('page/edit/{id}', 'pageController@edit');
    Route::post('page/edit/{id}', 'pageController@update');
    Route::get('page/delete/{id}', 'pageController@delete');

});

/*
	Referral 
*/
Route::group(['prefix' => 'ref'], function()
{
	Route::get('/{ref_id}',	'referralController@getReferral');
	Route::get('/{ref_id}/register',	'referralController@getReferralToRegister');
});

Route::get('getHeaderData', 'ajaxController@getHeaderData');

Route::get('page/{slug}','pageController@getPage');
