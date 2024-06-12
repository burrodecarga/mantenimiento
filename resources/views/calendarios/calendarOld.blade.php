@extends('layouts.app')
@section('content')
<link href="{{ asset('assets\fullcalendar\packages\core\main.css')}}"  rel='stylesheet' />
<link href="{{ asset('assets\fullcalendar\packages\daygrid\main.css')}}"  rel='stylesheet' />
<link href="{{ asset('assets\fullcalendar\packages\timegrid\main.css')}}"  rel='stylesheet' />
<link href="{{ asset('assets\fullcalendar\packages\list\main.css')}}"  rel='stylesheet'/>
<div class="container">
    <div class="row bg-white rounded p-3">
        <div class="col-12 mx-auto">
            <div class="response"></div>
            <div
            id='calendar'
            data-route-event-update="{{route('calendarios.eventUpdate')}}"
            ></div>
        </div>
    </div>
</div>
@endsection
@section('script')

<script src="{{ asset('assets\fullcalendar\packages\core\main.js')}}" defer ></script>
<script src="{{ asset('assets\fullcalendar\packages\interaction\main.js')}}" defer ></script>
<script src="{{ asset('assets\fullcalendar\packages\daygrid\main.js')}}" defer ></script>
<script src="{{ asset('assets\fullcalendar\packages\timegrid\main.js')}}" defer ></script>
<script src="{{ asset('assets\fullcalendar\packages\list\main.js')}}" defer ></script>
<script src="{{ asset('assets\fullcalendar\packages\moment\main.js')}}" defer ></script>
<script src="{{ asset('assets\fullcalendar\packages\list\main.js')}}" defer ></script>
<script src="{{ asset('assets\fullcalendar\packages\core\locales\es.js')}}" defer ></script>
<script>

document.addEventListener('DOMContentLoaded', function() {

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

     const inicio = @json($start);
      //console.log(start);
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        height: 'parent',
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        defaultView: 'timeGridDay',
        defaultDate: '2020-01-01',
        languaje: 'es',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        businessHours:[
            {
                daysOfWeek: [ 1, 2, 3, 4,5 ],
                startTime: '07:00',
                endTime: '12:00'
            },
            {
                daysOfWeek: [ 1, 2, 3, 4 ],
                startTime: '13:30',
                endTime: '18:30'
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
               selectable: true,
               events:{ url:`/calendarios/listadoDeTareas/render`},
               eventClick: function(info)
               {
               //alert('Event: start:' + info.event.start+' end:'+info.event.end+' '+info.event);
               console.log(info.event.id+'  '+info.event.start+'  '+info.event.end);
               // alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
               // alert('View: ' + info.view.type);

               // // change the border color just for fun
               // info.el.style.borderColor = 'red';
              },
              editable:true,
              eventDrop: function(element) {
                  let start=moment(element.event.start).format('YYYY-MM-DD HH:mm:ss');
                  let end=moment(element.event.start).format('YYYY-MM-DD HH:mm:ss');
                  let newEvent=
                  {
                      _method:'PUT',
                      "_token": $('#token').val(),
                      id:element.event.id,
                      start:start,
                      end:end
                  }
                  sendEvent(routeEvent('route-event-update'),newEvent);
              }

    });

    function routeEvent(route){
      return document.getElementById('calendar').dataset[route];
    }

    function  sendEvent(route, data_)
    {
        $.ajax({
            url:route,
            data:data_,
            method:'POST',
            dataType:'json',
            success:function(json){
             console.log(json);
            }});
    }


    calendar.render();
    });

  </script>
@endsection
