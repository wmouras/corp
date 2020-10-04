<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEstabelecimento extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_tipo_estabelecimento';

    public function listaTipoEstabelecimento(){

        // dd( model::select('id_tipo_empresa', 'tipo_empresa')->orderBy('tipo_empresa')->get() );
        return response()->json( model::select('id_tipo_estabelecimento', 'tipo_estabelecimento')->orderBy('tipo_estabelecimento')->get() );
    }
}
