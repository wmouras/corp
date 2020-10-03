<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaJuridica extends Model
{
    use HasFactory;

    const CREATED_AT = 'data_cadastro';
    const UPDATED_AT = 'data_alteracao';

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_pessoa_juridica';

    public function cadastroPessoaJuridica(){

    }
}
