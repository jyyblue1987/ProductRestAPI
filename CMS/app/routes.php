<?php

Route::get('/', function(){
	return Redirect::to('/product1');
});

Route::resource('product1', 'ProductController');
Route::get('/product1/delete/{id?}', array('uses'=>'ProductController@destroy'));

// Seler 
Route::resource('product2', 'Product2Controller');
Route::get('/product2/delete/{id?}', array('uses'=>'Product2Controller@destroy'));

// Rest API
Route::any('/process/{id?}', 'ProcessController@process'); 

// file upload
Route::any('/upload', array('uses'=>'UploadController@upload'));