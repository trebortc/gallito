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
Use App\Parametro;
use DB;

class InscripcionTorneoController extends BaseController
{
    public function index()
    {
        $torneo = Torneo::where('ESTADO','=','A')->get();
        /**Valores definidos para pesos */
        $pesoMaximo = Parametro::find('PESO MAXIMO')->VALOR;
        $pesoMinimo = Parametro::find('PESO MINIMO')->VALOR;
        $torneos = Torneo::where('ESTADO','=','A')->get();
        $gallos = Gallo::where('ESTADO','=','A')->orderBy('ID_GALLO','desc')->get();
        if(!$torneo->first()){
            return view('inscripcion_torneo.index',['inscripciones' => null, 'mensaje'=>'Bienvenido', 'gallos'=>$gallos, 'pesoMaximo'=>$pesoMaximo, 'pesoMinimo'=>$pesoMinimo, 'torneos'=>$torneos]);
        }
        $inscripcionesTorneo = $torneo->first()->inscripcionTorneos()->orderBy('ESTADO','asc')->orderBy('PESO_GALLO','asc')->paginate(15);        
        return view('inscripcion_torneo.index',['inscripciones' => $inscripcionesTorneo, 'mensaje'=>'Bienvenido', 'gallos'=>$gallos, 'pesoMaximo'=>$pesoMaximo, 'pesoMinimo'=>$pesoMinimo, 'torneos'=>$torneos]);
    }

    public function buscar()
    {
        $data = request()->all();
        if(isset($data['textoBuscar']))
        {
            if($data['textoBuscar'] != "")
            {
                $torneo = Torneo::where('ESTADO','=','A')->get();
                $inscripcionesTorneo = $torneo->first()->inscripcionTorneos()->where('NOMBRE_CRIADERO', 'LIKE', '%' . $data['textoBuscar'] . '%' )
                    ->orwhere('NOMBRE_REPRESENTANTE', 'LIKE', '%' . $data['textoBuscar'] . '%' )
                    ->orwhere('PLACA_GALLO', 'LIKE', '%' . $data['textoBuscar'] . '%' )
                    ->orderBy('ESTADO','asc')
                    ->orderBy('PESO_GALLO','asc')
                    ->paginate(7);
                if(count($inscripcionesTorneo) > 0)
                {
                    $inscripcionesTorneo->appends(array('textoBuscar' => $data['textoBuscar'], 'torneo' => $torneo)); 
                    $gallos = Gallo::where('ESTADO','=','A')->get();
                    /**Valores definidos para pesos */
                    $pesoMaximo = Parametro::find('PESO MAXIMO')->VALOR;
                    $pesoMinimo = Parametro::find('PESO MINIMO')->VALOR;
                    $torneos = Torneo::where('ESTADO','=','A')->get();
                    return view('inscripcion_torneo.index',['inscripciones' => $inscripcionesTorneo, 'mensaje'=>'Bienvenido', 'gallos'=>$gallos, 'pesoMaximo'=>$pesoMaximo, 'pesoMinimo'=>$pesoMinimo, 'torneos'=>$torneos]);
                }else{
                    return redirect('inscripcion_torneo/');
                }
            }
        }
        return redirect('inscripcion_torneo/');
    }

    public function nuevo()
    {
        $gallos = Gallo::where('ESTADO','=','A')->get();

         /**Valores definidos para pesos */
         $pesoMaximo = Parametro::find('PESO MAXIMO')->VALOR;
         $pesoMinimo = Parametro::find('PESO MINIMO')->VALOR;
        /*$gallos = DB::table('gallo')
        ->leftJoin('inscripcion_torneo', 'gallo.ID_GALLO', '=', 'inscripcion_torneo.ID_GALLO')
        ->whereNull('inscripcion_torneo.ID_GALLO')
        ->where('gallo.ESTADO','=','A')
        ->get();*/

        $torneos = Torneo::where('ESTADO','=','A')->get();
        return view('inscripcion_torneo.nuevo', ['torneos' => $torneos, 'gallos' => $gallos, 'pesoMaximo' => $pesoMaximo, 'pesoMinimo' => $pesoMinimo]);
    }

    public function crear()
    {
        $data = request()->all();
        $torneo = Torneo::where('ESTADO','=','A')->get();
        $inscripciones = InscripcionTorneo::where('ID_GALLO','=',$data['id_gallo'])
                                            ->where('ID_TORNEO','=',$torneo->first()->ID_TORNEO)->get();
        if(count($inscripciones)>0)
        {
            $torneo = Torneo::where('ESTADO','=','A')->get();
            $inscripcionesTorneo = $torneo->first()->inscripcionTorneos()->orderBy('ESTADO','asc')->orderBy('PESO_GALLO','asc')->paginate(15);
            $gallos = Gallo::where('ESTADO','=','A')->get();
            /**Valores definidos para pesos */
            $pesoMaximo = Parametro::find('PESO MAXIMO')->VALOR;
            $pesoMinimo = Parametro::find('PESO MINIMO')->VALOR;
            $torneos = Torneo::where('ESTADO','=','A')->get();

            return view('inscripcion_torneo.index',['inscripciones' => $inscripcionesTorneo,'mensaje'=>'Dato ya se encuentra inscrito', 'gallos'=>$gallos, 'pesoMaximo'=>$pesoMaximo, 'pesoMinimo'=>$pesoMinimo, 'torneos'=>$torneos]); 
        }else{
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
        }
        return redirect('inscripcion_torneo/');
        
    }

