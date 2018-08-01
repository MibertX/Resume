<?php
Route::get('/', array(
    'uses' => 'LandingController@index'
));

Route::post('/feedback', array(
	'uses' => 'LandingController@storeFeedback',
	'as' => 'storeFeedback',
));