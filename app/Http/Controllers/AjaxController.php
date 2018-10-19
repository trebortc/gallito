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
}