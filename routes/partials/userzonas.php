<?php

Route::post('userzonas/store', 'UserzonaController@store')->name('userzonas.store')->middleware('can:userzonas.create');
Route::get('userzonas', 'UserzonaController@index')->name('userzonas.index')->middleware('can:userzonas.index');
Route::get('userzonas/create', 'UserzonaController@create')->name('userzonas.create')->middleware('can:userzonas.create');
Route::put('userzonas/{user}', 'UserzonaController@update')->name('userzonas.update')->middleware('can:userzonas.edit');
Route::delete('userzonas/{zona}/{user}', 'UserzonaController@destroy')->name('userzonas.destroy')->middleware('can:userzonas.destroy');
Route::get('userzonas/{user}/edit', 'UserzonaController@edit')->name('userzonas.edit')->middleware('can:userzonas.edit');
Route::get('userzonas/{user}', 'UserzonaController@show')->name('userzonas.show')->middleware('can:userzonas.show');


