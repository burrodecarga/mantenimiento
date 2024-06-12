<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Equipo;

class EquipozonaController extends Controller
{
    public function index(){
        $equipos=Equipo::orderBy('name','asc')
                         ->orderBy('zona_id','asc')
                         ->get();
        dd($equipos);

    }
}
