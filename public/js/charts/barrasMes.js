
const chart = Highcharts.chart('grafico', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Citas por Mes'
    },
    xAxis: {
        categories: [],
        crosshair: true,
        title: {
            text: 'Mes'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Citas atendidas'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    series: []
});

let $start, $end;

function fetchData() {
    const startDate = $start.val();
    const endDate = $end.val();

    // Fetch API
    const url = `citasJsonMes`;

    fetch(url)
      .then(response => response.json())
      .then(data => {
        // console.log(data);
        chart.xAxis[0].setCategories(data.categories);

        if (chart.series.length > 0) {
            chart.series[3].remove();
            chart.series[2].remove();
            chart.series[1].remove();
            chart.series[0].remove();
        }

        chart.addSeries(data.series[0]); // Atendida
        chart.addSeries(data.series[1]); // Cancelada
        chart.addSeries(data.series[2]); // Atendida
        chart.addSeries(data.series[3]); // Cancelada
      });
}

$(function () {
    $start = $('#startDate');
    $end = $('#endDate');

    fetchData();

    $start.change(fetchData);
    $end.change(fetchData);
});
