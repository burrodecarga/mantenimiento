<?php
Route::post('users/store', 'UserController@store')->name('users.store')->middleware('can:users.create');
Route::get('users', 'UserController@index')->name('users.index')->middleware('can:users.index');
Route::get('users/create', 'UserController@create')->name('users.create')->middleware('can:users.create');
Route::get('users/{user}', 'UserController@show')->name('users.show')->middleware('can:users.show');
Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')->middleware('can:users.destroy');
Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
Route::put('users/{user}', 'UserController@update')->name('users.update');
