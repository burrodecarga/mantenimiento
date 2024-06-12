<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;

use Illuminate\Support\Str;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();



        // create permissions
        Permission::create(['name' => 'roles.index', 'permiso' => 'listar roles']);
        Permission::create(['name' => 'roles.create','permiso' =>'crear roles']);
        Permission::create(['name' => 'roles.store','permiso'  =>'crear roles']);
        Permission::create(['name' => 'roles.show','permiso'   =>'ver detalle de role']);
        Permission::create(['name' => 'roles.edit','permiso'   =>'modificar role']);
        Permission::create(['name' => 'roles.update','permiso' =>'modifica role']);
        Permission::create(['name' => 'roles.destroy','permiso'=>'eliminar role']);


        Permission::create(['name' => 'permissions.create','permiso'=>'crear permisos']);
        Permission::create(['name' => 'permissions.show','permiso'=>'ver detalle permisos']);
        Permission::create(['name' => 'permissions.edit','permiso'=>'editar permisos']);
        Permission::create(['name' => 'permissions.store','permiso'=>'crear permisos']);
        Permission::create(['name' => 'permissions.update','permiso'=>'modificar permisos']);
        Permission::create(['name' => 'permissions.destroy','permiso'=>'eliminar permisos']);

        Permission::create(['name' => 'users.create','permiso'=>'crear usuario']);
        Permission::create(['name' => 'users.show','permiso'=>'ver detalle usuario']);
        Permission::create(['name' => 'users.edit','permiso'=>'modificar usuario']);
        Permission::create(['name' => 'users.store','permiso'=>'crear usuario']);
        Permission::create(['name' => 'users.update','permiso'=>'modificar usuario']);
        Permission::create(['name' => 'users.destroy','permiso'=>'eliminar usuario']);
        Permission::create(['name' => 'users.index','permiso'=>'ver listado de  usuarios']);


        Permission::create(['name' => 'profiles.create','permiso'=>'crear perfil']);
        Permission::create(['name' => 'profiles.show','permiso'=>'ver detalle de perfil']);
        Permission::create(['name' => 'profiles.edit','permiso'=>'modificar perfil']);
        Permission::create(['name' => 'profiles.store','permiso'=>'crear perfil']);
        Permission::create(['name' => 'profiles.update','permiso'=>'modificar perfil']);
        Permission::create(['name' => 'profiles.destroy','permiso'=>'eliminar perfil']);

        Permission::create(['name' => 'teams.create','permiso'=>'crear equipo de trabajo']);
        Permission::create(['name' => 'teams.show','permiso'=>'ver detalle de equipo de trabajo']);
        Permission::create(['name' => 'teams.edit','permiso'=>'modificar equipo de trabajo']);
        Permission::create(['name' => 'teams.store','permiso'=>'crear equipo de trabajo']);
        Permission::create(['name' => 'teams.update','permiso'=>'modificar equipo de trabajo']);
        Permission::create(['name' => 'teams.destroy','permiso'=>'eliminar equipo de trabajo']);
        Permission::create(['name' => 'teams.index','permiso'=>'ver listado de equipo de trabajo']);
        Permission::create(['name' => 'teams.team','permiso'=>'asignar personal a equipo de trabajo']);
        Permission::create(['name' => 'teams.noTeam','permiso'=>'eliminar personal de equipo de trabajo']);
        Permission::create(['name' => 'teams.responsable','permiso'=>'asignar responsabilidad por el equipo de trabajo']);
        Permission::create(['name' => 'teams.assign','permiso'=>'asignar personal a equipo de trabajo']);

        Permission::create(['name' => 'sistemas.create','permiso'=>'crear sistema']);
        Permission::create(['name' => 'sistemas.show','permiso'=>'ver detalle sistema']);
        Permission::create(['name' => 'sistemas.edit','permiso'=>'modificar sistema']);
        Permission::create(['name' => 'sistemas.store','permiso'=>'crear sistema']);
        Permission::create(['name' => 'sistemas.update','permiso'=>'modificar sistema']);
        Permission::create(['name' => 'sistemas.destroy','permiso'=>'eliminar sistema']);
        Permission::create(['name' => 'sistemas.index','permiso'=>'ver listado de sistemas']);
        Permission::create(['name' => 'sistemas.formImportExcel','permiso'=>'importar sistemas']);

        Permission::create(['name' => 'subsistemas.create','permiso'=>'crear subsistema']);
        Permission::create(['name' => 'subsistemas.show','permiso'=>'ver detalle subsistema']);
        Permission::create(['name' => 'subsistemas.edit','permiso'=>'modificar subsistema']);
        Permission::create(['name' => 'subsistemas.store','permiso'=>'crear subsistema']);
        Permission::create(['name' => 'subsistemas.update','permiso'=>'modificar subsistema']);
        Permission::create(['name' => 'subsistemas.destroy','permiso'=>'eliminar subsistema']);
        Permission::create(['name' => 'subsistemas.index','permiso'=>'ver listado de subsistemas']);
        Permission::create(['name' => 'subsistemas.formImportExcel','permiso'=>'importar subsistemas']);

        Permission::create(['name' => 'equipos.create','permiso'=>'crear equipo']);
        Permission::create(['name' => 'equipos.show','permiso'=>'ver detalle equipo']);
        Permission::create(['name' => 'equipos.edit','permiso'=>'modificar equipo']);
        Permission::create(['name' => 'equipos.store','permiso'=>'crear equipo']);
        Permission::create(['name' => 'equipos.update','permiso'=>'modificar equipo']);
        Permission::create(['name' => 'equipos.destroy','permiso'=>'eliminar equipo']);
        Permission::create(['name' => 'equipos.index','permiso'=>'ver listado de equipos']);
        Permission::create(['name' => 'equipos.formImportExcel','permiso'=>'importar equipos']);

        Permission::create(['name' => 'equipocaracteristica.show','permiso'=>'crear caracteristica a equipo']);
        Permission::create(['name' => 'equipocaracteristica.edit','permiso'=>'modificar caracteristica de equipo']);
        Permission::create(['name' => 'equipocaracteristica.update','permiso'=>'modificar caracteristica de equipo']);
        Permission::create(['name' => 'equipocaracteristica.clone','permiso'=>'clonar caracteristica de equipo']);
        Permission::create(['name' => 'equipocaracteristica.index','permiso'=>'ver listado de  caracteristicas de equipo']);
        Permission::create(['name' => 'equipocaracteristica.imagen','permiso'=>'subir imagen caracteristica de equipo']);
        Permission::create(['name' => 'equipocaracteristica.imagenStore','permiso'=>'subir imagen caracteristica de equipo']);
        Permission::create(['name' => 'equipocaracteristica.caracteristicas','permiso'=>'ver listado de caracteristicas de equipo']);


        Permission::create(['name' => 'tipos.create','permiso'=>'crear tipo de equipo']);
        Permission::create(['name' => 'tipos.show','permiso'=>'ver detalle de tipo de equipo']);
        Permission::create(['name' => 'tipos.edit','permiso'=>'modificar tipo de equipo']);
        Permission::create(['name' => 'tipos.store','permiso'=>'crear tipo de equipo']);
        Permission::create(['name' => 'tipos.update','permiso'=>'modificar tipo de equipo']);
        Permission::create(['name' => 'tipos.destroy','permiso'=>'eliminar tipo de equipo']);
        Permission::create(['name' => 'tipos.index','permiso'=>'ver listado de tipos de equipo']);
        Permission::create(['name' => 'tipos.formImportExcel','permiso'=>'importar tipos de equipo']);

        Permission::create(['name' => 'tipoprotocolos.create','permiso'=>'crear protocolo de equipo']);
        Permission::create(['name' => 'tipoprotocolos.show','permiso'=>'ver detalle de protocolo de equipo']);
        Permission::create(['name' => 'tipoprotocolos.edit','permiso'=>'modificar protocolo de equipo']);
        Permission::create(['name' => 'tipoprotocolos.store','permiso'=>'crear protocolo de equipo']);
        Permission::create(['name' => 'tipoprotocolos.update','permiso'=>'modificar protocolo de equipo']);
        Permission::create(['name' => 'tipoprotocolos.clone','permiso'=>'clonar protocolo de equipo']);
        Permission::create(['name' => 'tipoprotocolos.index','permiso'=>'ver listado de protocolos de equipo']);
        Permission::create(['name' => 'tipoprotocolos.imagen','permiso'=>'imagen de protocolo de equipo']);

        Permission::create(['name' => 'tipocaracteristicas.create','permiso'=>'crear caracteristica de tipo de equipo']);
        Permission::create(['name' => 'tipocaracteristicas.show','permiso'=>'ver detalle caracteristica de tipo de equipo']);
        Permission::create(['name' => 'tipocaracteristicas.edit','permiso'=>'modificar caracteristica de tipo de equipo']);
        Permission::create(['name' => 'tipocaracteristicas.store','permiso'=>'crear caracteristica de tipo de equipo']);
        Permission::create(['name' => 'tipocaracteristicas.update','permiso'=>'modificar caracteristica de tipo de equipo']);
        Permission::create(['name' => 'tipocaracteristicas.clone','permiso'=>'clonar caracteristica de tipo de equipo']);
        Permission::create(['name' => 'tipocaracteristicas.index','permiso'=>'ver listado de caracteristicas de tipo de equipo']);
        Permission::create(['name' => 'tipocaracteristicas.imagen','permiso'=>'subir imagen de caracteristica de tipo de equipo']);


        Permission::create(['name' => 'parametros.create','permiso'=>'crear parametro']);
        Permission::create(['name' => 'parametros.show','permiso'=>'ver detalle parametro']);
        Permission::create(['name' => 'parametros.edit','permiso'=>'modificar parametro']);
        Permission::create(['name' => 'parametros.store','permiso'=>'crear parametro']);
        Permission::create(['name' => 'parametros.update','permiso'=>'modificar parametro']);
        Permission::create(['name' => 'parametros.destroy','permiso'=>'eliminar parametro']);
        Permission::create(['name' => 'parametros.index','permiso'=>'ver listado de parametros']);
        Permission::create(['name' => 'parametros.formImportExcel','permiso'=>'importar parametros']);


        Permission::create(['name' => 'protocolos.create','permiso'=>'crear protocolo']);
        Permission::create(['name' => 'protocolos.show','permiso'=>'ver detalles de protocolo']);
        Permission::create(['name' => 'protocolos.edit','permiso'=>'modificar protocolo']);
        Permission::create(['name' => 'protocolos.store','permiso'=>'crear protocolo']);
        Permission::create(['name' => 'protocolos.update','permiso'=>'modificar protocolo']);
        Permission::create(['name' => 'protocolos.destroy','permiso'=>'eliminar protocolo']);
        Permission::create(['name' => 'protocolos.index','permiso'=>'ver listado de protocolos']);
        Permission::create(['name' => 'protocolos.formImportExcel','permiso'=>'importar protocolos']);

        Permission::create(['name' => 'insumos.create','permiso'=>'crear insumo']);
        Permission::create(['name' => 'insumos.show','permiso'=>'ver detalle de insumo']);
        Permission::create(['name' => 'insumos.edit','permiso'=>'modificar insumo']);
        Permission::create(['name' => 'insumos.store','permiso'=>'crear insumo']);
        Permission::create(['name' => 'insumos.update','permiso'=>'modificar insumo']);
        Permission::create(['name' => 'insumos.destroy','permiso'=>'eliminar insumo']);
        Permission::create(['name' => 'insumos.index','permiso'=>'ver listado de insumos']);
        Permission::create(['name' => 'insumos.formImportExcel','permiso'=>'importar insumos']);

        Permission::create(['name' => 'herramientas.create','permiso'=>'crear herramienta']);
        Permission::create(['name' => 'herramientas.show','permiso'=>'ver detalle de herramienta']);
        Permission::create(['name' => 'herramientas.edit','permiso'=>'modificar herramienta']);
        Permission::create(['name' => 'herramientas.store','permiso'=>'crear herramienta']);
        Permission::create(['name' => 'herramientas.update','permiso'=>'modificar herramienta']);
        Permission::create(['name' => 'herramientas.destroy','permiso'=>'eliminar herramienta']);
        Permission::create(['name' => 'herramientas.index','permiso'=>'ver listado de herramientas']);
        Permission::create(['name' => 'herramientas.formImportExcel','permiso'=>'importar herramientas']);

        Permission::create(['name' => 'servicios.create','permiso'=>'crear servicio']);
        Permission::create(['name' => 'servicios.show','permiso'=>'ver detalle servicio']);
        Permission::create(['name' => 'servicios.edit','permiso'=>'modificar servicio']);
        Permission::create(['name' => 'servicios.store','permiso'=>'crear servicio']);
        Permission::create(['name' => 'servicios.update','permiso'=>'modificar servicio']);
        Permission::create(['name' => 'servicios.destroy','permiso'=>'eliminar servicio']);
        Permission::create(['name' => 'servicios.index','permiso'=>'ver listado de servicios']);
        Permission::create(['name' => 'servicios.formImportExcel','permiso'=>'importar servicios']);

        Permission::create(['name' => 'repuestos.create','permiso'=>'crear repuesto']);
        Permission::create(['name' => 'repuestos.show','permiso'=>'ver detalle de repuesto']);
        Permission::create(['name' => 'repuestos.edit','permiso'=>'modificar repuesto']);
        Permission::create(['name' => 'repuestos.store','permiso'=>'crear repuesto']);
        Permission::create(['name' => 'repuestos.update','permiso'=>'modificar repuesto']);
        Permission::create(['name' => 'repuestos.destroy','permiso'=>'eliminar repuesto']);
        Permission::create(['name' => 'repuestos.index','permiso'=>'ver listado de repuestos']);
        Permission::create(['name' => 'repuestos.formImportExcel','permiso'=>'importar repuestos']);

        Permission::create(['name' => 'userzonas.create','permiso'=>'ubicar personal en zona']);
        Permission::create(['name' => 'userzonas.show','permiso'=>'ver detalles de zona']);
        Permission::create(['name' => 'userzonas.edit','permiso'=>'modificar ubicacion de personal']);
        Permission::create(['name' => 'userzonas.store','permiso'=>'ubicar personal en zona']);
        Permission::create(['name' => 'userzonas.update','permiso'=>'modificar ubicacion de personal']);
        Permission::create(['name' => 'userzonas.destroy','permiso'=>'eliminar ubicación de personal']);
        Permission::create(['name' => 'userzonas.index','permiso'=>'ver listado de ubicación de personal']);
        Permission::create(['name' => 'userzonas.formImportExcel','permiso'=>'importar ubicación de personal']);

        Permission::create(['name' => 'equipozonas.create','permiso'=>'ubicar equipo en zona']);
        Permission::create(['name' => 'equipozonas.show','permiso'=>'ver zona de ubicación de equipo']);
        Permission::create(['name' => 'equipozonas.edit','permiso'=>'modificar zona de ubicación de equipo']);
        Permission::create(['name' => 'equipozonas.store','permiso'=>'ubicar equipo en zona']);
        Permission::create(['name' => 'equipozonas.update','permiso'=>'modificar zona de ubicación de equipo']);
        Permission::create(['name' => 'equipozonas.destroy','permiso'=>'eliminar ubicación de equipo']);
        Permission::create(['name' => 'equipozonas.index','permiso'=>'ver listado de  ubicación de equipos']);
        Permission::create(['name' => 'equipozonas.formImportExcel','permiso'=>'importar ubicación de equipos']);

        Permission::create(['name' => 'userfallas.create','permiso'=>'reportar falla de equipo por zona']);
        Permission::create(['name' => 'userfallas.show','permiso'=>'ver detalles de falla de equipo por zona']);
        Permission::create(['name' => 'userfallas.edit','permiso'=>'modificar falla de equipo por zona']);
        Permission::create(['name' => 'userfallas.store','permiso'=>'reportar falla de equipo por zona']);
        Permission::create(['name' => 'userfallas.update','permiso'=>'modificar falla de equipo por zona']);
        Permission::create(['name' => 'userfallas.destroy','permiso'=>'eliminar falla de equipo por zona']);
        Permission::create(['name' => 'userfallas.index','permiso'=>'ver listado de  fallas de equipos por zona']);
        Permission::create(['name' => 'userfallas.formImportExcel','permiso'=>'importar fallas de equipos por zona']);

        Permission::create(['name' => 'fallas.create','permiso'=>'crear falla']);
        Permission::create(['name' => 'fallas.show','permiso'=>'ver detalles de falla']);
        Permission::create(['name' => 'fallas.edit','permiso'=>'modificar falla']);
        Permission::create(['name' => 'fallas.store','permiso'=>'crear falla']);
        Permission::create(['name' => 'fallas.update','permiso'=>'modificar falla']);
        Permission::create(['name' => 'fallas.destroy','permiso'=>'eliminar falla']);
        Permission::create(['name' => 'fallas.index','permiso'=>'ver listado de fallas']);
        Permission::create(['name' => 'fallas.formImportExcel','permiso'=>'importar fallas']);
        Permission::create(['name' => 'fallas.orden','permiso'=>'ordenar reparar falla']);

        Permission::create(['name' => 'teamfallas.create','permiso'=>'asignar falla a equipo de trabajo']);
        Permission::create(['name' => 'teamfallas.show','permiso'=>'ver detalles de falla aasignado equipo de trabajo']);
        Permission::create(['name' => 'teamfallas.edit','permiso'=>'modificar falla a equipo de trabajo']);
        Permission::create(['name' => 'teamfallas.store','permiso'=>'crear falla a equipo de trabajo']);
        Permission::create(['name' => 'teamfallas.update','permiso'=>'modificar falla a equipo de trabajo']);
        Permission::create(['name' => 'teamfallas.destroy','permiso'=>'eliminar falla a equipo de trabajo']);
        Permission::create(['name' => 'teamfallas.index','permiso'=>'ver listado de  de fallas asignadas a equipos de trabajo']);
        Permission::create(['name' => 'teamfallas.formImportExcel','permiso'=>'importar falla a equipo de trabajo']);
        Permission::create(['name' => 'teamfallas.recursos','permiso'=>'asignar repuestos, insumos o servicios a reparación de falla']);
        Permission::create(['name' => 'teamfallas.set','permiso'=>'modificar condición de falla: despejada, postergada, en espera, activa']);
        Permission::create(['name' => 'teamfallas.resumen','permiso'=>'depeje de falla y generación de reporte']);
        Permission::create(['name' => 'teamfallas.imagenStore','permiso'=>'subir imagen de falla']);
        Permission::create(['name' => 'teamfallas.report','permiso'=>'Resolver y despejar falla']);

        Permission::create(['name' => 'plans.create','permiso'=>'crear  plan de mantenimiento']);
        Permission::create(['name' => 'plans.show','permiso'=>'ver detalles  plan de mantenimiento']);
        Permission::create(['name' => 'plans.edit','permiso'=>'modificar  plan de mantenimiento']);
        Permission::create(['name' => 'plans.store','permiso'=>'crear  plan de mantenimiento']);
        Permission::create(['name' => 'plans.update','permiso'=>'modificar  plan de mantenimiento']);
        Permission::create(['name' => 'plans.destroy','permiso'=>'eliminar  plan de mantenimiento']);
        Permission::create(['name' => 'plans.index','permiso'=>'ver listado de planes de mantenimiento']);
        Permission::create(['name' => 'plans.add','permiso'=>'agregar equipos a  plan de mantenimiento']);
        Permission::create(['name' => 'plans.addStore','permiso'=>'agregar equipos a  plan de mantenimiento']);
        Permission::create(['name' => 'plans.creaTarea','permiso'=>'crear tarea a plan de mantenimiento']);
        Permission::create(['name' => 'plans.ajustes','permiso'=>'modificar posiciones de tarea en plan de mantenimiento']);
        Permission::create(['name' => 'plans.mdf','permiso'=>'mdf  plan de mantenimiento']);

        Permission::create(['name' => 'teamplans.index','permiso'=>'ver detalle team-plan']);
        Permission::create(['name' => 'teamplans.store','permiso'=>'crear team-plan']);
        Permission::create(['name' => 'teamplans.taskteam','permiso'=>'crear task-team plan']);

        Permission::create(['name' => 'feriados.create','permiso'=>'crear feriado']);
        Permission::create(['name' => 'feriados.show','permiso'=>'ver detalle feriado']);
        Permission::create(['name' => 'feriados.edit','permiso'=>'modificar feriado']);
        Permission::create(['name' => 'feriados.store','permiso'=>'crear feriado']);
        Permission::create(['name' => 'feriados.update','permiso'=>'modificar feriado']);
        Permission::create(['name' => 'feriados.destroy','permiso'=>'eliminar feriado']);
        Permission::create(['name' => 'feriados.index','permiso'=>'ver listado de  de feriado']);

        Permission::create(['name' => 'calendarios.show','permiso'=>'ver detalle calendario de tareas']);
        Permission::create(['name' => 'calendarios.showCosto','permiso'=>'ver detalle costo de tareas']);
        Permission::create(['name' => 'calendarios.index','permiso'=>'ver listado de  de calendario de tareas']);

        Permission::create(['name' => 'agenda.show','permiso'=>'ver detalle de agenda']);
        Permission::create(['name' => 'agenda.index','permiso'=>'ver agenda de tareas']);
        Permission::create(['name' => 'eventos.routeLoadEvent','permiso'=>'Listar eventos']);
        Permission::create(['name' => 'eventos.routeUpdateEvent','permiso'=>'Editar eventos']);



       $gerente_mantenimiento=gerente_mantenimiento();
       $gerente_planificacion=gerente_planificacion();
       $jefe_planificacion=jefe_planificacion();
       $planificador=planificador();
       $jefe_mantenimiento=jefe_mantenimiento();
       $jefe_supervisores=jefe_supervisores();
       $supervisor=supervisor();
       $tecnico=tecnico();
       $inhabilitado=[];
       $operador=operador();

        $supervisorbdc=[
            'teams.index',
            'teams.create',
            'teams.show',
            'teams.edit',
            'teams.store',
            'teams.update',
            'teams.destroy',

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



            'protocolos.create',
            'protocolos.show',
            'protocolos.edit',
            'protocolos.store',
            'protocolos.update',
            'protocolos.destroy',
            'protocolos.index',
            'protocolos.formImportExcel',

            'insumos.create',
            'insumos.show',
            'insumos.edit',
            'insumos.store',
            'insumos.update',
            'insumos.destroy',
            'insumos.index',
            'insumos.formImportExcel',


            'herramientas.create',
            'herramientas.show',
            'herramientas.edit',
            'herramientas.store',
            'herramientas.update',
            'herramientas.destroy',
            'herramientas.index',
            'herramientas.formImportExcel',

            'servicios.create',
            'servicios.show',
            'servicios.edit',
            'servicios.store',
            'servicios.update',
            'servicios.destroy',
            'servicios.index',
            'servicios.formImportExcel',

            'repuestos.create',
            'repuestos.show',
            'repuestos.edit',
            'repuestos.store',
            'repuestos.update',
            'repuestos.destroy',
            'repuestos.index',
            'repuestos.formImportExcel',

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

            'userfallas.create',
            'userfallas.show',
            'userfallas.edit',
            'userfallas.store',
            'userfallas.update',
            'userfallas.destroy',
            'userfallas.index',
            'userfallas.formImportExcel',

            'fallas.create',
            'fallas.show',
            'fallas.edit',
            'fallas.store',
            'fallas.update',
            'fallas.destroy',
            'fallas.index',
            'fallas.formImportExcel',

                  ];

      $operador=[
        'userfallas.create',
        'userfallas.show',
        'userfallas.edit',
        'userfallas.store',
        'userfallas.update',
        'userfallas.destroy',
        'userfallas.index',
        'userfallas.formImportExcel'
      ];

      $team=[
        'teamfallas.create',
        'teamfallas.show',
        'teamfallas.edit',
        'teamfallas.store',
        'teamfallas.update',
        'teamfallas.destroy',
        'teamfallas.index',
        'teamfallas.formImportExcel'
      ];



      $role = Role::create(['name' => 'operador','area'=>'operativa']);
      $role->givePermissionTo($operador);


      $role = Role::create(['name' => 'tecnico','area'=>'tecnica']);
      $role->givePermissionTo($tecnico);

        // create roles and assign created permissions
        // this can be done as separate statements
        $role = Role::create(['name' => 'gerente-planificacion','area'=>'operativa']);
        $role->givePermissionTo($gerente_planificacion);

        $role = Role::create(['name' => 'jefe-planificacion','area'=>'operativa']);
        $role->givePermissionTo($jefe_planificacion);

        $role = Role::create(['name' => 'planificador','area'=>'operativa']);
        $role->givePermissionTo($planificador);

        $role = Role::create(['name' => 'gerente-mantenimiento','area'=>'operativa']);
        $role->givePermissionTo($gerente_mantenimiento);

        $role = Role::create(['name' => 'jefe-mantenimiento','area'=>'operativa']);
        $role->givePermissionTo($jefe_mantenimiento);

        $role = Role::create(['name' => 'jefe-supervisores','area'=>'operativa']);
        $role->givePermissionTo($jefe_supervisores);

        $role = Role::create(['name' => 'supervisor','area'=>'operativa']);
        $role->givePermissionTo($supervisor);

        $role = Role::create(['name' => 'tecnico-mantenimiento','area'=>'operativa']);
        $role->givePermissionTo($tecnico);

        $role = Role::create(['name' => 'operador-equipo','area'=>'operativa']);
        $role->givePermissionTo($operador);

        $role = Role::create(['name' => 'operador-zona','area'=>'operativa']);
        $role->givePermissionTo($operador);

        // or may be done by chaining
        $role = Role::create(['name' => 'inhabilitado','area'=>'operativa']);
        //    ->givePermissionTo(['publish articles', 'unpublish articles']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $user = User::create([
            'name' => "Edwin Henriquez",
            'email' => "ed@gmail.com",
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),

        ]);
        $user->assignRole('super-admin');

        $user = User::create([
            'name' => "Usuario Operador de Equipos",
            'email' => "operador@gmail.com",
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'zona_id'=>2,
        ]);
        $user->assignRole('operador');

        $user = User::create([
            'name' => "Usuario Ténico reparador de Equipos",
            'email' => "tecnico@gmail.com",
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('tecnico');

        $user = User::create([
            'name' => "Supervisor de zona",
            'email' => "supervisor@gmail.com",
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'zona_id'=>2,
        ]);
        $user->assignRole('supervisor');



        $user = User::create([
            'name' => "Gerente de Planificacion",
            'email' => "gp@gmail.com",
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),

        ]);
        $user->assignRole('gerente-planificacion');

        $user = User::create([
            'name' => "Jefe de Planificacion",
            'email' => "jp@gmail.com",
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('jefe-planificacion');


        $user = User::create([
            'name' => "Planificador",
            'email' => "p@gmail.com",
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('planificador');


        $user = User::create([
            'name' => "Gerente de Mantenimiento",
            'email' => "gm@gmail.com",
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('gerente-mantenimiento');


        $user = User::create([
            'name' => "Jefe de Mantenimiento",
            'email' => "jm@gmail.com",
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole('jefe-mantenimiento');

        $user = User::create([
            'name' => "Jefe de Supervisores",
            'email' => "js@gmail.com",
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'zona_id'=>2,
        ]);
        $user->assignRole('jefe-supervisores');



        $user = User::create([
            'name' => "Operador de Equipo",
            'email' => "oe@gmail.com",
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'zona_id'=>2,
        ]);
        $user->assignRole('operador-equipo');

        $user = User::create([
            'name' => "Operador de Zona",
            'email' => "oz@gmail.com",
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'zona_id'=>2,
        ]);
        $user->assignRole('operador-zona');

        $user = User::create([
            'name' => "Operador de Zona 2",
            'email' => "oz2@gmail.com",
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'zona_id'=>3,
        ]);
        $user->assignRole('operador-zona');

        $user = User::create([
            'name' => "Operador de Zona 3",
            'email' => "oz3@gmail.com",
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'zona_id'=>4,
        ]);
        $user->assignRole('operador-zona');


        $user = User::create([
            'name' => "Equipo de Trabajo",
            'email' => "team@gmail.com",
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'zona_id'=>3,
        ]);
        $user->assignRole('tecnico-mantenimiento');

        $user = User::create([
            'name' => "Tecnico de Mantenimiento",
            'email' => "tm@gmail.com",
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'zona_id'=>3,
        ]);
        $user->assignRole('tecnico-mantenimiento');

         factory(App\Sistema::class)->create([
            'name'=>mb_strtolower('Sistema Eléctrico'),
            'slug'=>Str::slug('Sistema Electrico'),
            'description'=>'Equipos eléctricos de alta, mediana y baja tensión',
        ]);




        factory(App\Sistema::class)->create([
            'name'=>mb_strtolower('Sistema Transporte'),
            'slug'=>Str::slug('Sistema Transporte'),
            'description'=>'Vehículos, autos y motos, aéreos y marítimos',

        ]);

        factory(App\Sistema::class)->create([
            'name'=>mb_strtolower('Sistema Aguas Blancas'),
            'slug' =>Str::slug('Sistema Aguas Blancas'),
            'description'=>'Tanques, tuberías, bombas, filtros de aguas blancas ',

        ]);

        factory(App\Sistema::class)->create([
            'name'=>mb_strtolower('Sistema Aguas Residuales'),
            'slug'=> Str::slug('Sistema Aguas Residuales'),
            'description'=>'Tanques, tuberías, bombas, filtros de aguas residuales',

        ]);

        factory(App\Sistema::class)->create([
            'name'=>mb_strtolower('Estructuras y Edificaciones'),
            'slug'=>Str::slug('Estructuras y Edificaciones'),
            'description'=>'Oficinas, edificios, galpones etc',

        ]);

        factory(App\Sistema::class)->create([
            'name'=>mb_strtolower('Sistema Areas Verdes'),
            'slug'=>Str::slug('Sistema Areas Verdes'),
            'description'=>'Bosques, Jardines, huertos',
        ]);


        for ($i=0; $i <15 ; $i++)
        {
           factory(App\Subsistema::class)->create([
            'name'=>mb_strtolower('Sub Sistema '.$i),
            'slug'=>Str::slug('Sub Sistema '.$i),
            'description'=>'Sub Sistema '.$i.' descripcion',
        ]);
        }


        factory(App\tipo::create([
            'name'=>mb_strtolower('Motor Eléctrico'),
            'slug'=>Str::slug('motor electrico'),
        ]));

        factory(App\tipo::create([
            'name'=>mb_strtolower('Motor Gasolina'),
            'slug'=>Str::slug('motor gasolina'),
        ]));

        factory(App\tipo::create([
            'name'=>mb_strtolower('Motor Vapor'),
            'slug'=>Str::slug('motor vapor'),
        ]));


        factory(App\tipo::create([
            'name'=>mb_strtolower('Motor Diesel'),
            'slug'=>Str::slug('motor diesel'),
        ]));

        factory(App\tipo::create([
            'name'=>mb_strtolower('Bomba Centrífuga'),
            'slug'=>Str::slug('bomba centrifuga'),
        ]));

        factory(App\tipo::create([
            'name'=>mb_strtolower('Turbina'),
            'slug'=>Str::slug('turbina'),
        ]));

        factory(App\tipo::create([
            'name'=>mb_strtolower('Vehículo'),
            'slug'=>Str::slug('vehiculo'),
        ]));

    }
}
