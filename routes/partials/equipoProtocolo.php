<?php
Route::get('equipos/formImportExcel','EquipoController@formImportExcel')->name('equipos.formImportExcel');
Route::post('equipos/importExcel','EquipoController@importExcel')->name('equipos.importExcel');
Route::post('equipos/borrar', 'EquipoController@vaciar')->name('equipos.vaciar');

Route::get('equipos/formImportExcelAll','EquipoController@formImportExcelAll')->name('equipos.formImportExcelAll');
Route::post('equipos/importExcelAll','EquipoController@importExcelAll')->name('equipos.importExcelAll');


Route::get('equipoprotocolos/{equipo}', 'EquipoProtocoloController@index')->name('equipoprotocolos.index')->middleware('can:equipos.index');
Route::get('equipoprotocolos/{equipo}/{caracteristica}/edit', 'EquipoProtocoloController@edit')->name('equipoprotocolos.edit')->middleware('can:equipos.index');
Route::put('equipoprotocolos/{equipo}/{caracteristica}/update', 'EquipoProtocoloController@update')->name('equipoprotocolos.update')->middleware('can:equipos.index');
Route::get('equipoprotocolos/{equipo}/show', 'EquipoProtocoloController@show')->name('equipoprotocolos.show')->middleware('can:equipos.show');
Route::get('equipoprotocolos/{equipo}/clone', 'EquipoProtocoloController@clone')->name('equipoprotocolos.clone')->middleware('can:equipos.show');
Route::get('equipoprotocolos/{equipo}/imagen', 'EquipoProtocoloController@imagen')->name('equipoprotocolos.imagen')->middleware('can:equipos.create');
Route::post('equipoprotocolos/{equipo}/imagenStore', 'EquipoProtocoloController@imagenStore')->name('equipoprotocolos.imagenStore')->middleware('can:equipos.create');
