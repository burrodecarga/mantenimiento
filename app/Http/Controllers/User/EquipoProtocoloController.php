<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tipo;
use App\Protocolo;

class EquipoProtocoloController extends Controller
{
    public function index(Tipo $tipo){
        dd($tipo);
    }
}
