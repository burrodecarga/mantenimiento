<?php

Route::get('teamfallas', 'TeamfallaController@index')->name('teamfallas.index')->middleware('can:teamfallas.index');
Route::post('teamfallas', 'TeamfallaController@store')->name('teamfallas.store')->middleware('can:teamfallas.create');
// Route::get('teamfallas/{equipo}/create', 'TeamfallaController@create')->name('teamfallas.create')->middleware('can:teamfallas.create');
Route::get('teamfallas/{falla}', 'TeamfallaController@report')->name('teamfallas.report')->middleware('can:teamfallas.show');
Route::put('teamfallas/{falla}', 'TeamfallaController@update')->name('teamfallas.update')->middleware('can:teamfallas.edit');
// Route::delete('teamfallas/{user}', 'TeamfallaController@destroy')->name('teamfallas.destroy')->middleware('can:teamfallas.destroy');
// Route::get('teamfallas/{user}/edit', 'TeamfallaController@edit')->name('teamfallas.edit')->middleware('can:teamfallas.edit');



Route::get('teamfallas/{falla}/orden', 'TeamfallaController@orden')->name('teamfallas.orden')->middleware('can:teamfallas.edit');
Route::get('teamfallas/{falla}/{set}/set', 'TeamfallaController@set')->name('teamfallas.set')->middleware('can:teamfallas.edit');
Route::get('teamfallas/{falla}/{tabla}/recursos', 'TeamfallaController@recursos')->name('teamfallas.recursos')->middleware('can:teamfallas.edit');
Route::get('teamfallas/{falla}/{recurso}/{tabla}/asignar', 'TeamfallaController@asignar')->name('teamfallas.asignar')->middleware('can:teamfallas.edit');
Route::get('teamfallas/{recurso}/noasignar', 'TeamfallaController@noasignar')->name('teamfallas.noasignar')->middleware('can:teamfallas.edit');
Route::post('teamfallas/{falla}/imagen', 'TeamfallaController@imagenStore')->name('teamfallas.imagenStore')->middleware('can:teamfallas.edit');
Route::get('teamfallas/{falla_id}/{id}/delete_imagen', 'TeamfallaController@delete_imagen')->name('teamfallas.delete_imagen')->middleware('can:teamfallas.edit');

Route::get('teamfallas/{falla}/resumen', 'TeamfallaController@resumen')->name('teamfallas.resumen')->middleware('can:teamfallas.edit');
Route::get('teamfallas/{falla}/confirmar', 'TeamfallaController@confirmar')->name('teamfallas.confirmar')->middleware('can:teamfallas.edit');
Route::get('teamfallas/{recurso_id}/edit_recurso', 'TeamfallaController@edit_recurso')->name('teamfallas.edit_recurso')->middleware('can:teamfallas.edit');

Route::put('teamfallas/{recurso_id}/modifica_recurso', 'TeamfallaController@modifica_recurso')->name('teamfallas.modifica_recurso')->middleware('can:teamfallas.edit');

Route::put('/teamfallas/asignarRecurso/{id}', 'TeamfallaController@asignarRecurso')->name('teamfallas.asignarRecurso')->middleware('can:teamfallas.edit');

Route::get('teamfallas/{falla}/tecnico-all-recursos', 'TeamfallaController@allRecursos')->name('teamfallas.allRecursos')->middleware('can:teamfallas.edit');
Route::post('teamfallas/{falla}/tecnico-all-recursos', 'TeamfallaController@storeAllRecursos')->name('teamfallas.storeAllRecursos')->middleware('can:teamfallas.edit');
