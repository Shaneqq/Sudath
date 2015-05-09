<?php

Route::get('/', array(
    'as' => 'home',
    'uses' => 'HomeController@lawyerSignIn'
));


Route::group(array('before' => 'auth'), function() {
Route::get('/account/sign-out', array(
    'as' => 'account-sign-out',
    'uses' => 'HomeController@getSignOut'
))->after('invalidate-browser-cache');

Route::get('/lawyerhome',array(
   'as'=>'lawyer-home',
    'uses'=>'HomeController@lawyerHome'
));
});
Route::group(array('before' => 'guest'), function() {
Route::group(array('before' => 'csrf'), function() {



    Route::post('/account/sign-in', array(
        'as' => 'account-sign-in-post',
        'uses' => 'HomeController@postSignIn'
    ));
      Route::post('/admin/account/sign-in', array(
        'as' => 'admin-account-sign-in-post',
        'uses' => 'HomeController@adminPostSignIn'
    ));
});

Route::get('/admin', array(
    'as' => 'admin-sign-in',
    'uses' => 'HomeController@adminSignIn'
));


/*Route::get("/account/sign-in/", array(
    'as' => 'lawyer-sign-in',
    'uses' => 'HomeController@lawyerSignIn'
));*/


/*
      Route::get('/admin', array(
      'as' => 'lawyer-sign-in',
      'uses' => 'HomeController@lawyerSignIn'
      )); */
});
