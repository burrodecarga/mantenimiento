<?php
Route::get('herramientas/formImportExcel','HerramientaController@formImportExcel')->name('herramientas.formImportExcel')->middleware('can:herramientas.create');
Route::post('herramientas/importExcel','HerramientaController@importExcel')->name('herramientas.importExcel')->middleware('can:herramientas.create');
Route::post('herramientas/borrar', 'HerramientaController@vaciar')->name('herramientas.vaciar')->middleware('can:herramientas.create');



Route::post('herramientas/store', 'HerramientaController@store')->name('herramientas.store')->middleware('can:herramientas.create');
Route::get('herramientas', 'HerramientaController@index')->name('herramientas.index')->middleware('can:herramientas.index');
Route::get('herramientas/create', 'HerramientaController@create')->name('herramientas.create')->middleware('can:herramientas.create');
Route::put('herramientas/{herramienta}', 'HerramientaController@update')->name('herramientas.update')->middleware('can:herramientas.edit');
Route::get('herramientas/{herramienta}', 'HerramientaController@show')->name('herramientas.show')->middleware('can:herramientas.show');
Route::delete('herramientas/{herramienta}', 'HerramientaController@destroy')->name('herramientas.destroy')->middleware('can:herramientas.destroy');
Route::get('herramientas/{herramienta}/edit', 'HerramientaController@edit')->name('herramientas.edit')->middleware('can:herramientas.edit');


