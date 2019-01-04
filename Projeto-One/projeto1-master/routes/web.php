<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
	return view('welcome');
});

Route::get('/ola', function () {
	return "<h1>Olá Mundo</h1>";
});

Route::get('/nome/{nome}', function($nome){
	return "<h1>Olá, $nome</h1>";
});

Route::get('/nomesrc/{nome}/{n}', function($nome, $n){
	for ($i=0; $i <$n ; $i++) { 
		echo "<h1>Olá, $nome! ($i)</h1>";
	}
})->where('n','[0-9]+')->where('nome','[A-Za-z]+');

Route::get('/nomesrs/{nome?}', function($nome=null){
	if(isset($nome)){
		echo "<h1>Olá, $nome!</h1>";
	}else{
		echo "<h1>Você não passou o parametro</h1>";
	}
});

Route::prefix('app')->group(function(){
	Route::get("/", function(){
		return "Pagina principal APP";
	});
	Route::get("profile", function(){
		return "Pagina Profile";
	});
	Route::get("about", function(){
		return "Meu about";
	});
});

Route::redirect('/aqui','/ola', 301);

Route::view('viewnome','hellonome', ['nome'=>'Joao','sobrenome'=>'Silva']);

Route::get('hellonome/{nome}/{sobrenome}', function($nome, $sn){
	return view('hellonome',['nome'=>$nome,'sobrenome'=>$sn]);
});

Route::get('/rest/hello', function(){
	return "Hello World(GET)";
});

Route::post('/rest/hello', function(){
	return "Hello World(POST)";
});

Route::delete('/rest/hello', function(){
	return "Hello World(DELETE)";
});

Route::put('/rest/hello', function(){
	return "Hello World(PUT)";
});

Route::patch('/rest/hello', function(){
	return "Hello World(PATCH)";
});

Route::options('/rest/hello', function(){
	return "Hello World(OPTIONS)";
});

Route::post('/rest/imprimir', function(Request $req){
	$nome = $req->input('nome');
	return "Hello $nome!! (POST)";
});

Route::match(['get','post'],'/rest/hello2', function(){
	return "Hello World 2";
});

Route::any('/rest/hello3', function(){
	return "Hello World 3";
});

Route::get('produtos', function(){
	echo "<h1>Produtos</h1>";
	echo "<ol>";
	echo "<li>Notebook</li>";
	echo "<li>Mouse</li>";
	echo "</ol>";
})->name('meusprodutos');

Route::get('/linkprodutos', function(){
	$url = route('meusprodutos');
	echo "<a href=\"".$url."\">Meus Produtos</a>";
});

Route::get('/redirecionaprodutos', function(){
	return redirect()->route('meusprodutos');
});

Route::get('/nome', 'MeuControlador@getNome');

Route::get('/idade', 'MeuControlador@getIdade');

Route::get('/multiplicar/{n1}/{n2}', 'MeuControlador@multiplicar');

Route::get('/nomeid/{id}', 'MeuControlador@getNomeByID');

Route::resource('cliente', 'ClienteControlador');

Route::get('/primeiraview', function(){
	return view('minhaview');
});

Route::get('/view01/{nome}/{sobrenome}', function($nome, $sobrenome){
	/* return view('minhaview')->with('nome', $nome)->with('sobrenome', $sobrenome); */
	/* $parametros = ['nome'=>$nome, 'sobrenome'=>$sobrenome];
	return view('minhaview', $parametros);*/
	return view('minhaview', compact('nome','sobrenome'));
});

Route::get('/email/{email}', function($email){
	if(View::exists('email'))
		return view('email',compact('email'));
	else
		return view('erro');
});

Route::get('/produtos','ProdutoControllador@listar');

Route::get('/secaoprodutos/{palavra}','ProdutoControllador@secaoprodutos');

Route::get('/mostraropcoes','ProdutoControllador@mostraropcoes');

Route::get('/opcoes/{opcao}','ProdutoControllador@opcoes');

Route::get('/loopfor/{n}','ProdutoControllador@loopfor');

