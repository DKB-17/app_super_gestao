<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//1-Step: Site_Contato
//2-Step: site_contato
//3-Step: site_contatos
class SiteContato extends Model
{
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contato', 'mensagem'];

}
