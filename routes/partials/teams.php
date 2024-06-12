<?php
Route::post('teams/store', 'TeamController@store')->name('teams.store')->middleware('can:teams.create');
Route::get('teams', 'TeamController@index')->name('teams.index')->middleware('can:teams.index');
Route::get('teams/create', 'TeamController@create')->name('teams.create')->middleware('can:teams.create');
Route::put('teams/{user}', 'TeamController@update')->name('teams.update')->middleware('can:teams.edit');
Route::get('teams/{user}', 'TeamController@show')->name('teams.show')->middleware('can:teams.show');
Route::delete('teams/{user}', 'TeamController@destroy')->name('teams.destroy')->middleware('can:teams.destroy');
route::get('teams/{id}/assign', 'TeamController@assign')->name('teams.assign')->middleware('can:teams.assign');
route::get('teams/{id}/{jd}/team', 'TeamController@team')->name('teams.team')->middleware('can:teams.team');
route::get('teams/{id}/{jd}/noTeam', 'TeamController@noTeam')->name('teams.noTeam')->middleware('can:teams.noTeam');
route::get('teams/{user}/{team}/responsable', 'TeamController@responsable')->name('teams.responsable')->middleware('can:teams.responsable');
Route::get('teams/{team}/edit', 'TeamController@edit')->name('teams.edit')->middleware('can:teams.edit');
