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
        //$representantes = Representante::all();
        $representantes = Representante::orderBy('ETADO','asc')->orderBy('NOMBRES','asc')->paginate(7);
        $criaderos = Criadero::all();
        return view('representante.index',['representantes' => $representantes, 'criaderos' => $criaderos]);
    }

    public function buscar()
    {
        $data = request()->all();
        if(isset($data['textoBuscar']))
        {
            if($data['textoBuscar'] != "")
            {
                //dd($data['textoBuscar']);
                $representantes = Representante::where('NOMBRES', 'LIKE', '%' . $data['textoBuscar'] . '%' )
                ->orwhere('IDENTIFICACION', 'LIKE', '%' . $data['textoBuscar'] . '%' )
                ->paginate(7);
                //dd($torneos);
                if(count($representantes) > 0)
                {
                    $criaderos = Criadero::all();
                    return view('representante.index',['representantes' => $representantes, 'criaderos' => $criaderos]);
                }else{
                    return redirect('representante/');
                }
            }
        }
        return redirect('torneo/');
    }

    public function nuevo()
    {
        $criaderos = Criadero::all();
        return view('representante.nuevo',['criaderos' => $criaderos]);
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
        return view('representante.ver', ['representante' => $representante]) ;
    }

    public function eliminar($id){
        Representante::destroy($id);
        return redirect('representante/');
    }

    public function editar($id)
    {
        $representante = Representante::find($id);
        $criaderos = Criadero::all();
        return view('representante.editar', ['representante' => $representante, 'criaderos' => $criaderos]);
    }

    public function actualizar()
    {
        $data = request()->all();
        $id = $data['id'];

        $representante = Representante::find($id);
        $representante->IDENTIFICACION = $data['identificacion'];
        $representante->NOMBRES = $data['nombres'];
        $representante->TELEFONOS = $data['telefonos'];
        $representante->CORREO = $data['correo'];
        $representante->DESCRIPCION = $data['descripcion'];
        $representante->ETADO = $data['estado'];
        //Actualizar Criadero
        $representante->ID_CRIADEROS = $data['id_criaderos'];
        
        $representante->save();
        return redirect('representante/');
    }



}