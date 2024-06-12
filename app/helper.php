<?php

define('RESERVA',0.1);
define('MONEDA','Bolivar');
define('MONEDAS','Bolívares');
define('PUNTO_DECIMAL',',');
define('KIND','Mantenimiento General');
define('ANOI',2019);
define('ANOF',2031);
define('MES',array(
    'Na/A','enero','febrero','marzo','abril','mayo',
    'junio','julio','agosto','septiembre','octubre',
    'noviembre','diciembre'
));
define('DIA',array(
  'lunes','martes','miércoles','jueves','viernes','sábado','domingo'
));

function mes($i){
    $meses=['Na/A','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
  return $meses[$i];
}

function fecha($date){
    return date("d/m/Y", strtotime($date));;
}

function fechaf($date){
    return date("Y-m-d", strtotime($date));;
}


function hora($date){
    return date("g:m:i a", strtotime($date));;
}


function tipo($s){
    return str_replace('ordinario:','',$s);
}

function numerico($m){
    return number_format($m,2,',','.');
}


function miles($m){
    return number_format($m,0,',','.');
}

function roles($r){
    $r=str_replace('["','',$r);
    $r=str_replace('"]','',$r);
    return $r;
}

function permisos($r){
    $r=str_replace('["','',$r);
    $r=str_replace('"]','',$r);
    $r=str_replace('"','  ',$r);
    return $r;
}

function limpiar($r){
    $r=str_replace('["',' ',$r);
    $r=str_replace('"]',' ',$r);
    return $r;
}

function coma_a_punto($s){
    return str_replace(',','.',$s);
}

function punto_a_coma($s){
    return str_replace('.',',',$s);
}




function tipo_de_tarea(){
    $type=[
        'Inspeccion sensorial',
        'Tarea de lubricación',
        'Verificación mecánica',
        'Verificación eléctrica',
        'Análisis y mediciones de variable con instrumentos externos',
        'Limpieza y Aseo',
        'Configuración',
        'Verificación de instrumento de medida',
        'Calibración de instrumento de medida',
        'Calibración de equipo',
        'Chequeo de lazos de control',
        'Sustitución o reemplazo',
        'Reacondicionamiento'
   ];
return $type;
}

function autorizacion(){
    $authorization=['no','si','especial'];
    return $authorization;
}


function tipo_de_protocolo(){
    $tp=['general protocol','manufacturer protocol','TPM-RCM'];
    return $tp;
}

function especialidad(){
    $tp=[
    'mantenimiento general',
    'mantenimiento eléctrico',
    'mantenimiento electrónico',
    'mantenimiento mecánico',
    'mantenimiento electromecánico',
    'mantenimiento químico',
    'mantenimiento biológico',
    'mantenimiento especializado',
    ];
    return $tp;
}

function frecuencia_str(){
    $tp=[
    'diario',
    'semanal',
    'quincenal',
    'mensual',
    'bimensual',
    'trimestral',
    'cuatrimestral',
    'semestral',
    'anual',
    ];
    return $tp;
}

function periocidad($p){

    switch ($p)
    {
    case 1: $s='diario';
    break;
    case 7: $s='semanal';
    break;
    case 15: $s='quincenal';
    break;
    case 30: $s='mensual';
    break;
    case 60: $s='bimensual';
    break;
    case 90: $s='trimestral';
    break;
    case 120: $s='cuatrimestral';
    break;
    case 180: $s='semestral';
    break;
    case 360: $s='anual';
    break;
}
return $s;
}

function color($p){

    switch ($p)
    {
    case 1: $s='#0066b4';
    break;
    case 7: $s='#49BA7D';
    break;
    case 15: $s='#67BDF6';
    break;
    case 30: $s='#25DEEF';
    break;
    case 60: $s='#DE4576';
    break;
    case 90: $s='#GH785';
    break;
    case 120: $s='#EDED34';
    break;
    case 180: $s='#ABAB65';
    break;
    case 360: $s='#FE5621';
    break;
}
return $s;
}



function frecuencia(){
    $tp=[
    1,7,15,30,60,90,120,180,360
    ];
    return $tp;
}

function seguridad(){
    $tp=[
        'riesgo mínimo',
        'riesgo medio',
        'riesgo alto',
        ];
        return $tp;
}

function condiciones(){
    $tp=[
        'maquinaria detenida',
        'maquinaria en funcionamiento',
        ];
        return $tp;
}


function unidades(){
$tp=[
'Unidades de capacidad',
'Unidades de densidad',
'Unidades de energía',
'Unidades de fuerza',
'Unidades de longitud',
'Unidades de masa',
'Unidades de peso específico',
'Unidades de potencia',
'Unidades de superficie',
'Unidades de temperatura',
'Unidades de tiempo',
'Unidades de velocidad',
'Unidades de viscosidad',
'Unidades de volumen',
'Unidades eléctricas',];
return $tp;
}

function condicion(){
    $tp=[
        'activa',
        'despejada',
        'postergada',
        'en espera'
        ];
        return $tp;
}


function fallas(){
    $tp=[
        'no funciona',
        'funciona inadecuadamente',
        'falla reciente',
        'falla recurrente',
        'presenta ruido',
        'presenta vibración',
        'presenta calentamiento',
        'paraliza proceso'
        ];
        return $tp;
}

function parametros(){
    $tp=[
        'marca',
        'modelo',
        'potencia',
        'cos',
        'rpm',
        'kw',
        'watt',
        'fases',
        'serial',
        'año',
        'serie',
        'color',
        'voltaje',
        'corriente',
        'frecuencia',
        'peso',
        'volumen',
        'codigo',
        'tipo',
        'cc',
        'ca',
    ];
    return $tp;
}





