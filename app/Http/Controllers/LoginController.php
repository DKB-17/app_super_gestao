<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('site.login', ['titulo' => 'Login']);
    }
    public function autenticar(Request $request){

        //regras de validacao
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuario (email) é obrigatorio',
            'senha.required' => 'O campo senha é obrigatorio',
        ];

        // se nao passar pela validate
        $request->validate($regras, $feedback);

    }
}