Route::get('/categorias', function(){
	$cats = DB::table('categorias')->get();
	foreach ($cats as $cat) {
		echo "id: " . $cat->id .": ";
		echo "nome: " . $cat->nome ."<br>";
	}
	echo "<hr>";

	$nomes = DB::table('categorias')->pluck('nome');
	foreach ($nomes as $nome) {
		echo "$nome <br>";
	}

	echo "<hr>";

	$cats = DB::table('categorias')->where('id',1)->get();
	foreach ($cats as $cat) {
		echo "id: " . $cat->id .": ";
		echo "nome: " . $cat->nome ."<br>";
	}

	echo "<hr>";

	$cats = DB::table('categorias')->where('id',1)->first();
	echo "id: " . $cat->id .": ";
	echo "nome: " . $cat->nome ."<br>";
	
	echo "<p>Retorna um array utilizando like</p>";

	$cats = DB::table('categorias')->where('nome','like','%p%')->get();
	foreach ($cats as $cat) {
		echo "id: " . $cat->id .": ";
		echo "nome: " . $cat->nome ."<br>";
	}

	echo "<p>Sentencas logicas</p>";

	$cats = DB::table('categorias')->where('id',1)->orwhere('id',2)->get();
	foreach ($cats as $cat) {
		echo "id: " . $cat->id .": ";
		echo "nome: " . $cat->nome ."<br>";
	}

	echo "<p>Intervalos</p>";

	$cats = DB::table('categorias')->whereBetween('id',[1,4])->get();
	foreach ($cats as $cat) {
		echo "id: " . $cat->id .": ";
		echo "nome: " . $cat->nome ."<br>";
	}

	echo "<p>Não estão no Intervalos</p>";

	$cats = DB::table('categorias')->whereNotBetween('id',[1,2])->get();
	foreach ($cats as $cat) {
		echo "id: " . $cat->id .": ";
		echo "nome: " . $cat->nome ."<br>";
	}

	echo "<p>Eelementos que estão no Intervalos</p>";

	$cats = DB::table('categorias')->whereIn('id',[1,2,3])->get();
	foreach ($cats as $cat) {
		echo "id: " . $cat->id .": ";
		echo "nome: " . $cat->nome ."<br>";
	}

	echo "<p>Eelementos que não estão no Intervalos</p>";

	$cats = DB::table('categorias')->whereNotIn('id',[1,2,3])->get();
	foreach ($cats as $cat) {
		echo "id: " . $cat->id .": ";
		echo "nome: " . $cat->nome ."<br>";
	}

	echo "<p>Comparações</p>";

	$cats = DB::table('categorias')->where([
		['id',1],
		['nome','Roupas']
	])->get();
	foreach ($cats as $cat) {
		echo "id: " . $cat->id .": ";
		echo "nome: " . $cat->nome ."<br>";
	}

	echo "<p>Ordernando por nome</p>";

	$cats = DB::table('categorias')->orderBy('nome')->get();
	foreach ($cats as $cat) {
		echo "id: " . $cat->id .": ";
		echo "nome: " . $cat->nome ."<br>";
	}

	echo "<p>Ordernando por nome (decrescente)</p>";

	$cats = DB::table('categorias')->orderBy('nome','desc')->get();
	foreach ($cats as $cat) {
		echo "id: " . $cat->id .": ";
		echo "nome: " . $cat->nome ."<br>";
	}
});

/*Pegando o ID*/
Route::get('/novascategorias', function(){
	$id = DB::table('categorias')->insertGetID(
		['nome'=>'Demonios']
	);
	echo "Novo ID: = $id <br>";

});

/*Dando update*/
Route::get('/atualizandocategorias',function(){
	$cat = DB::table('categorias')->where('id',13)->first();
	echo "<p>Antes da atualização</p>";
	echo "id: " . $cat->id .": ";
	echo "nome: " . $cat->nome ."<br>";
	DB::table('categorias')->where('id',13)->update(['nome'=> 'Anjos']);
	$cat = DB::table('categorias')->where('id',13)->first();
	echo "<p>Depois da atualização</p>";
	echo "id: " . $cat->id .": ";
	echo "nome: " . $cat->nome ."<br>";
});

/*Fazendo Delete*/
Route::get('/removendocategorias',function(){
	echo "Antes  da remoção<br>";
	$cats = DB::table('categorias')->get();
	foreach ($cats as $cat) {
		echo "id: " . $cat->id .": ";
		echo "nome: " . $cat->nome ."<br>";
	}
	echo "<hr>";

	//DB::table('categorias')->where('id',13)->delete();
	DB::table('categorias')->whereNotBetween('id',[1,8])->delete();

	echo "Depois da Atualização<br>";
	$cats = DB::table('categorias')->get();
	foreach ($cats as $cat) {
		echo "id: " . $cat->id .": ";
		echo "nome: " . $cat->nome ."<br>";
	}
});