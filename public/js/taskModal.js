        console.log(data.tarea);
        $('#taskModel').modal('show');
        $('#equipo').text(data.equipo_text);
        $('#tarea_tipo').text(data.tarea_tipo);
        $('#tarea').text(data.tarea);
        $('#detalles').text(data.detalles);
        $('#seguridad').text('riesgo :  ' + data.seguridad);
        $('#condicion').text('condición : ' + data.condiciones);
        $('#permiso').text('¿necesario permiso ? :  ' + data.permisos);
        $('#hora_inicio').text('hora de inicio : ' + data.hora_inicio);
        $('#hora_fin').text('hora de culminación : ' + data.hora_fin);
        $('#duracion').text('duración : ' + data.duracion + ' hora(s)');
        $('#responsable').text('responsable : ' + data.responsable);
        $('#team').text('Equipo de trabajo : ' + data.team);
