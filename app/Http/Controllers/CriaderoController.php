<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Criadero;

class CriaderoController extends BaseController
{
    public function index()
    {
        $criaderos = Criadero::where('ESTADO','!=','C')->paginate(7);
        //$criaderos = Criadero::all();
        return view('criadero.index',['criaderos' => $criaderos]);
    }

    public function buscar()
    {
        $data = request()->all();
        if(isset($data['textoBuscar']))
        {
            if($data['textoBuscar'] != "")
            {
                $criaderos = Criadero::where( 'NOMBRE', 'LIKE', '%' . $data['textoBuscar'] . '%' )->paginate(7);
                if(count($criaderos) > 0)
                {
                    return view('criadero.index',['criaderos' => $criaderos]);
                }else{
                    return redirect('criadero/');
                }
            }
        }
        return redirect('criadero/');
    }

    public function nuevo()
    {
        return view('criadero.nuevo');
    }

    public function crear()
    {
        $data = request()->all();
        Criadero::create(
            [
                'NOMBRE' => $data['nombre'],
                'DESCRIPCION' => $data['descripcion'],
                'ESTADO' => $data['estado']    
            ]
        );

        return redirect('criadero/');
    }

    public function ver($id)
    {
        $criadero = Criadero::find($id);
        return view('criadero.ver', ['criadero' => $criadero]);
    }

    public function eliminar($id){
        $criadero = Criadero::find($id);
        if(count($criadero->inscripcionTorneos) || count($criadero->representantes)){
            return redirect('criadero/');
        }
        Criadero::destroy($id);
        return redirect('criadero/');
    }

    public function editar($id)
    {
        $criadero = Criadero::find($id);
        return view('criadero.editar', ['criadero' => $criadero]);
    }

    public function actualizar()
    {
        $data = request()->all();
        $id = $data['id'];
        $criadero = Criadero::find($id);
        $criadero->NOMBRE = $data['nombre'];
        $criadero->DESCRIPCION = $data['descripcion'];
        $criadero->ESTADO = $data['estado'];
        $criadero->save();
        return redirect('criadero/');
    }

}