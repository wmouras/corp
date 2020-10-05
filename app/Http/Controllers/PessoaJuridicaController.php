<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoEmpresa;
use App\Models\PessoaJuridica;
use App\Models\TipoEstabelecimento;
use Illuminate\Support\Facades\Auth;

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

    public function salvar( Request $request ){

        $alt_capital = date('Y-m-d', strtotime($request->dt_ultima_alt_capital));
        $alt_contratual = date('Y-m-d', strtotime($request->nr_ultima_alt_contratual));
        $cnpj = preg_replace( "/[^0-9]/", "", $request->cnpj );
        $capital_social = preg_replace( "/[^0-9,]/", "", $request->capital_social );
        $request->merge(['usuario' => Auth::id()]);
        $request->merge(['fk_id_pessoa' => 21]);
        $request->merge(['cnpj' => $cnpj]);
        $request->merge(['capital_social' => str_replace(',', '.', $capital_social)]);
        $request->merge(['dt_ultima_alt_capital' => $alt_capital]);

        dd( $request );

        $result = PessoaJuridica::create( $request->all() );
        dd($result);
    }

}
