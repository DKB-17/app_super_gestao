<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();
        $existe = $user->where('email', $email)
                        ->where('password', $password)
                        ->get()->first();

        if(isset($usuario->name)){
            echo "Usuario existe";
        }else{
            echo "Usuario nao existe";
        }
    }
}
