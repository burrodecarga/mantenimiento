<?php
Route::get('fallas', 'FallaController@index')->name('fallas.index')->middleware('can:fallas.index');
Route::post('fallas', 'FallaController@store')->name('fallas.store')->middleware('can:fallas.create');
Route::get('fallas/{equipo}/create', 'FallaController@create')->name('fallas.create')->middleware('can:fallas.create');
Route::get('fallas/{user}', 'FallaController@show')->name('fallas.show')->middleware('can:fallas.show');
Route::put('fallas/{user}', 'FallaController@update')->name('fallas.update')->middleware('can:fallas.edit');
Route::delete('fallas/{user}', 'FallaController@destroy')->name('fallas.destroy')->middleware('can:fallas.destroy');
Route::get('fallas/{user}/edit', 'FallaController@edit')->name('fallas.edit')->middleware('can:fallas.edit');


Route::get('fallas/{falla}/orden', 'FallaController@orden')->name('fallas.orden')->middleware('can:fallas.orden');
