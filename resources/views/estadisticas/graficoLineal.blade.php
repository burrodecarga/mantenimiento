@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
<div class="card">
   <div class="card-body">
 <div class="row">
 <div class="col-md-4">
        <div class="form-group d-none">
                <label for="date">Fecha Inicial</label>
                <input
                type="date"
                name="fechaDeInicio"
                id="fechaInicio"
                class="form-control datepicker"
                value="{{ old('start', date('Y-m-d')) }}"
                data-date-format="yyyy-mm-dd"
                data-date-start-date="{{date('Y-m-d')}}"
                data-date-end-date="+15d">
                <small id="helpId" class="text-muted">Fecha de inicio de filtrado</small>
            </div>
 </div>
 <div class="col-md-4">
        <div class="form-group d-none">
                <label for="date">Fecha Final</label>
                <input
                type="date"
                name="fechaDeFin"
                id="FechaFin"
                class="form-control datepicker"
                value="{{ old('end', date('Y-m-d')) }}"
                data-date-format="yyyy-mm-dd"
                data-date-start-date="{{date('Y-m-d')}}"
                data-date-end-date="+15d">
                <small id="helpId" class="text-muted">Fecha de fin de filtrado</small>
            </div>
     </div>
</div>
<div id="grafico" class=" h-screen"></div>
</div>

        </div>
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
<script src="{{asset('js/graficoLineal.js')}}" charset="UTF-8"></script>

<script>
    $('.datepicker').datepicker({
        language: 'es',
    });
</script>
<script>
$(function () {
Highcharts.chart('grafico', {

    title: {
        text: 'Gastos por fallas y mantenimiento'
    },

    subtitle: {
        text: 'Año: en Curso'
    },
    xAxis: {
        categories:['ene','feb','mar','abr','may','jun','jul','ago','sep','oct','nov','dic'],
        crosshair: true
    },
    yAxis: {
        title: {
            text: 'Gastos en unidad Monetaria'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table style="width:500px">',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} fallas</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },

        }
    },

    series: [{
        name: 'Total gastos Mano de Obra',
        data:@json($array_gastos_totales_personal)
    }, {
        name: 'Total gastos Servicios',
        data: @json($array_gastos_totales_servicios)
    }, {
        name: 'Total gastos Repuestos',
        data: @json($array_gastos_totales_repuestos)
    }, {
        name: 'Total gastos Insumos',
        data: @json($array_gastos_totales_insumos)
    }, {
        name: 'Total gastos Totales',
        data: @json($array_gastos_totales_costos)
    },

    {
        name: 'Total gastos por Fallas en Mano de Obra',
        data:@json($array_gastos_falla_personal)
    }, {
        name: 'Total gastos por Fallas en Servicios',
        data: @json($array_gastos_falla_servicios)
    }, {
        name: 'Total gastos por Fallas en Repuestos',
        data: @json($array_gastos_falla_repuestos)
    }, {
        name: 'Total gastos por Fallas en Insumos',
        data: @json($array_gastos_falla_insumos)
    }, {
        name: 'Total gastos por Fallas en Totales',
        data: @json($array_gastos_falla_costos)
    },

    {
        name: 'Total gastos mantenimiento en Mano de Obra',
        data:@json($array_gastos_mant_personal)
    }, {
        name: 'Total gastos mantenimiento en Servicios',
        data: @json($array_gastos_mant_servicios)
    }, {
        name: 'Total gastos mantenimiento en Repuestos',
        data: @json($array_gastos_mant_repuestos)
    }, {
        name: 'Total gastos mantenimiento en Insumos',
        data: @json($array_gastos_mant_insumos)
    }, {
        name: 'Total gastos mantenimiento en Totales',
        data: @json($array_gastos_mant_costos)
    }






],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 100
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
});

</script>
@endsection
</div>

