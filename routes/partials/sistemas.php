<?php
Route::get('sistemas/formImportExcel','SistemaController@formImportExcel')->name('sistemas.formImportExcel');
Route::post('sistemas/importExcel','SistemaController@importExcel')->name('sistemas.importExcel');
Route::post('sistemas/borrar', 'SistemaController@vaciar')->name('sistemas.vaciar');



Route::post('sistemas/store', 'SistemaController@store')->name('sistemas.store')->middleware('can:sistemas.create');
Route::get('sistemas', 'SistemaController@index')->name('sistemas.index')->middleware('can:sistemas.index');
Route::get('sistemas/create', 'SistemaController@create')->name('sistemas.create')->middleware('can:sistemas.create');
Route::put('sistemas/{sistema}', 'SistemaController@update')->name('sistemas.update')->middleware('can:sistemas.edit');
Route::get('sistemas/{sistema}', 'SistemaController@show')->name('sistemas.show')->middleware('can:sistemas.show');
Route::delete('sistemas/{sistema}', 'SistemaController@destroy')->name('sistemas.destroy')->middleware('can:sistemas.destroy');
Route::get('sistemas/{sistema}/edit', 'SistemaController@edit')->name('sistemas.edit')->middleware('can:sistemas.edit');

