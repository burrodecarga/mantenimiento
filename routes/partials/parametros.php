<?php
Route::get('parametros/formImportExcel','ParametroController@formImportExcel')->name('parametros.formImportExcel');
Route::post('parametros/importExcel','ParametroController@importExcel')->name('parametros.importExcel');
Route::post('parametros/borrar', 'ParametroController@vaciar')->name('parametros.vaciar');



Route::post('parametros/store', 'ParametroController@store')->name('parametros.store')->middleware('can:parametros.create');
Route::get('parametros', 'ParametroController@index')->name('parametros.index')->middleware('can:parametros.index');
Route::get('parametros/create', 'ParametroController@create')->name('parametros.create')->middleware('can:parametros.create');
Route::put('parametros/{parametro}', 'ParametroController@update')->name('parametros.update')->middleware('can:parametros.edit');
Route::get('parametros/{parametro}', 'ParametroController@show')->name('parametros.show')->middleware('can:parametros.show');
Route::delete('parametros/{parametro}', 'ParametroController@destroy')->name('parametros.destroy')->middleware('can:parametros.destroy');
Route::get('parametros/{parametro}/edit', 'ParametroController@edit')->name('parametros.edit')->middleware('can:parametros.edit');


