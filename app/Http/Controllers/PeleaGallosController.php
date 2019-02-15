<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\InscripcionTorneo;
use App\PeleaGallos;
use App\Parametro;

class PeleaGallosController extends BaseController
{
    public function index()
    {
        $peleaGallos = PeleaGallos::all();
        //$a = $this->realizarSorteoGallosSegunPeso();
        $sinPareja = $this->realizarSorteoGallosSinPareja();
        return view('pelea_gallos.index',['peleaGallos' => $peleaGallos]);
    }

    public function nuevo()
    {
        $inscripcionesTorneo = InscripcionTorneo::all();
        return view('pelea_gallos.nuevo', ['inscripcionesTorneo' => $inscripcionesTorneo]);
    }

    public function crear()
    {
        $data = request()->all();
        PeleaGallos::create(
            [
                'ID_DESCRIPCION' => $data['id_descripcion'],
                'INS_ID_DESCRIPCION' => $data['ins_id_descripcion'],
                'RESULTADO' => $data['resultado'],
                'TIEMPO' => "".$data['tiempo'],
                'OBSERVACION' => $data['observacion'],
                'ESTADO' => $data['estado']
            ]
        );

        return redirect('pelea_gallos/');
        
    }

    public function ver($id)
    {
        $representante = Representante::find($id);
        return view('pelea_gallos.ver', ['torneo' => $representante]) ;
    }

    public function cargarInformacionGallo($id)
    {
        $gallo = Gallo::find($id);
        $representante = $gallo->representante;
        $criadero = $representante->criadero;
        $nombre_criadero = $criadero->NOMBRE;
        $nombre_representante = $representante->NOMBRES;
        return response()->json(
            array('nombreCriadero' => $criadero->NOMBRE,
                'idCriadero' => $criadero->ID_CRIADEROS,
                'nombreRepresentante' => $representante->NOMBRES,
                'idRepresentante' => $representante->ID_REPRESENTANTE,
                'placaGallo' => $gallo->PLACA,
                'pesoGallo' => $gallo->PESO,
                'edadGallo' => $gallo->EDAD,
                'tallaGallo' => $gallo->TALLA), 200);
    }

    public function eliminar($id)
    {
        InscripcionTorneo::destroy($id);
        return redirect('pelea_gallos/');
    }

    public function obtenerGallosSegunPeso()
    {
        $pesoMaximo = Parametro::find('PESO MAXIMO')->VALOR;
        $pesoMinimo = Parametro::find('PESO MINIMO')->VALOR;

        $gallosPorPeso = collect();
        for ($p = $pesoMinimo; $p <= $pesoMaximo; $p=$p+0.1) {
            $gallosInscriptos = InscripcionTorneo::where('ESTADO', 'A')
            ->where('PESO_GALLO', "".$p)
            ->orderBy('PLACA_GALLO', 'desc')
            ->get();
            if($gallosInscriptos->count() !== 0 ){
                $gallosPorPeso->put("".$p , $gallosInscriptos);
            }
            
        }
        return $gallosPorPeso;
    }

    public function realizarSorteoGallosSegunPeso()
    {
        $gallosSegunPeso = $this->obtenerGallosSegunPeso();
        $gallosSinPareja = array();
        foreach($gallosSegunPeso as $grupoGalloSegunPeso)
        {
            if(count($grupoGalloSegunPeso)%2==0){
                $limite = count($grupoGalloSegunPeso);
            }else{
                $limite = count($grupoGalloSegunPeso) - 1;
            }   
            for($i=0; $i<$limite;$i+=2)
            {
                PeleaGallos::create(
                    [
                        'ID_DESCRIPCION' => $grupoGalloSegunPeso[$i]['ID_DESCRIPCION'],
                        'INS_ID_DESCRIPCION' => $grupoGalloSegunPeso[$i+1]['ID_DESCRIPCION'],
                        'ESTADO' => 'A'
                    ]
                );
            }
        }
    }

    public function realizarSorteoGallosSinPareja()
    {
        $gallosSegunPeso = $this->obtenerGallosSegunPeso();
        $gallosSinPareja = array();
        foreach($gallosSegunPeso as $grupoGalloSegunPeso)
        {
            for($i=count($grupoGalloSegunPeso)-1; $i<count($grupoGalloSegunPeso);$i++)
            {
                if(!(count($grupoGalloSegunPeso)%2==0)){
                    $gallosSinPareja[] = $grupoGalloSegunPeso[$i];
                }
            }
        }
        return $gallosSinPareja;    
    }

}