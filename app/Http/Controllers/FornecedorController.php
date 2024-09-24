<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = [0 => ['nome' => 'Fornecedor1',
                                'status' => 'N',
                                'cnpj' => '00.000.000/0000-00',
                                'ddd' => '11',
                                'telefone' => '0000-0000'
                            ],
                         1 => ['nome' => 'Fornecedor2',
                                 'status' => 'S',
                                 'cnpj' => '',
                                 'ddd' => '85',
                                 'telefone' => '0000-0000'
                            ],
                         2 => ['nome' => 'Fornecedor3',
                                 'status' => 'S',
                                 'cnpj' => null,
                                 'ddd' => '32',
                                 'telefone' => '0000-0000'
                             ]
                        ];

    //codição ? se verdadeiro: se false;

        $msg = isset($fornecedores[2]['cnpj'])?"CNPJ informado":"CNPJ não informado";
        echo $msg;

        //$fornecedores = [];             

        return view('app.fornecedor.index',compact('fornecedores'));
    }
}
