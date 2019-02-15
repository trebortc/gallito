<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Parametro;

class ParametroController extends BaseController
{
    public function index()
    {
        $parametros = Parametro::paginate(2);
        //$criaderos = Criadero::all();
        return view('parametro.index',['parametros' => $parametros]);
    }

    public function nuevo()
    {
        return view('parametro.nuevo');
    }

    public function crear()
    {
        $data = request()->all();
        Parametro::create(
            [
                'NOMBRE_PARAMETRO' => $data['nombre'],
                'VALOR' => $data['valor']  
            ]
        );

        return redirect('parametro/');
    }

    public function ver($id)
    {
        $parametro = Parametro::find($id);
        return view('parametro.ver', ['parametro' => $parametro]);
    }

    public function eliminar($id){
        Parametro::destroy($id);
        return redirect('parametro/');
    }

    public function editar($id)
    {
        $parametro = Parametro::find($id);
        return view('parametro.editar', ['parametro' => $parametro]);
    }

    public function actualizar()
    {
        $data = request()->all();
        $id = $data['id'];
        $parametro = Parametro::find($id);
        $parametro->VALOR = $data['valor'];
        $parametro->save();
        return redirect('parametro/');
    }

}