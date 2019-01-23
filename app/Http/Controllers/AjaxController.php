<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Criadero;

class AjaxController extends BaseController
{
    public function index()
    {
        return view('criadero');
    }

    public function loadCriaderos()
    {
        $criaderos = Criadero::all();
        return view('criadero.index',['criaderos' => $criaderos]);
    }

    public function mensajejson($id)
    {
        $msg = "Este es un mensaje simple realiza en ajax -----> ".$id;
        return response()->json(array('msg'=> $msg), 200);
    }

    public function mensajejson1()
    {
        $msg = "Este es un mensaje simple realiza en ajax -----> ";
        return response()->json(array('msg'=> $msg), 200);
    }
    
}