<?php
Route::get('servicios/formImportExcel','ServicioController@formImportExcel')->name('servicios.formImportExcel');
Route::post('servicios/importExcel','ServicioController@importExcel')->name('servicios.importExcel');
Route::post('servicios/borrar', 'ServicioController@vaciar')->name('servicios.vaciar');



Route::post('servicios/store', 'ServicioController@store')->name('servicios.store')->middleware('can:servicios.create');
Route::get('servicios', 'ServicioController@index')->name('servicios.index')->middleware('can:servicios.index');
Route::get('servicios/create', 'ServicioController@create')->name('servicios.create')->middleware('can:servicios.create');
Route::put('servicios/{servicio}', 'ServicioController@update')->name('servicios.update')->middleware('can:servicios.edit');
Route::get('servicios/{servicio}', 'ServicioController@show')->name('servicios.show')->middleware('can:servicios.show');
Route::delete('servicios/{servicio}', 'ServicioController@destroy')->name('servicios.destroy')->middleware('can:servicios.destroy');
Route::get('servicios/{servicio}/edit', 'ServicioController@edit')->name('servicios.edit')->middleware('can:servicios.edit');


