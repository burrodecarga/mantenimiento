<?php
Route::get('userfallas', 'UserfallaController@index')->name('userfallas.index')->middleware('can:userfallas.index');
Route::post('userfallas', 'UserfallaController@store')->name('userfallas.store')->middleware('can:userfallas.create');
Route::get('userfallas/{equipo}/create', 'UserfallaController@create')->name('userfallas.create')->middleware('can:userfallas.create');
Route::get('userfallas/{user}', 'UserfallaController@show')->name('userfallas.show')->middleware('can:userfallas.show');
Route::delete('userfallas/{user}', 'UserfallaController@destroy')->name('userfallas.destroy')->middleware('can:userfallas.destroy');
Route::get('userfallas/{user}/edit', 'UserfallaController@edit')->name('userfallas.edit')->middleware('can:userfallas.edit');
Route::get('userfallas/{equipo}/despeje', 'UserfallaController@despeje')->name('userfallas.despeje')->middleware('can:userfallas.edit');
Route::post('userfallas/depejaFallas', 'UserfallaController@despejaFallas')->name('userfallas.despejaFallas')->middleware('can:userfallas.edit');
