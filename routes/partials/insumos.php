<?php
Route::get('insumos/formImportExcel','InsumoController@formImportExcel')->name('insumos.formImportExcel');
Route::post('insumos/importExcel','InsumoController@importExcel')->name('insumos.importExcel');
Route::post('insumos/borrar', 'InsumoController@vaciar')->name('insumos.vaciar');



Route::post('insumos/store', 'InsumoController@store')->name('insumos.store')->middleware('can:insumos.create');
Route::get('insumos', 'InsumoController@index')->name('insumos.index')->middleware('can:insumos.index');
Route::get('insumos/create', 'InsumoController@create')->name('insumos.create')->middleware('can:insumos.create');
Route::put('insumos/{insumo}', 'InsumoController@update')->name('insumos.update')->middleware('can:insumos.edit');
Route::get('insumos/{insumo}', 'InsumoController@show')->name('insumos.show')->middleware('can:insumos.show');
Route::delete('insumos/{insumo}', 'InsumoController@destroy')->name('insumos.destroy')->middleware('can:insumos.destroy');
Route::get('insumos/{insumo}/edit', 'InsumoController@edit')->name('insumos.edit')->middleware('can:insumos.edit');


