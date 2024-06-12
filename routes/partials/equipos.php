<?php
Route::get('equipos/formImportExcel','EquipoController@formImportExcel')->name('equipos.formImportExcel');
Route::post('equipos/importExcel','EquipoController@importExcel')->name('equipos.importExcel');
Route::post('equipos/borrar', 'EquipoController@vaciar')->name('equipos.vaciar');

Route::get('equipos/formImportExcelAll','EquipoController@formImportExcelAll')->name('equipos.formImportExcelAll');
Route::post('equipos/importExcelAll','EquipoController@importExcelAll')->name('equipos.importExcelAll');


Route::post('equipos/store', 'EquipoController@store')->name('equipos.store')->middleware('can:equipos.create');
Route::get('equipos', 'EquipoController@index')->name('equipos.index')->middleware('can:equipos.index');
Route::get('equipos/indexNew', 'EquipoController@indexNew')->name('equipos.indexNew')->middleware('can:equipos.index');
Route::get('equipos/indexNewSource', 'EquipoController@indexNewSource')->name('equipos.indexNewSource')->middleware('can:equipos.index');

Route::get('equipos/create', 'EquipoController@create')->name('equipos.create')->middleware('can:equipos.create');
Route::put('equipos/{equipo}', 'EquipoController@update')->name('equipos.update')->middleware('can:equipos.edit');
Route::get('equipos/{equipo}', 'EquipoController@show')->name('equipos.show')->middleware('can:equipos.show');
Route::delete('equipos/{equipo}/delete', 'EquipoController@destroy')->name('equipos.destroy')->middleware('can:equipos.destroy');
Route::get('equipos/{equipo}/edit', 'EquipoController@edit')->name('equipos.edit')->middleware('can:equipos.edit');

Route::get('equipos/getsubsistemas/{id}', 'EquipoController@getSubsistemas')->name('equipos.getsubsistemas')->middleware('can:sistemas.edit');

Route::get('equipos/{sistema}/{subsistema}/createNew', 'EquipoController@createNew')->name('equipos.createNew')->middleware('can:equipos.create');



Route::get('equipos/{equipo}/assign', 'EquipoController@assign')->name('equipos.assign')->middleware('can:equipos.create');

Route::get('equipos/{id}/{jd}/assignTipo', 'EquipoController@assignTipo')->name('equipos.assignTipo')->middleware('can:equipos.create');

Route::get('equipos/{equipo}/caracteristicas', 'EquipoController@caracteristicas')->name('equipos.caracteristicas')->middleware('can:equipos.create');

Route::get('equipos/{equipo}/caracteristicasEdit', 'EquipoController@caracteristicasEdit')->name('equipos.caracteristicasEdit')->middleware('can:equipos.create');

Route::put('equipos/caracteristicaStore', 'EquipoController@caracteristicaStore')->name('equipos.caracteristicaStore')->middleware('can:equipos.create');
