<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // instanciando objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'Fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();

        // utilizando o metodo create com base nos atributos setados no fillable do objeto model Fornecedor
        Fornecedor::created([
            'nome' => 'Fornecedor 200',
            'site' => 'Fornecedor200.com.br',
            'uf' => 'RS',
            'email' => 'contato@fornecedor200.com.br',
        ]);

        //insert
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'Fornecedor300.com.br',
            'uf' => 'SP',
            'email' => 'contato@fornecedor300.com.br',
        ]);
    }
}
