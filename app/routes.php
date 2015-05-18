<?php

Route::get('/', array(
    'as' => 'home',
    'uses' => 'HomeController@lawyerSignIn'
));




Route::group(array('before' => 'auth'), function() {
Route::get('/account/sign-out', array(
    'as' => 'account-sign-out',
    'uses' => 'HomeController@getSignOut'
));

Route::get('/admin/sign-out', array(
    'as' => 'adminaccount-sign-out',
    'uses' => 'HomeController@adminGetSignOut'
));
Route::get('/lawyerhome',array(
   'as'=>'lawyer-home',
    'uses'=>'HomeController@lawyerHome'
));
Route::get('/adminhome',array(
   'as'=>'admin-home',
    'uses'=>'HomeController@adminHome'
));




Route::get('/lawyerRegistration',array(
   'as'=>'lawyer-registration',
    'uses'=>'HomeController@getCreate'
));




Route::group(array('before'=>'csrf'),function(){
    Route::post('/create',array(
      'as'=>'create-post',
      'uses'=>'HomeController@postCreate'
    ));
  });

Route::get('/create',array(
    'as'=>'account-create',
    'uses'=>'HomeController@getCreate'
  ));

  Route::get('/activate/{code}', array(
    'as'  =>'account-activate',
    'uses'  =>'HomeController@getActivate'
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
