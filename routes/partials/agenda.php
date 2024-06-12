<?php
    Route::get('agenda/', 'AgendaController@index')->name('agenda.index')->middleware('can:agenda.index');
    Route::get('agenda/data', 'AgendaController@data')->name('agenda.data')->middleware('can:agenda.data');
    Route::get('eventos/loadEvent', 'EventController@loadEvent')->name('routeLoadEvent')->middleware('can:eventos.routeLoadEvent');
    Route::put('eventos/updateEvent', 'EventController@updateEvent')->name('routeUpdateEvent')->middleware('can:eventos.routeUpdateEvent');
