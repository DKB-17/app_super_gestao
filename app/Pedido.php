<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    public function produtos(){
        return $this->belongsToMany('App\Produto', 'pedido_produtos', 'pedido_id', 'produto_id');
        /*
         * 1 - Modelo do relacionnamento NxN em relação o Modelo que estamos implementando
         * 2 - É a tabela auxiliar que armazena os registros de relacionamentos
         * 3 - Representa o nome da FK da tabela mapeada pelo modelo na tabela de relacionamento
         * 4 - Representa o nome da FK da tabela mapeada pelo model utilizado no relacionamento que estamos implementando
         */
    }
}
