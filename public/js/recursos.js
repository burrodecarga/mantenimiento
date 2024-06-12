document.addEventListener("DOMContentLoaded", function () {

    $(document).ready(function () {
        $('#alerta').hide();
    });

    $(document).ready(function () {
        $('#recursos tbody').on('click', 'tr', function () {
            var data = table.row(this).data();
            datos=data[0];
            cadena=datos.split('-');
            //alert(cadena);
           asignaRecurso(cadena[0],cadena[1],cadena[2]);
        })

    });





    function asignaRecurso(falla, recurso, t) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        //alert('yyy' + falla + '-' + recurso + '-' + t);
        tabla = ['ninguna', 'repuestos', 'insumos', 'servicios'];
        var row =
        $('#alerta').fadeIn().delay(300).fadeOut();;

            $.ajax({
                url: `/teamfallas/asignarRecurso/`+falla,
                type: 'POST',

                data: {
                    _method: 'PUT',
                    falla: falla,
                    recurso: recurso,
                    t: t
                },
                success: function (data) {
                    console.log(data);
                    //window.location.reload();

                    agregarFila(data);
                },
                error: function (data) {
                    console.log('Error:', data);
                },
            })
    };


    function agregarFila(data) {

        var htmlTags = `
        <tr>
                                        <td style="width:10%" scope="row" class="text-center"><a href="{{route('teamfallas.noasignar',[`+data.id+`])}} "><i class="fa fa-arrow-alt-circle-left text-danger" aria-hidden="true"></i> </a></td>
                                        <td style="width:80%" scope="row">`+data.name+`</td>
                                        <td style="width:10%" scope="row" class="text-center">
                                        <a href="#" onClick="window.location.reload();">`+data.cantidad+`</a>
                                        </td>
                                     </tr>
        `;
        $('#team tbody').append(htmlTags);


     }

});
