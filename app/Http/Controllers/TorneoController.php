<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Torneo;

class TorneoController extends BaseController
{
    public function index()
    {
        $torneos = Torneo::all();
        return view('torneo.index',['torneos' => $torneos]);
    }

    public function nuevo()
    {
        return view('torneo.nuevo');
    }

    public function crear()
    {
        $data = request()->all();
        Torneo::create(
            [
                'NOMBRE' => $data['nombre'],
                'DESCRIPCION' => $data['descripcion'],
                'FECHA' => $data['fecha'],
                'ESTADO' => $data['estado']    
            ]
        );

        return redirect('torneo/');
        
    }

    public function ver($id)
    {
        $torneo = Criadero::find($id);
        return view('torneo.ver', ['torneo' => $torneo]) ;
    }
}