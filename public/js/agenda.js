document.addEventListener('DOMContentLoaded', function() {
   const lav=document.querySelector('#calendar').dataset.lav;
   const las=document.querySelector('#calendar').dataset.las;
   const ilm=document.querySelector('#calendar').dataset.ilm;
   const flm=document.querySelector('#calendar').dataset.flm;
   const ilt=document.querySelector('#calendar').dataset.ilt;
   const flt=document.querySelector('#calendar').dataset.flt;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var now = new Date();
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      locale: 'es',
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      defaultView: 'dayGridMonth',
      forceEventDuration:true,
      defaultDate: now,
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      droppable:true,
      selectable:true,
      eventLimit: true, // allow "more" link when too many events
      businessHours:[
        {
            daysOfWeek: las,
            startTime: ilm,
            endTime: flm
        },
        {
            daysOfWeek: lav,
            startTime: ilt,
            endTime: flt
        }
        ],
            height: 500,
            slotMinutes: 25,
            loading: function(bool){
                if (bool)
                $('#loading').show();
                else
                $('#loading').hide();
            },

       //events:{url:`eventos/loadEvent`},
       events:routeEvent('routeLoadEvent'),

      eventDrop:function(element){
        let start=moment(element.event.start).format('YYYY-MM-DD HH:mm:ss');
        let end=moment(element.event.end).format('YYYY-MM-DD HH:mm:ss');
        console.log('Evento->'+element.event.allDay);
        let newEvent={
            _method:'PUT',
            id:element.event.id,
            start:start,
            end:end,
            allDay:element.event.allDay,
        }
        sendEvent(routeEvent('routeUpdateEvent'),newEvent);

      },
      nowIndicator:true,

      eventClick:function(element){
        console.log('Click'+element.event.id);
        getEvento(element.event.id);
    },

    eventResize:function(element){
        let start=moment(element.event.start).format('YYYY-MM-DD HH:mm:ss');
        let end=moment(element.event.end).format('YYYY-MM-DD HH:mm:ss');

        let newEvent={
            _method:'PUT',
            id:element.event.id,
            start:start,
            end:end,
            allDay:element.event.allDay
        }
        console.log(newEvent);
        sendEvent(routeEvent('routeUpdateEvent'),newEvent);
    },

    select:function(element){
        console-log('select'+element);
    },

    visibleRange: function(currentDate) {
      // Generate a new date for manipulating in the next step
      var startDate = new Date(currentDate.valueOf());
      var endDate = new Date(currentDate.valueOf());

      // Adjust the start & end dates, respectively
      startDate.setDate(startDate.getDate() - 1); // One day in the past
      endDate.setDate(endDate.getDate() + 30); // Two days into the future

      return { start: startDate, end: endDate };
    }

    });

    calendar.render();

  });

  function routeEvent(route){

    ruta=document.getElementById('calendar').dataset[route];
    return ruta;

  }

  function  sendEvent(route, data_)
  {
      $.ajax({

          url:route,
          data:data_,
          method:'POST',
          dataType:'json',
          success:function(json){
           if(json){location.reload();}
          }
        });
  }

  function getEvento(id){
     // alert(id);
      $.ajax({
          url:`agenda/data`,
          data:{id:id},
          success:function(data){
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

          }
      })
  }
