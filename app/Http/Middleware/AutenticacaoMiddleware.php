<?php

namespace App\Http\Middleware;

use Closure;
use http\Env\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {
        // verifica se o usuario possui acesos a rota
        echo $metodo_autenticacao." - ".$perfil.'<br>';
        if($metodo_autenticacao == 'padrao'){
            echo 'Verifica o usuario e senha no banco de dados'.'<br>';
        }
        if($metodo_autenticacao == 'ldap'){
            echo 'Verifica o usuario e senha no AD'.'<br>';
        }

        if(false){
            return $next($request);
        }else{
            return Response("Acesso negado! Rota exige autenticacao");
        }
        //return $next($request);
    }
}