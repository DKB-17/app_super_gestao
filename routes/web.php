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


Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');


//app
Route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function(){
    Route::get('/home','HomeController@index')
        ->name('app.home');
    Route::get('/sair','LoginController@sair')
        ->name('app.sair');

    Route::get('/cliente','ClienteController@index')
        ->name('app.cliente');

    Route::get('/fornecedor', 'FornecedorController@index')
        ->name('app.fornecedor');

    Route::get('/produtos','ProdutoController@index')
        ->name('app.produto');

});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('site.teste')->where('p1','[0-9]+')->where('p2','[0-9]+');


Route::get('/rota2', function(){
    // redirecionamento de rotas
    return redirect()->route('site.teste');
})->name('site.rota2');


Route::fallback(function(){
    echo 'Aa rota acessada nao exite. <a href="'.route('site.index').'">clique aqui</a> para ir a pagina inicial';
});

Route::resource('produto', 'ProdutoController');


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
