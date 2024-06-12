<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendario;

class AgendaController extends Controller
{
    public function index(Request $request){
        function lunes_a_viernes(){
            return [1,2,3,4,5];
        }

        function lunes_a_sabado(){
            return [1,2,3,4,5,6];
        }

        $inicioLaboresManana=inicio_labores_manana();
        $inicioLaboresTarde=inicio_labores_tarde();
        $finLaboresManana=fin_labores_manana();
        $finLaboresTarde=fin_labores_tarde();
        $lunesAViernes=lunes_a_viernes();
        $lunesASabado=lunes_a_sabado();
    return view('agenda.index',compact('inicioLaboresManana','finLaboresManana','inicioLaboresTarde','finLaboresTarde','lunesAViernes','lunesASabado'));
    }

    public function data(Request $request){
        return $evento=Calendario::find($request->id);
    }
}
