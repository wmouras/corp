<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoEmpresa;
use App\Models\PessoaJuridica;
use App\Models\TipoEstabelecimento;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Crypt;

class PessoaJuridicaController extends Controller
{
    //

    public function lista(){

        // dd( PessoaJuridica::all() );
        $pjs = PessoaJuridica::select('fk_id_pessoa', 'nome_fantasia', 'razao_social', 'cnpj', 'codigo_registro')->get();
        foreach($pjs as $pj)
        {
            $pj->fk_id_pessoa = Crypt::encryptString($pj->fk_id_pessoa);
            $p[] = $pj;
        }

        return response()->json($p);//PessoaJuridica::select('fk_id_pessoa', 'nome_fantasia', 'razao_social', 'cnpj', 'codigo_registro')->get() );

    }

    public function listaTipoEmpresa(){
        $tipoEmpresa = new TipoEmpresa();
        return response()->json($tipoEmpresa->listaTipoEmpresa());
    }

    public function listaTipoEstabelecimento(){
        $tipo = new TipoEstabelecimento();
        return response()->json($tipo->listaTipoEstabelecimento());
    }

    public function salvar( Request $request ){

        $idPessoa = Crypt::decryptString($request->session()->get('id_pessoa'));
        $alt_capital = date('Y-m-d', strtotime($request->dt_ultima_alt_capital));
        $alt_contratual = date('Y-m-d', strtotime($request->dt_ultima_alt_contratual));
        $cnpj = preg_replace( "/[^0-9]/", "", $request->cnpj );
        $capital_social = preg_replace( "/[^0-9,]/", "", $request->capital_social );
        $request->merge(['usuario' => Auth::id()]);
        $request->merge(['fk_id_pessoa' => $idPessoa]);
        $request->merge(['cnpj' => $cnpj]);
        $request->merge(['capital_social' => str_replace(',', '.', $capital_social)]);
        $request->merge(['dt_ultima_alt_capital' => $alt_capital]);
        $request->merge(['dt_ultima_alt_contratual' => $alt_contratual]);

        $result = PessoaJuridica::updateOrCreate( $request->all(), ['fk_id_pessoa' => $idPessoa] );
        dd($result);
    }

    public function dados($id){
        $tpEst = new TipoEstabelecimento();
        $tpEmp = new TipoEmpresa();
        $id = Crypt::decryptString($id);

        $pj = PessoaJuridica::where('fk_id_pessoa', $id)->get()[0];
        $pj['empresa'] = $tpEmp->getTipoEmpresa( $pj['fk_id_tipo_empresa'] );
        $pj['estabelecimento'] = $tpEst->getTipoEstabelecimento( $pj['fk_id_tipo_estabelecimento'] );
        $aRetorno = array('pj' => $pj);
        session(['id_pessoa' => Crypt::encryptString($id)]);

        return Inertia::render('pj/PessoaJuridica', $aRetorno);

    }

}
