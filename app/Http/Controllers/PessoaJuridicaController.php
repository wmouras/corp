<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoEmpresa;
use App\Models\PessoaJuridica;
use App\Models\TipoEstabelecimento;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


/** 
 * Classe de tratamento de dados das empresas.
 * 
 * @var      PesssoaJuridica
 * @package  Controller
 * @author   Wellington Moura <wellington.m.sousa@gmail.com>
 * @category Sistema_Corporativo_Do_Crea-df
 * @link     http:www.corporativo.creadf.org.br
 * @license  proprietário
 */
class PessoaJuridicaController extends Controller
{
    
    /**
     * Função inicial da classe
     * 
     * @return array vazio
     */
    public function index()
    {
        return Inertia::render('pj/PessoaJuridica');
    }

    /** 
     * Função que lista as empresas
     * 
     * @return array
     */
    public function lista()
    {

        // dd( PessoaJuridica::all() );
        return response()->json(PessoaJuridica::all());

    }
    
    /**
     * Função que lista ss tipos de empresa
     * 
     * @return array
     */
    public function listaTipoEmpresa()
    {
        $tipoEmpresa = new TipoEmpresa();
        return $tipoEmpresa->listaTipoEmpresa();
    }

    /**
     * Função que lista ss tipos de estabelecimentos     
     *
     * @return array
     */
    public function listaTipoEstabelecimento()
    {
        $tipo = new TipoEstabelecimento();
        return $tipo->listaTipoEstabelecimento();
    }

    /**
     * Função que lista ss tipos de estabelecimentos     
     *
     * @param  $request Request
     * @return array()
     */
    public function salvar(Request $request)
    {

        $alt_capital = date('Y-m-d', strtotime($request->dt_ultima_alt_capital));
        $alt_contratual = date('Y-m-d', strtotime($request->dt_ultima_alt_contratual));
        $cnpj = preg_replace("/[^0-9]/", "", $request->cnpj);
        $capital_social = preg_replace("/[^0-9,]/", "", $request->capital_social);
        $request->merge(['usuario' => Auth::id()]);
        $request->merge(['fk_id_pessoa' => 21]);
        $request->merge(['cnpj' => $cnpj]);
        $request->merge(['capital_social' => str_replace(',', '.', $capital_social)]);
        $request->merge(['dt_ultima_alt_capital' => $alt_capital]);
        $request->merge(['dt_ultima_alt_contratual' => $alt_contratual]);

        // dd( $request );

        $result = PessoaJuridica::create($request->all());
        dd($result);
    }

    /**
     * Função que retorna um empresa para edição     
     *
     * @param  Integer $id id da empresa
     * @return array
     */
    public function dados($id)
    {
        $tpEst = new TipoEstabelecimento();
        $tpEmp = new TipoEmpresa();

        $pj = PessoaJuridica::where('fk_id_pessoa', $id)->get()[0];
        $pj['empresa'] = $tpEmp->getTipoEmpresa($pj['fk_id_tipo_empresa']);
        $pj['estabelecimento'] = $tpEst->getTipoEstabelecimento($pj['fk_id_tipo_estabelecimento']);

        return Inertia::render('pj/PessoaJuridica', ['pj' => $pj]);

    }

}
