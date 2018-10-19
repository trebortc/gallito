<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Representante;
use App\Criadero;

class RepresentanteController extends BaseController
{
    public function index()
    {
        $representantes = Representante::all();
        return view('representante.index',['representantes' => $representantes]);
    }

    public function nuevo()
    {
        $criaderos = Criadero::all();
        return view('representante.nuevo', ['criaderos' => $criaderos]);
    }

    public function crear()
    {
        $data = request()->all();
        Representante::create(
            [
                'ID_CRIADEROS' => $data['id_criaderos'],
                'IDENTIFICACION' => $data['identificacion'],
                'NOMBRES' => $data['nombres'],
                'TELEFONOS' => $data['telefonos'],
                'CORREO' => $data['correo'],
                'DESCRIPCION' => $data['descripcion'],
                'ETADO' => $data['estado']    
            ]
        );

        return redirect('representante/');
        
    }

    public function ver($id)
    {
        $representante = Representante::find($id);
        return view('representante.ver', ['torneo' => $representante]) ;
    }
}