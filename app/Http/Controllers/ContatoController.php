<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContatoController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function contato(Request $request){

        //var_dump($_POST);
        dd($request->all());
        return view('site.contato', ['titulo' => 'Contato (teste)']);
    }
}