    public function editar($id)
    {
        $inscripcion = InscripcionTorneo::find($id);
        $pesoMaximo = Parametro::find('PESO MAXIMO')->VALOR;
        $pesoMinimo = Parametro::find('PESO MINIMO')->VALOR;
        $gallos = Gallo::where('ESTADO','=','A')->get();
        $torneos = Torneo::where('ESTADO','=','A')->get();
        return view('inscripcion_torneo.editar', ['inscripcion' => $inscripcion,'torneos' => $torneos,'gallos' => $gallos, 'pesoMaximo' => $pesoMaximo, 'pesoMinimo' => $pesoMinimo]) ;
    }

    public function actualizar()
    {
        $data = request()->all();
        $id = $data['id'];
        $inscripcion = InscripcionTorneo::find($id);
        $inscripcion->ID_TORNEO = $data['id_torneo'];
        $inscripcion->ID_CRIADEROS = $data['id_criaderos'];
        $inscripcion->ID_REPRESENTANTE = $data['id_representante'];
        $inscripcion->ID_GALLO = $data['id_gallo'];
        $inscripcion->NOMBRE_CRIADERO = $data['nombre_criadero'];
        $inscripcion->NOMBRE_REPRESENTANTE = $data['nombre_representante'];
        $inscripcion->PLACA_GALLO = $data['placa_gallo'];
        $inscripcion->PESO_GALLO = $data['peso_gallo'];
        $inscripcion->EDAD_GALLO = $data['edad_gallo'];
        $inscripcion->TALLA_GALLO = $data['talla_gallo'];
        $inscripcion->ESTADO = $data['estado'];
        $inscripcion->save();
        return redirect('inscripcion_torneo/');
    }

    public function ver($id)
    {
        $inscripcion = InscripcionTorneo::find($id);
        $gallos = Gallo::where('ESTADO','=','A')->get();
        $torneos = Torneo::where('ESTADO','=','A')->get();
        return view('inscripcion_torneo.ver', ['inscripcion' => $inscripcion,'torneos' => $torneos,'gallos' => $gallos]) ;
    }

    public function cargarInformacionGallo($id)
    {
        $gallo = Gallo::find($id);
        $representante = $gallo->representante;
        $criadero = $representante->criadero;
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
        return redirect('inscripcion_torneo/');
    }

    public function eliminarTodosLosDatos()
    {
        $inscripcionesTorneo = InscripcionTorneo::where('ID_DESCRIPCION','>',0)->delete();
        return redirect('parametro/');
    }

    public function todos()
    {
        //$inscripciones = InscripcionTorneo::All();
        //dd(count($inscripciones));
        $gallos = Gallo::where('ESTADO','=','A')->get();
        $torneo = Torneo::where('ESTADO','=','A')->get()->first();
        
        foreach($gallos as $gallo)
        {
           $representante = Representante::where('ID_REPRESENTANTE', '=', $gallo->ID_REPRESENTANTE)->get()->first();
           $criadero = Criadero::where('ID_CRIADEROS', '=', $representante->ID_CRIADEROS)->get()->first();
           $inscripcionRepetida = InscripcionTorneo::where('ID_GALLO', '=', $gallo->ID_GALLO)->get(); 
           if(count($inscripcionRepetida)==0)
           {
                InscripcionTorneo::create(
                    [
                        'ID_TORNEO' => $torneo->ID_TORNEO,
                        'ID_CRIADEROS' => $criadero->ID_CRIADEROS,
                        'ID_REPRESENTANTE' => $representante->ID_REPRESENTANTE,
                        'ID_GALLO' => $gallo->ID_GALLO,
                        'NOMBRE_CRIADERO' => $criadero->NOMBRE,
                        'NOMBRE_REPRESENTANTE' => $representante->NOMBRES,
                        'PLACA_GALLO' => $gallo->PLACA,
                        'PESO_GALLO' => $gallo->PESO,
                        'EDAD_GALLO' => $gallo->EDAD,
                        'TALLA_GALLO' => $gallo->TALLA,
                        'ESTADO' => 'A',
                    ]
                );
            }
        }

        $inscripciones = InscripcionTorneo::All();
        if(count($inscripciones)>0)
        {
            $torneo = Torneo::where('ESTADO','=','A')->get();
            $inscripcionesTorneo = $torneo->first()->inscripcionTorneos()->orderBy('ESTADO','asc')->orderBy('PESO_GALLO','asc')->paginate(15);
            $gallos = Gallo::where('ESTADO','=','A')->get();
            /**Valores definidos para pesos */
            $pesoMaximo = Parametro::find('PESO MAXIMO')->VALOR;
            $pesoMinimo = Parametro::find('PESO MINIMO')->VALOR;
            $torneos = Torneo::where('ESTADO','=','A')->get();

            return view('inscripcion_torneo.index',['inscripciones' => $inscripcionesTorneo,'mensaje'=>'Se inscribieron todos los gallos', 'gallos'=>$gallos, 'pesoMaximo'=>$pesoMaximo, 'pesoMinimo'=>$pesoMinimo, 'torneos'=>$torneos]); 
        }

    }


}