<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\InscripcionTorneo;
use App\PeleaGallos;
use App\Parametro;
use App\Torneo;
use PDF;

class PeleaGallosController extends BaseController
{
    public function index()
    {
        $torneo = Torneo::where('ESTADO','=','A')->get();
        $peleaGallos = $torneo->first()->peleaGallos()->paginate(7);
        return view('pelea_gallos.index',['peleaGallos' => $peleaGallos, 'mensaje'=>'Bienvenidos']);
    }

    public function peleas()
    {
        $torneo = Torneo::where('ESTADO','=','A')->get();
        $peleaGallos =  $torneo->first()->peleaGallos()->paginate(7);
        /**
         * Optener inscripciones activas para crear peleas de gallos
         */
        $gallosSegunPeso = $this->obtenerGallosSegunPeso();
        /**
         * Verificar si existen inscripciones
         */
        if(count($gallosSegunPeso)>0)
        {
            /**
             * Creo las peleas por pesos iguales
             */
            $this->crearPeleaPesosIguales($gallosSegunPeso);
            /**
             * Obtengo todos los gallos que no participaron en pesos iguales y que son del mismo criadero
             */
            $gallosSegunPeso = $this->obtenerGallosSegunPeso();
            /**
             * Mezclo todos los gallos ordenadamente segun su peso para sortear en las peleas con un rango mayor de 0.1
             */
            $gallos = $this->obtenerTodosGallos($gallosSegunPeso);
            $this->crearPeleaPesosDiferentes($gallos);
            /**
             * Cargar las peleas creadas
             */
            $peleaGallos =  $torneo->first()->peleaGallos()->paginate(7);
            return view('pelea_gallos.index',['peleaGallos'=>$peleaGallos,'mensaje'=>'Peleas creadas con exito']);
        }       
        return view('pelea_gallos.index',['peleaGallos'=>$peleaGallos,'mensaje'=>'No se pudo generar las pelas']);
    }

    public function buscar()
    {
        $data = request()->all();
        if(isset($data['textoBuscar']))
        {
            if($data['textoBuscar'] != "")
            {
                $torneo = Torneo::where('ESTADO','=','A')->get();
                $peleaGallos = $torneo->first()->peleaGallos()
                ->where('inscripcion_torneo.PLACA_GALLO','LIKE','%'.$data['textoBuscar'].'%')
                ->orwhere('inscripcion_torneo.PESO_GALLO','LIKE','%'.$data['textoBuscar'].'%')
                ->paginate(7);
                if(count($peleaGallos) > 0)
                {
                    $peleaGallos->appends ( array ('textoBuscar' => $data['textoBuscar']));
                    return view('pelea_gallos.index',['peleaGallos' => $peleaGallos, 'mensaje'=>'Busqueda correcta']);
                }else{
                    return redirect('pelea_gallos/');
                }
            }
        }
        return redirect('pelea_gallos/');
    }

