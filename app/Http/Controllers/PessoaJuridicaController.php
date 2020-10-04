<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoEmpresa;
use App\Models\TipoEstabelecimento;

class PessoaJuridicaController extends Controller
{
    //
    public function listaTipoEmpresa(){
        $tipoEmpresa = new TipoEmpresa();
        return $tipoEmpresa->listaTipoEmpresa();
    }

    public function listaTipoEstabelecimento(){
        $tipo = new TipoEstabelecimento();
        return $tipo->listaTipoEstabelecimento();
    }

}
