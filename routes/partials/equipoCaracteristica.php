<?php
Route::get('equipos/formImportExcel','EquipoController@formImportExcel')->name('equipos.formImportExcel');
Route::post('equipos/importExcel','EquipoController@importExcel')->name('equipos.importExcel');
Route::post('equipos/borrar', 'EquipoController@vaciar')->name('equipos.vaciar');

Route::get('equipos/formImportExcelAll','EquipoController@formImportExcelAll')->name('equipos.formImportExcelAll');
Route::post('equipos/importExcelAll','EquipoController@importExcelAll')->name('equipos.importExcelAll');


Route::get('equipocaracteristica/{equipo}', 'EquipoCaracteristicaController@index')->name('equipocaracteristica.index')->middleware('can:equipos.index');
Route::get('equipocaracteristica/{equipo}/{caracteristica}/edit', 'EquipoCaracteristicaController@edit')->name('equipocaracteristica.edit')->middleware('can:equipos.index');
Route::put('equipocaracteristica/{equipo}/{caracteristica}/update', 'EquipoCaracteristicaController@update')->name('equipocaracteristica.update')->middleware('can:equipos.index');
Route::get('equipocaracteristica/{equipo}/show', 'EquipoCaracteristicaController@show')->name('equipocaracteristica.show')->middleware('can:equipos.show');
Route::get('equipocaracteristica/{equipo}/clone', 'EquipoCaracteristicaController@clone')->name('equipocaracteristica.clone')->middleware('can:equipos.show');
Route::get('equipocaracteristica/{equipo}/imagen', 'EquipoCaracteristicaController@imagen')->name('equipocaracteristica.imagen')->middleware('can:equipos.create');
Route::post('equipocaracteristica/{equipo}/imagenStore', 'EquipoCaracteristicaController@imagenStore')->name('equipocaracteristica.imagenStore')->middleware('can:equipos.create');
Route::get('equipocaracteristica/{equipo}/caracteristicas', 'EquipoCaracteristicaController@caracteristicas')->name('equipocaracteristica.caracteristicas')->middleware('can:equipos.create');
