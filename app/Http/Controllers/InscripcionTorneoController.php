<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Representante;
use App\Criadero;
use App\Gallo;
use App\Torneo;
use App\InscripcionTorneo;

class InscripcionTorneoController extends BaseController
{
    public function index()
    {
        $inscripcionesTorneo = InscripcionTorneo::all();
        return view('inscripcion_torneo.index',['inscripciones' => $inscripcionesTorneo]);
    }

    public function nuevo()
    {
        $representantes = Representante::all();
        $criaderos = Criadero::all();
        $gallos = Gallo::all();
        $torneos = Torneo::all();

        return view('inscripcion_torneo.nuevo', ['torneos' => $torneos, 'criaderos' => $criaderos, 'representantes' => $representantes, 'gallos' => $gallos]);
    }

    public function crear()
    {
        $data = request()->all();
        InscripcionTorneo::create(
            [
                'ID_TORNEO' => $data['id_torneo'],
                'ID_CRIADEROS' => $data['id_criaderos'],
                'ID_REPRESENTANTE' => $data['id_representante'],
                'ID_GALLO' => $data['id_gallo'],
                'NOMBRE_CRIADERO' => $data['nombre_criadero'],
                'NOMBRE_REPRESENTANTE' => $data['nombre_representante'],
                'PLACA_GALLO' => $data['placa_gallo'],
                'PESO_GALLO' => $data['peso_gallo'],
                'EDAD_GALLO' => $data['edad_gallo'],
                'TALLA_GALLO' => $data['talla_gallo'],
                'ESTADO' => $data['estado']
            ]
        );

        return redirect('inscripcion_torneo/');
        
    }

    public function ver($id)
    {
        $representante = Representante::find($id);
        return view('inscripcion_torneo.ver', ['torneo' => $representante]) ;
    }
}