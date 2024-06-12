<?php
function operador(){
        $operador=[
            'userfallas.create',
            'userfallas.show',
            'userfallas.store',
            'userfallas.update',
            'userfallas.index',
            'feriados.index'
            ];
            return $operador;
}

function tecnico(){
    $tecnico = [
        'sistemas.show',
        'sistemas.index',
        'subsistemas.show',
        'subsistemas.index',
        'equipos.show',
        'equipos.index',
        'equipocaracteristica.show',
        'tipos.show',
        'tipos.index',
        'insumos.show',
        'insumos.index',
        'herramientas.show',
        'herramientas.index',
        'servicios.show',
        'servicios.index',
        'repuestos.show',
        'repuestos.index',
        'protocolos.show',
        'protocolos.index',
        'teamfallas.create',
        'teamfallas.show',
        'teamfallas.edit',
        'teamfallas.store',
        'teamfallas.update',
        'teamfallas.destroy',
        'teamfallas.index',
        'teamfallas.recursos',
        'teamfallas.set',
        'teamfallas.resumen',
        'teamfallas.report',
        'equipozonas.show',
        'equipozonas.index',
          'fallas.show',
          'fallas.edit',
          'fallas.store',
          'fallas.update',
          'feriados.index'
    ];
    return $tecnico;
}


function supervisor(){
    $s = [
        'sistemas.show',
        'sistemas.index',
        'subsistemas.show',
        'subsistemas.index',
        'equipos.show',
        'equipos.index',
        'equipocaracteristica.show',
        'tipos.show',
        'tipos.index',
        'insumos.show',
        'insumos.index',
        'herramientas.show',
        'herramientas.index',
        'servicios.show',
        'servicios.index',
        'repuestos.show',
        'repuestos.index',
        'protocolos.show',
        'protocolos.index',
        'teams.index',
        'teams.show',
        'userzonas.show',
        'userzonas.index',
        'equipozonas.show',
        'equipozonas.index',
        'userfallas.show',
        'userfallas.index',
        'fallas.create',
        'fallas.show',
        'fallas.edit',
        'fallas.store',
        'fallas.update',
        'fallas.index',
        'fallas.orden',
        'feriados.index'
    ];
return $s;
}

function jefe_supervisores(){
    $js = [
        'sistemas.show',
        'sistemas.index',
        'subsistemas.show',
        'subsistemas.index',
        'equipos.show',
        'equipos.index',
        'equipocaracteristica.show',
        'tipos.show',
        'tipos.index',
        'insumos.show',
        'insumos.index',
        'herramientas.show',
        'herramientas.index',
        'servicios.show',
        'servicios.index',
        'repuestos.show',
        'repuestos.index',
        'protocolos.show',
        'protocolos.index',
        'teams.index',
        'teams.create',
        'teams.show',
        'teams.edit',
        'teams.store',
        'teams.update',
        'teams.destroy',
        'teams.team',
        'teams.noTeam',
        'teams.responsable',
        'teams.assign',
        'userzonas.create',
         'userzonas.show',
         'userzonas.edit',
         'userzonas.store',
         'userzonas.update',
        'userzonas.index',
        'equipozonas.show',
        'equipozonas.index',
        'fallas.show',
        'fallas.index',
        'feriados.index',
        'plans.show',
        'plans.index',
        'calendarios.show',
        'calendarios.showCosto',
        'calendarios.index',
        'agenda.show',
        'agenda.index',
        'eventos.routeLoadEvent'
    ];
 return $js;
}


function jefe_mantenimiento(){
    $jm = [
     'sistemas.show',
     'sistemas.index',
     'subsistemas.show',
     'subsistemas.index',
     'equipos.show',
     'equipos.index',
     'equipocaracteristica.show',
     'tipos.show',
     'tipos.index',
     'parametros.show',
     'parametros.index',
     'protocolos.show',
     'protocolos.index',
     'insumos.show',
     'insumos.index',
     'herramientas.show',
     'herramientas.index',
     'servicios.show',
     'servicios.index',
     'repuestos.show',
     'repuestos.index',
     'teams.index',
     'teams.show',
     'teamplans.index',
     'teamplans.store',
     'teamplans.taskteam',
     'userzonas.create',
     'userzonas.show',
     'userzonas.index',
     'equipozonas.create',
     'equipozonas.show',
     'equipozonas.index',
     'fallas.show',
     'fallas.index',
     'feriados.index',
     'plans.show',
     'plans.index',
      'calendarios.show',
      'calendarios.showCosto',
      'calendarios.index',
      'agenda.show',
      'agenda.index',
      'eventos.routeLoadEvent',
      'eventos.routeUpdateEvent',
 ];
 return $jm;
}






function gerente_planificacion(){
    $gm=[
        'plans.create',
        'plans.show',
        'plans.edit',
        'plans.store',
        'plans.update',
        'plans.destroy',
        'plans.index',
        'plans.add',
        'plans.addStore',
        'plans.creaTarea',
        'plans.ajustes',
        'plans.mdf',

        'protocolos.create',
        'protocolos.show',
        'protocolos.edit',
        'protocolos.store',
        'protocolos.update',
        'protocolos.destroy',
        'protocolos.index',
        'protocolos.formImportExcel',

        'tipoprotocolos.create',
        'tipoprotocolos.show',
        'tipoprotocolos.edit',
        'tipoprotocolos.store',
        'tipoprotocolos.update',
        'tipoprotocolos.clone',
        'tipoprotocolos.index',
        'tipoprotocolos.imagen',

        'tipocaracteristicas.create',
        'tipocaracteristicas.show',
        'tipocaracteristicas.edit',
        'tipocaracteristicas.store',
        'tipocaracteristicas.update',
        'tipocaracteristicas.clone',
        'tipocaracteristicas.index',
        'tipocaracteristicas.imagen',

        'teamplans.index',
        'teamplans.store',
        'teamplans.taskteam',

        'feriados.create',
        'feriados.show',
        'feriados.edit',
        'feriados.store',
        'feriados.update',
        'feriados.destroy',
        'feriados.index',

        'agenda.show',
        'agenda.index',

    ];
    return $gm;
}

