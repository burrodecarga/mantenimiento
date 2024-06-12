<?php
Route::post('permissions/store','PermissionController@store')->name('permissions.store')->middleware('can:permissions.create');
Route::get('permissions','PermissionController@index')->name('permissions.index')->middleware('can:permissions.index');
Route::get('permissions/create','PermissionController@create')->name('permissions.create')->middleware('can:permissions.create');
Route::put('permissions/{permission}','PermissionController@update' )->name('permissions.update')->middleware('can:permissions.edit');
Route::get('permissions/{permission}','PermissionController@show' )->name('permissions.show')->middleware('can:permissions.show');
Route::delete('permissions/{permission}' ,'PermissionController@destroy')->name('permissions.destroy')->middleware('can:permissions.destroy');
Route::get('permissions/{permission}/edit','PermissionController@edit' )->name('permissions.edit')->middleware('can:permissions.edit');
?>
