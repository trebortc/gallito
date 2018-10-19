<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Gallo;
use App\Representante;

class GalloController extends BaseController
{
    public function index()
    {
        $gallos = Gallo::all();
        return view('gallo.index',['gallos' => $gallos]);
    }

    public function nuevo()
    {
        $representantes = Representante::all();
        return view('gallo.nuevo', ['representantes' => $representantes]);
    }

    public function crear()
    {
        $data = request()->all();
        Gallo::create(
            [
                'ID_REPRESENTANTE' => $data['id_representante'],
                'PLACA' => $data['placa'],
                'PESO' => $data['peso'],
                'EDAD' => $data['edad'],
                'TALLA' => $data['talla'],
                'ESTADO' => $data['estado']    
            ]
        );

        return redirect('gallo/');
        
    }

    public function ver($id)
    {
        $gallo = Gallo::find($id);
        return view('gallo.ver', ['gallo' => $gallo]) ;
    }
}