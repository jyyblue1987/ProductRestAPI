<?php

Route::get('/', function(){
	return Redirect::to('/product');
});

// Seler 
Route::resource('product', 'ProductController');
Route::get('/product/delete/{id?}', array('uses'=>'ProductController@destroy'));

// Rest API
Route::any('/process/{id?}', 'ProcessController@process'); 
