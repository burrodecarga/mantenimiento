<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tipo;
use App\Protocolo;

class TipoProtocoloController extends Controller
{
    public function index(Tipo $tipo){
      $protocolosId=$tipo->protocolos;
      $protocolos=Protocolo::orderBy('tipo','asc')
      ->orderBy('protocolo','asc')
      ->get();
      $btn='save';
      return view('tipoprotocolo.index',compact('tipo','protocolos','protocolosId','btn'));
    }

    public function store(Request $request, Tipo $tipo){
        //dd($request->all());
        $protocolosId=$request->id;
        $protocolos=$tipo->protocolos()->sync($protocolosId);
        //dd($tipo->protocolos);
        //return redirect()->route('tipoprotocolos.index',$tipo->id)->with('message','Se asignaron los protocolos al tipo de equipo');
        return redirect()->route('tipos.index')->with('message','Se asignaron los protocolos al tipo de equipo');
    }
}