    public function nuevo()
    {
        $torneo = Torneo::where('ESTADO','=','A')->get();
        $inscripcionesTorneo = $torneo->first()->inscripcionTorneos;
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
                'ESTADO' => 'A'
            ]
        );

        return redirect('pelea_gallos/');
        
    }

    public function ver($id)
    {
        $peleaGallo = PeleaGallos::find($id);
        return view('pelea_gallos.ver', ['peleaGallo' => $peleaGallo]) ;
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
        PeleaGallos::destroy($id);
        return redirect('pelea_gallos/');
    }

    public function editar($id)
    {
        $peleaGallo = PeleaGallos::find($id);
        return view('criadero.editar', ['peleaGallo' => $peleaGallo]);
    }

    public function actualizar()
    {
        $data = request()->all();
        $id = $data['id'];
        $peleaGallo = PeleaGallos::find($id);
        $peleaGallo->RESULTADO = $data['ganador'];
        $peleaGallo->TIEMPO = $data['tiempo'];
        $peleaGallo->OBSERVACION = $data['observacion'];
        $peleaGallo->ESTADO = 'F';
        $peleaGallo->save();

        $inscripcion1 = InscripcionTorneo::find($peleaGallo->ID_DESCRIPCION);
        $inscripcion1->ESTADO = 'F';
        $inscripcion1->save();
        $inscripcion2 = InscripcionTorneo::find($peleaGallo->INS_ID_DESCRIPCION);
        $inscripcion2->ESTADO = 'F';
        $inscripcion2->save();
        
        return redirect('pelea_gallos/');
    }

    public function obtenerGallosSegunPeso()
    {
        $pesoMaximo = Parametro::find('PESO MAXIMO')->VALOR;
        $pesoMinimo = Parametro::find('PESO MINIMO')->VALOR;
        $torneo = Torneo::where('ESTADO','=','A')->get();
        
        $gallosPorPeso = collect();
        for ($p = $pesoMinimo; $p <= $pesoMaximo; $p=$p+0.1) {
            $gallosInscriptos = InscripcionTorneo::where('ESTADO','=','A')
            ->where('ID_TORNEO','=', $torneo[0]->ID_TORNEO)
            ->where('PESO_GALLO','like',''.$p.'%')
            ->orderBy('ESTADO', 'asc')
            ->orderBy('PESO_GALLO', 'asc')
            ->orderBy('created_at', 'asc')
            ->get();
            if($gallosInscriptos->count() !== 0 ){
                $gallosPorPeso->put("".$p , $gallosInscriptos);
            }
        }
        return $gallosPorPeso;
    }

    public function crearPeleaPesosIguales($gallosSegunPeso)
    {
        foreach($gallosSegunPeso as $galloSegunPeso)
        {
            $arrayGalloSegunPeso = $galloSegunPeso->all();
            $i=0;
            while(count($arrayGalloSegunPeso) >= 2)
            {
                if(isset($arrayGalloSegunPeso[$i],$arrayGalloSegunPeso[$i+1]))
                {
                    if($arrayGalloSegunPeso[$i]->ID_CRIADEROS !== $arrayGalloSegunPeso[$i+1]->ID_CRIADEROS)
                    {
                        /**
                         * Genero la pelea
                         */
                        $this->crearPeleaGallos($arrayGalloSegunPeso[$i], $arrayGalloSegunPeso[$i+1]);
                        /**
                         * Cambio estado de las incripciones, cuando se seleccionan para una pelea de gallos
                         */
                        $this->editarInscripcionDePelea($arrayGalloSegunPeso[$i]);
                        $this->editarInscripcionDePelea($arrayGalloSegunPeso[$i+1]);
                        /**
                         * Elimino los datos del arreglo
                         */
                        unset($arrayGalloSegunPeso[$i],$arrayGalloSegunPeso[$i+1]);
                        /**
                         * Reinicio los valores del arreglo
                         */
                        $arrayGalloSegunPeso = array_values($arrayGalloSegunPeso);

                        $i=0;
                    }else {
                        $i++;    
                    }
                }else{
                    break;
                }
            }    
        }    
    }

    public function crearPeleaPesosDiferentes($arrayGalloSegunPeso)
    {
        $i=0;
        while(count($arrayGalloSegunPeso) >= 2)
        {
            if(isset($arrayGalloSegunPeso[$i],$arrayGalloSegunPeso[$i+1]))
            {
                $peso1 = bcdiv($arrayGalloSegunPeso[$i]->PESO_GALLO, '1', 1);$peso1 = $peso1 + 0.1;
                $peso2 = bcdiv($arrayGalloSegunPeso[$i+1]->PESO_GALLO, '1', 1);
                if(($arrayGalloSegunPeso[$i]->ID_CRIADEROS !== $arrayGalloSegunPeso[$i+1]->ID_CRIADEROS) && ($peso1 == $peso2))
                {                    
                    /**
                     * Genero la pelea
                     */
                    $this->crearPeleaGallos($arrayGalloSegunPeso[$i], $arrayGalloSegunPeso[$i+1]);
                    /**
                     * Cambio estado de las incripciones, cuando se seleccionan para una pelea de gallos
                     */
                    $this->editarInscripcionDePelea($arrayGalloSegunPeso[$i]);
                    $this->editarInscripcionDePelea($arrayGalloSegunPeso[$i+1]);
                    /**
                     * Elimino los datos del arreglo
                     */
                    unset($arrayGalloSegunPeso[$i],$arrayGalloSegunPeso[$i+1]);
                    /**
                     * Reinicio los valores del arreglo
                     */
                    $arrayGalloSegunPeso = array_values($arrayGalloSegunPeso);

                    $i=0;
                }else {
                    $i++;    
                }
            }else{
                break;
            }
        }
    }

    public function obtenerTodosGallos($gallosSegunPeso)
    {
        $gallos = array();
        foreach($gallosSegunPeso as $grupoGalloSegunPeso)
        {
            foreach($grupoGalloSegunPeso as $gallo)
            {
                $gallos[] = $gallo;
            }
        }
        return $gallos;
    }

    public function crearPeleaGallos($inscripcion1, $inscripcion2)
    {
        PeleaGallos::create
        (
            [
                'ID_DESCRIPCION' => $inscripcion1->ID_DESCRIPCION,
                'INS_ID_DESCRIPCION' => $inscripcion2->ID_DESCRIPCION,
                'ESTADO' => 'A'
            ]
        );        
    }

    public function editarInscripcionDePelea($inscripcion)
    {
        $inscripcionPelea = InscripcionTorneo::find($inscripcion->ID_DESCRIPCION);
        $inscripcionPelea->ESTADO = 'O';
        $inscripcionPelea->save();
    }

    public function obtenerGallosSinPareja()
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

    public function realizarSorteoGallosSinPareja($gallos)
    {
        for($i=0;$i<count($gallos);$i++)
        {
            $peso = $gallos[$i]->PESO_GALLO + 0.1;
            if(isset($gallos[$i+1])){
                if( $peso == $gallos[$i+1]->PESO_GALLO){
                    /**
                     * Creo la pelea de gallos con un peso solo mayor a 0.01
                     */
                    if($gallos[$i]['ID_CRIADEROS'] !== $gallos[$i+1]['ID_CRIADEROS'])
                    {
                        PeleaGallos::create(
                            [
                                'ID_DESCRIPCION' => $gallos[$i]->ID_DESCRIPCION,
                                'INS_ID_DESCRIPCION' => $gallos[$i+1]->ID_DESCRIPCION,
                                'ESTADO' => 'A'
                            ]
                        );
        
                        /**
                         * Cambio estado de las incripciones, cuando se seleccionan para una pelea de gallos
                         */
                        $inscripcion1 = InscripcionTorneo::find($gallos[$i]->ID_DESCRIPCION);
                        $inscripcion1->ESTADO = 'O';
                        $inscripcion1->save();
        
                        $inscripcion2 = InscripcionTorneo::find($gallos[$i+1]->ID_DESCRIPCION);
                        $inscripcion2->ESTADO = 'O';
                        $inscripcion2->save();
                        $i++;
                    }    
                }
            }
        }
    }

    public function reporte()
    {      
        $torneo = Torneo::where('ESTADO','=','A')->get();
        $peleaGallos = $torneo->first()->peleaGallos()->get();
        $pdf = PDF::loadView('reportes.pelea_gallos',['peleaGallos'=>$peleaGallos])->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }

}