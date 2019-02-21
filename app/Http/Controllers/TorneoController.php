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
        //$torneos = Torneo::all();
        $torneos = Torneo::paginate(7);
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
        $id = $data['id'];
        $torneo = Torneo::find($id);
        $torneo->NOMBRE = $data['nombre'];
        $torneo->DESCRIPCION = $data['descripcion'];
        $torneo->FECHA = $data['fecha'];
        $torneo->ESTADO = $data['estado'];
        $torneo->save();
        return redirect('torneo/');
    }
}