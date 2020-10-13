<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PessoaFisica;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PessoaFisicaController extends Controller
{
    //
    public function dados($id)
    {

        $pf = PessoaFisica::where('fk_id_pessoa', $id)->get()[0];
        return Inertia::render('pj/PessoaFisica', ['pf' => $pf]);

    }

    public function lista()
    {

        return response()->json(PessoaFisica::all());

    }

    public function dados($id)
    {
      
        $pf = PessoaFisica::where('fk_id_pessoa', $id)->get()[0];
        return Inertia::render('pj/PessoaFisica', ['pj' => $pj]);

    }

}
