<?php
Route::post('profiles/store', 'ProfileController@store')->name('profiles.store')->middleware('can:profiles.create');
Route::get('profiles', 'ProfileController@index')->name('profiles.index')->middleware('can:profiles.index');
Route::get('profiles/create', 'ProfileController@create')->name('profiles.create')->middleware('can:profiles.create');
Route::put('profiles/{user}', 'ProfileController@update')->name('profiles.update')->middleware('can:profiles.edit');
Route::get('profiles/{user}', 'ProfileController@show')->name('profiles.show')->middleware('can:profiles.show');
Route::delete('profiles/{user}', 'ProfileController@destroy')->name('profiles.destroy')->middleware('can:profiles.destroy');
Route::get('profiles/{user}/edit', 'ProfileController@edit')->name('profiles.edit');
