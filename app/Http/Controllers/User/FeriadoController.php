<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Feriado;
use Illuminate\Support\Carbon;

class FeriadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $feriados=Feriado::orderBy('fecha','asc')->paginate(10);
       return view('feriados.index',compact('feriados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $feriado=new Feriado;
        $feriado->fecha=now();
        $btn="save";
        return view('feriados.create',compact('feriado','btn'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=['name'=>'required','fecha'=>'required'];
        $this->validate($request, $rules);
        Feriado::create([
            'name'=>$request->name,
            'fecha'=>$request->fecha,

        ]);
        return redirect()->route('feriados.index')->with('message','La fecha feriado '.$request->name. ' fue creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feriado=Feriado::find($id);
        $btn="modify";
        return view('feriados.edit',compact('feriado','btn'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=['name'=>'required','fecha'=>'required'];
        $this->validate($request, $rules);
        $feriado=Feriado::find($id);
        $feriado->update([
            'name'=>$request->name,
            'fecha'=>$request->fecha,

        ]);
        return redirect()->route('feriados.index')->with('message','La fecha feriado '.$request->name. ' fue creada correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feriado=Feriado::find($id);
        $feriado->delete();
        return redirect()->route('feriados.index')->with('message','La fecha feriado '.$feriado->name. ' fue eliminada correctamente');

    }
}
