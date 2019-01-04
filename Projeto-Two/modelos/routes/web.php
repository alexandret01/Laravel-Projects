<?php

use App\Categoria;

Route::get('/', function () {
    $categorias = Categoria::all();
    foreach($categorias as $c){
        echo "id: " . $c->id. ', ';
        echo "nome: " . $c->nome. "<br>";
    }
});

Route::get('/inserir/{nome}', function($nome){
    $cat = new Categoria();
    $cat->nome = $nome;
    $cat->save();
    return redirect('/');
});

Route::get('/categoria/{id}/{nome}', function ($id, $nome) {
    $cat = Categoria::find($id);
    if(isset($cat)){
        echo "nome: " . $cat->nome = $nome;
        $cat->save();
        return redirect('/');
    }
    else{
        echo "<h1>Categoria Não Encontrada</h1>";
    }
});

Route::get('/remover/{id}', function ($id) {
    $cat = Categoria::find($id);
    if(isset($cat)){
        $cat->delete();
        return redirect('/');
    }
    else{
        echo "<h1>Categoria Não Encontrada</h1>";
    }
});

Route::get('/categoriapornome/{nome}', function ($nome) {
    $cat = Categoria::where('nome',$nome)->get();
    foreach($cat as $c){
      echo "id: " . $c->id;
      echo "nome: " . $c->nome;
    }
});

Route::get('/categoriamaiorque/{id}', function ($id) {
    $cat = Categoria::where('id', '>=' ,$id)->get();
    foreach($cat as $c){
      echo "id: " . $c->id. ' ';
      echo "nome: " . $c->nome . "<br>";
    }
    $count = Categoria::where('id', '>=',$id)->count();
    echo "<h1>Count: $count</h1>";
    $cmax = Categoria::where('id', '>=',$id)->max('id');
    echo "<h1>Count: $cmax</h1>";
});

Route::get('/todas', function () {
    $categorias = Categoria::withTrashed()->get();
    foreach($categorias as $c){
        echo "id: " . $c->id. ', ';
        echo "nome: " . $c->nome;
        if($c->trashed())
            echo '(apagado)<br>';
        else
            echo '<br>';
    }
});

Route::get('/ver/{id}', function ($id) {
    $cat = Categoria::withTrashed()->find($id);
    if(isset($cat)){
        echo "Id: " . $cat->id . ', ';
        echo "nome: " . $cat->nome . "<br>";
    }
    else{
        echo "<h1>Categoria Não Encontrada</h1>";
    }
});

Route::get('/todosapagados', function () {
    $categorias = Categoria::onlyTrashed()->get();
    foreach($categorias as $c){
        echo "id: " . $c->id. ', ';
        echo "nome: " . $c->nome;
        if($c->trashed())
            echo '(apagado)<br>';
        else
            echo '<br>';
    }
});

Route::get('/restaurar/{id}', function ($id) {
    $cat = Categoria::withTrashed()->find($id);

    if(isset($cat)){
        $cat->restore();
        echo "Categoria Restaurada Id: " . $cat->id . '<br>';
        echo "<a href=\"/modelos/public\"> Listar todas </a>" . $cat->nome . "<br>";
    }
    else{
        echo "<h1>Categoria Não Encontrada</h1>";
    }
});

Route::get('/apagarpermanente/{id}', function ($id) {
    $cat = Categoria::withTrashed()->find($id);

    if(isset($cat)){
        $cat->forceDelete();
        redirect('/');
    }
    else{
        echo "<h1>Categoria Não Encontrada</h1>";
    }
});
