<?php
Route::get('tipos/formImportExcel','TipoController@formImportExcel')->name('tipos.formImportExcel');
Route::post('tipos/importExcel','TipoController@importExcel')->name('tipos.importExcel');
Route::post('tipos/borrar', 'TipoController@vaciar')->name('tipos.vaciar');

Route::get('tipos/formImportExcelCaracteristicas','TipoController@formImportExcelCaracteristicas')->name('tipos.formImportExcelCaracteristicas');
Route::post('tipos/importExcelCaracteristicas','TipoController@importExcelCaracteristicas')->name('tipos.importExcelCaracteristicas');


Route::post('tipos/store', 'TipoController@store')->name('tipos.store')->middleware('can:tipos.create');
Route::get('tipos', 'TipoController@index')->name('tipos.index')->middleware('can:tipos.index');
Route::get('tipos/create', 'TipoController@create')->name('tipos.create')->middleware('can:tipos.create');
Route::put('tipos/{tipo}', 'TipoController@update')->name('tipos.update')->middleware('can:tipos.edit');
Route::get('tipos/{tipo}', 'TipoController@show')->name('tipos.show')->middleware('can:tipos.show');
Route::delete('tipos/{tipo}', 'TipoController@destroy')->name('tipos.destroy')->middleware('can:tipos.destroy');
Route::get('tipos/{tipo}/edit', 'TipoController@edit')->name('tipos.edit')->middleware('can:tipos.edit');


Route::get('tipos/{tipo}/assign', 'TipoController@assign')->name('tipos.assign')->middleware('can:tipos.edit');

route::get('tipos/{id}/{jd}/tipo', 'TipoController@tipo')->name('tipos.tipo');
route::get('tipos/{id}/noTipo', 'TipoController@noTipo')->name('tipos.noTipo');


