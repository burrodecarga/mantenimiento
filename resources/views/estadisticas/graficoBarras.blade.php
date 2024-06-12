@extends('layouts.app')
@section('content')
<div class="container">
<div class="card">
<div class="card-body">
 <div class="row">
 <div class="col-md-4">
        <div class="form-group">
                <label for="start">Fecha Inicial</label>
                <input
                type="date"
                id="start"
                class="form-control"
                value="{{ old('start', date('Y-m-d'))}}">
                <small id="helpId" class="text-muted">Fecha de inicio de filtrado {{$start}}</small>
        </div>
 </div>
 <div class="col-md-4">
        <div class="form-group">
               <label for="end">Fecha Final</label>
               <input
                type="date"
                id="end"
                class="form-control"
                value="{{ old('end', date('Y-m-d')) }}">
                <small id="helpId" class="text-muted">Fecha de fin de filtrado</small>
            </div>
     </div>
</div>
<div id="graficoBarras"></div>
</div>
</div>
@endsection
@section('script')
<script src="{{asset('js/jquery-3.3.1.js')}}"></script>
<script src="{{asset('js/highcharts.js')}}"></script>
<script src="{{asset('js/series-label.js')}}"></script>
<script src="{{asset('js/exporting.js')}}"></script>
<script src="{{asset('js/export-data.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}} "></script>
<script src="{{asset('js/bootstrap-datepicker.es.min.js')}}" charset="UTF-8"></script>
<script>

</script>
<script>
$(function (){

const chart = Highcharts.chart('graficoBarras', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'fallas (cant.)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table style="width:300px">',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:1f} fallas</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: []
});


fetchData();

function fetchData()
 {
    const start = $('#start').val();
    const end = $('#end').val();
    // Fetch API
    $('#start').change(fetchData);
    $('#end').change(fetchData);

    const url = `reportesJson?start=${start}&end=${end}`;
    fetch(url)
      .then(response => response.json())
      .then(data => {
        console.log(data.categories);
        console.log(data.series);
        console.log(start);
        console.log(end);

        chart.xAxis[0].setCategories(data.categories);
        { if(chart.series.length>0){

               chart.series[7].remove();
               chart.series[6].remove();
               chart.series[5].remove();
               chart.series[4].remove();
               chart.series[3].remove();
               chart.series[2].remove();
               chart.series[1].remove();
               chart.series[0].remove(); }}


            chart.addSeries(data.series[0]);
            chart.addSeries(data.series[1]);
            chart.addSeries(data.series[2]);
            chart.addSeries(data.series[3]);
            chart.addSeries(data.series[4]);
            chart.addSeries(data.series[5]);
            chart.addSeries(data.series[6]);
            chart.addSeries(data.series[7]);




    });
}


//////fin funcion 0
});////
/////
</script>
@endsection
</div>
