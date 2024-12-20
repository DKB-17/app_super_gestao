<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    //
    protected $table = 'produto_detalhes';
    protected $fillable = ['produto_id','comprimento', 'altura', 'largura' , 'unidade_id'];

    public function produto(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Item','produto_id', 'id');
    }
}
