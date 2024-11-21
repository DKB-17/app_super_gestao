<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];
    public function produtoDetalhe() {
        // Produto tem 1 produtoDetalhe
        //1 registro relacionado em produto_detalhes (fk) -> produto_id
        // produto (pk) -> id
        return $this->hasOne('App\ProdutoDetalhe');
    }

}
