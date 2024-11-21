<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    //
    use SoftDeletes;
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];
    public function produtoDetalhe(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
    }
    public function fornecedor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Fornecedor', 'fornecedor_id', 'id');
    }

    public function pedidos(){
        return $this->belongsToMany('App\Pedido', 'pedido_produtos', 'produto_id', 'pedido_id')->withPivot('create_at');
    }
}
