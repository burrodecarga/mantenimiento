<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $permisos_=permisos(Auth::user()->getAllPermissions()->pluck('permiso'));
        $permisos_string=limpiar($permisos_);
        $ordenados=(collect($permisos_string))->sort();
        $permisos=explode(',',$ordenados);
        return view('home',compact('permisos'));
    }
}
