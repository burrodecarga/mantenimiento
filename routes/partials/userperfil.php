<?php
Route::get('userperfil', 'UserperfilController@index')->name('userperfil.index')->middleware('can:userperfil.index');
Route::post('userperfil', 'UserperfilController@store')->name('userperfil.store')->middleware('can:userperfil.create');
Route::get('userperfil/create', 'UserperfilController@create')->name('userperfil.create')->middleware('can:userperfil.create');
Route::get('userperfil/{user}', 'UserperfilController@show')->name('userperfil.show')->middleware('can:userperfil.show');
Route::put('userperfil/{user}', 'UserperfilController@update')->name('userperfil.update')->middleware('can:userperfil.edit');
Route::delete('userperfil/{user}', 'UserperfilController@destroy')->name('userperfil.destroy')->middleware('can:userperfil.destroy');
Route::get('userperfil/{user}/edit', 'UserperfilController@edit')->name('userperfil.edit')->middleware('can:userperfil.edit');
