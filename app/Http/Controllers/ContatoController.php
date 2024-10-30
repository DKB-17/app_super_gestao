<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\SiteContato;

class ContatoController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function contato(Request $request){

        /*
        //var_dump($_POST);
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        */

        /*
        $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        //print_r($contato->getAttributes());
        $contato->save();
        */

        /*
        $contato = new SiteContato();

        $contato->fill($request->all());
        $contato->save();

        ou

        $contato->create($request->all());
        */

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);

    }

    public function salvar(Request $request) {

        //realizar a validacao dos dados do formulario recebidos no request
        $request->validate([
            'nome' => 'required|min:3|max:40', // omes com no minimo 3 caracteres e no maximo 40 caracteres
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ]);
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }

}
