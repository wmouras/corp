<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoEmpresa;

class PessoaJuridicaController extends Controller
{
    //
    public function listaTipoEmpresa(){
        $tipoEmpresa = new TipoEmpresa();
        return $tipoEmpresa->listaTipoEmpresa();
    }

}
