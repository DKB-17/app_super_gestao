<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PrincipalController@principal')
    ->name('site.index')
    ->middleware('log.acesso');

/*
Route::get('/', function () {
    return "Home";
});
*/

Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');


Route::get('/login', function(){return "Login";})->name('site.login');


//app
Route::prefix('/app')->group(function(){
    Route::middleware('autenticacao')
        ->get('/clientes',function(){return "Clientes";})
        ->name('app.clientes');

    Route::middleware('autenticacao')
        ->get('/fornecedores', 'FornecedorController@index')
        ->name('app.fornecedores');

    Route::middleware('autenticacao')
        ->get('/produtos',function(){return "Produtos";})
        ->name('app.produtos');

});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste')->where('p1','[0-9]+')->where('p2','[0-9]+');


Route::get('/rota2', function(){
    // redirecionamento de rotas
    return redirect()->route('site.teste');
})->name('site.rota2');


Route::fallback(function(){
    echo 'Aa rota acessada nao exite. <a href="'.route('site.index').'">clique aqui</a> para ir a pagina inicial';
});

//Route::redirect('/rota2','/rota1');


/*
// modelo de parametro obrigatorio
Route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem}', function(string $nome, string $categoria, string $assunto, string $mensagem){
    echo "Estamos aqui: - $nome - $categoria - $assunto - $mensagem";
});
*/

// modelo de parametro opcional
// sempre passar as informacoes opcionais da direita para a esquerda assim nao temos problemas com a perda de rota pelo framework
/*
Route::get('/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}', function(
    string $nome = 'sem nome',
    string $categoria = 'sem categoria',
    string $assunto = 'sem assunto',
    string $mensagem = 'mensagem nao enviada')
    {
    echo "Estamos aqui: - $nome - $categoria - $assunto - $mensagem";
});
*/

/*
// modelo de parametro opcional atravez de expressoes regulares
Route::get('/contato/{nome}/{categoria_id}',
function(
    string $nome = 'sem nome',
    int $categoria_id = 1)
    {
    echo "Estamos aqui: - $nome - $categoria_id";
})->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');
*/


/**
 * Route::get($uri, $callback)
 *
 * Verbos http
 *
 * get
 * post
 * put
 * patch
 * delete
 * options
 *
 */
