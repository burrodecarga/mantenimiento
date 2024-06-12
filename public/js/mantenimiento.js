
const select = document.getElementById('sistema_id');
const subsistema_id = document.getElementById('subsistema_id');

window.addEventListener('load', function() {
    jQuery.prototype.init.prototype = jQuery.prototype;
    selectSistema();

})

function selectSistema(){

 const id = document.getElementById("sistema_id").value;
 const sistema = select.options[select.selectedIndex].text;

    //Controlador externo
    const url = `/equipos/getsubsistemas/`;

    $.ajax({
        url:url+id,
        type:'GET',
        success:function(data){
            let opciones='';
             console.log(url);
             data.forEach(sistema => {
                  console.log(` ${sistema.id}-${sistema.name}`);
                  opciones +=`<option value="${sistema.id}">${sistema.name}</option>`;
                  console.log(opciones);
             });
            $('#subsistema_id').html(opciones);
        }
    });

}

function selectSistema_1(pre){

    const id = document.getElementById("sistema_id").value;
    const sistema = select.options[select.selectedIndex].text;

       //Controlador externo
       const url = `/equipos/getsubsistemas/`;
     $("#subsistema_id_1").empty();
       $.ajax({
           url:url+id,
           type:'GET',
           success:function(data){

               let opciones='';
                console.log(url);
                data.forEach(subsistema => {
                     console.log(` ${subsistema.id}-${subsistema.name}`);
                     opciones +=`<option value="${subsistema.id}">${subsistema.name}</option>`;
                     console.log(opciones);
                });
               $('#subsistema_id_1').html(opciones);
           }
       });

}

function chequear(id){
    alert(id);
}

