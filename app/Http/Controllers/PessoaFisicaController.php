<?php

namespace App\Http\Controllers;

use App\Models\PessoaFisica;
use App\Models\Nacionalidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Crypt;

class PessoaFisicaController extends Controller
{
    public function lista(){

        // dd( PessoaFisica::all() );
        $pfs = PessoaFisica::select('fk_id_pessoa', 'identidade', 'nome', 'cpf')->take(20)->get();
        foreach($pfs as $pf)
        {
            $pf->fk_id_pessoa = Crypt::encryptString($pf->fk_id_pessoa);
            $p[] = $pf;
        }

        return response()->json($p);

    }

    public function listaNacionalidade()
    {
        $nacionalidade = new Nacionalidade();
        return response()->json($nacionalidade->listaNacionalidade());
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

        $result = PessoaFisica::updateOrCreate( $request->all(), ['fk_id_pessoa' => $idPessoa] );
        dd($result);
    }

    public function dados($id){
        $id = Crypt::decryptString($id);
        $nacionalidade = new Nacionalidade();

        $pf = PessoaFisica::where('fk_id_pessoa', $id)->get()[0];
        $pf['nacionalidade'] = $nacionalidade->getNacionalidade( $pf['fk_cd_nacionalidade'] );

        $aRetorno = array('pf' => $pf);

        session(['id_pessoa' => Crypt::encryptString($id)]);

        return Inertia::render('pf/PessoaFisica', $aRetorno);

    }
}