function jefe_planificacion(){
    $jefe_planificacion=[
        'plans.create',
        'plans.show',
        'plans.edit',
        'plans.store',
        'plans.update',
        'plans.destroy',
        'plans.index',
        'plans.add',
        'plans.addStore',
        'plans.creaTarea',
        'plans.ajustes',
        'plans.mdf',

        'protocolos.create',
        'protocolos.show',
        'protocolos.edit',
        'protocolos.store',
        'protocolos.update',
        'protocolos.destroy',
        'protocolos.index',
        'protocolos.formImportExcel',

        'tipoprotocolos.create',
        'tipoprotocolos.show',
        'tipoprotocolos.edit',
        'tipoprotocolos.store',
        'tipoprotocolos.update',
        'tipoprotocolos.clone',
        'tipoprotocolos.index',
        'tipoprotocolos.imagen',

        'tipocaracteristicas.create',
        'tipocaracteristicas.show',
        'tipocaracteristicas.edit',
        'tipocaracteristicas.store',
        'tipocaracteristicas.update',
        'tipocaracteristicas.clone',
        'tipocaracteristicas.index',
        'tipocaracteristicas.imagen',

        'teamplans.index',
        'teamplans.store',
        'teamplans.taskteam',

        'feriados.create',
        'feriados.show',
        'feriados.edit',
        'feriados.store',
        'feriados.update',
        'feriados.destroy',
        'feriados.index',
    ];

return $jefe_planificacion;
}

function planificador(){
    $planificador=[
        'plans.create',
        'plans.show',
        'plans.edit',
        'plans.store',
        'plans.update',
        'plans.destroy',
        'plans.index',
        'plans.add',
        'plans.addStore',
        'plans.creaTarea',
        'plans.ajustes',
        'plans.mdf',

        'protocolos.create',
        'protocolos.show',
        'protocolos.edit',
        'protocolos.store',
        'protocolos.update',
        'protocolos.destroy',
        'protocolos.index',
        'protocolos.formImportExcel',

        'tipoprotocolos.create',
        'tipoprotocolos.show',
        'tipoprotocolos.edit',
        'tipoprotocolos.store',
        'tipoprotocolos.update',
        'tipoprotocolos.clone',
        'tipoprotocolos.index',
        'tipoprotocolos.imagen',

        'tipocaracteristicas.create',
        'tipocaracteristicas.show',
        'tipocaracteristicas.edit',
        'tipocaracteristicas.store',
        'tipocaracteristicas.update',
        'tipocaracteristicas.clone',
        'tipocaracteristicas.index',
        'tipocaracteristicas.imagen',

        'teamplans.index',
        'teamplans.store',
        'teamplans.taskteam',

        'feriados.create',
        'feriados.show',
        'feriados.edit',
        'feriados.store',
        'feriados.update',
        'feriados.destroy',
        'feriados.index',

    ];

    return $planificador;

}

function gerente_mantenimiento(){
    $gm=[
        'users.create',
        'users.show',
        'users.edit',
        'users.store',
        'users.update',
        'users.destroy',
        'users.index',

        'profiles.create',
        'profiles.show',
        'profiles.edit',
        'profiles.store',
        'profiles.update',
        'profiles.destroy',

        'sistemas.create',
        'sistemas.show',
        'sistemas.edit',
        'sistemas.store',
        'sistemas.update',
        'sistemas.destroy',
        'sistemas.index',
        'sistemas.formImportExcel',

        'subsistemas.show',
        'subsistemas.create',
        'subsistemas.edit',
        'subsistemas.store',
        'subsistemas.update',
        'subsistemas.destroy',
        'subsistemas.index',
        'subsistemas.formImportExcel',

        'equipos.show',
        'equipos.create',
        'equipos.edit',
        'equipos.store',
        'equipos.update',
        'equipos.destroy',
        'equipos.index',
        'equipos.formImportExcel',

        'equipocaracteristica.show',
        'equipocaracteristica.edit',
        'equipocaracteristica.update',
        'equipocaracteristica.clone',
        'equipocaracteristica.index',
        'equipocaracteristica.imagen',
        'equipocaracteristica.imagenStore',
        'equipocaracteristica.caracteristicas',

        'tipos.show',
        'tipos.create',
        'tipos.edit',
        'tipos.store',
        'tipos.update',
        'tipos.destroy',
        'tipos.index',
        'tipos.formImportExcel',

        'parametros.show',
        'parametros.create',
        'parametros.edit',
        'parametros.store',
        'parametros.update',
        'parametros.destroy',
        'parametros.index',
        'parametros.formImportExcel',

        'feriados.create',
        'feriados.show',
        'feriados.edit',
        'feriados.store',
        'feriados.update',
        'feriados.destroy',
        'feriados.index',

        'userzonas.create',
        'userzonas.show',
        'userzonas.edit',
        'userzonas.store',
        'userzonas.update',
        'userzonas.destroy',
        'userzonas.index',
        'userzonas.formImportExcel',

        'equipozonas.create',
        'equipozonas.show',
        'equipozonas.edit',
        'equipozonas.store',
        'equipozonas.update',
        'equipozonas.destroy',
        'equipozonas.index',
        'equipozonas.formImportExcel',

        'plans.index',
        'plans.show'
       ];
       return $gm;
}



