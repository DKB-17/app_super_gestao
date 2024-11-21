<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    protected $table = ['produto_id','comprimento', 'altura', 'largura'];
}
