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
        $criaderos = Criadero::all();
        return view('criadero.index',['criaderos' => $criaderos]);
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

    public function actualizar(){

    }

    public function eliminar(){
        $criadero = Criadero::find($id);
        return view('criadero.ver', ['criadero' => $criadero]);
    }

    public function estado(){

    }
}