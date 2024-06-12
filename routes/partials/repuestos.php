<?php
Route::get('repuestos/formImportExcel','RepuestoController@formImportExcel')->name('repuestos.formImportExcel');
Route::post('repuestos/importExcel','RepuestoController@importExcel')->name('repuestos.importExcel');
Route::post('repuestos/borrar', 'RepuestoController@vaciar')->name('repuestos.vaciar');



Route::post('repuestos/store', 'RepuestoController@store')->name('repuestos.store')->middleware('can:repuestos.create');
Route::get('repuestos', 'RepuestoController@index')->name('repuestos.index')->middleware('can:repuestos.index');
Route::get('repuestos/create', 'RepuestoController@create')->name('repuestos.create')->middleware('can:repuestos.create');
Route::put('repuestos/{repuesto}', 'RepuestoController@update')->name('repuestos.update')->middleware('can:repuestos.edit');
Route::get('repuestos/{repuesto}', 'RepuestoController@show')->name('repuestos.show')->middleware('can:repuestos.show');
Route::delete('repuestos/{repuesto}', 'RepuestoController@destroy')->name('repuestos.destroy')->middleware('can:repuestos.destroy');
Route::get('repuestos/{repuesto}/edit', 'RepuestoController@edit')->name('repuestos.edit')->middleware('can:repuestos.edit');


