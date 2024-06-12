<?php
///Ruta->nombre->permiso
Route::get('/roles/create', 'RoleController@create')
    ->name('roles.create')->middleware('can:roles.create');


Route::get('/roles/{role}', 'RoleController@show')
    ->name('roles.show')->middleware('can:roles.show');



Route::post('/roles/store', 'RoleController@store')
    ->name('roles.store')->middleware('can:roles.store');

Route::get('roles', 'RoleController@index')
    ->name('roles.index')->middleware('can:roles.index');



Route::put('/roles/{id}', 'RoleController@update')
    ->name('roles.update')->middleware('can:roles.edit');



Route::delete('/roles/{id}', 'RoleController@destroy')
    ->name('roles.destroy')->middleware('can:roles.destroy');

Route::get('/roles/{role}/edit', 'RoleController@edit')
    ->name('roles.edit')->middleware('can:roles.edit');
