<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Torneo;
use PDF;

class TorneoController extends BaseController
{
    public function index()
    {
        $torneos = Torneo::orderBy('ESTADO','asc')->paginate(7);
        return view('torneo.index',['torneos' => $torneos]);
    }

    public function buscar()
    {
        $data = request()->all();
        if(isset($data['textoBuscar']))
        {
            if($data['textoBuscar'] != "")
            {
                //dd($data['textoBuscar']);
                $torneos = Torneo::where('NOMBRE', 'LIKE', '%' . $data['textoBuscar'] . '%' )->paginate(7);
                //dd($torneos);
                if(count($torneos) > 0)
                {
                    return view('torneo.index',['torneos' => $torneos]);
                }else{
                    return redirect('torneo/');
                }
            }
        }
        return redirect('torneo/');
    }

    public function nuevo()
    {
        return view('torneo.nuevo');
    }

    public function crear()
    {
        $data = request()->all();
        //Si existen torneos activos los cancelos, asi solamente tengo un torneo activo
        Torneo::where('ESTADO','A')->update(['ESTADO'=>'F']);
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
        $torneo = Torneo::find($id);
        return view('torneo.ver', ['torneo' => $torneo]);
    }

    public function eliminar($id)
    {
        Torneo::destroy($id);
        return redirect('torneo/');
    }

    public function editar($id)
    {
        $torneo = Torneo::find($id);
        return view('torneo.editar', ['torneo' => $torneo]);
    }

    public function actualizar()
    {
        $data = request()->all();
        
        if($data['estado']=='A'){
            Torneo::where('ESTADO','A')->update(['ESTADO'=>'F']);    
        }
        $id = $data['id'];
        $torneo = Torneo::find($id);
        $torneo->NOMBRE = $data['nombre'];
        $torneo->DESCRIPCION = $data['descripcion'];
        $torneo->FECHA = $data['fecha'];
        $torneo->ESTADO = $data['estado'];
        print("".$torneo->ESTADO);
        $torneo->save();
        
        return redirect('torneo/');
    }

    public function reporte()
    {      
        $pdf = PDF::loadView('reportes.torneo',['titulo'=>'Reporte Ejemplo']);
        return $pdf->stream();
        //return $pdf->download( 'torneo.pdf' );
    }
}