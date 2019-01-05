<?php

use App\Http\Middleware\PrimeiroMiddleware;
use Illuminate\Http\Request;

Route::get('/usuarios', 'UsuarioControlador@index')->middleware('primeiro','segundo');

Route::get('/terceiro', function(){
    return 'Passou pelo terceiro middleware';
})->middleware('terceiro:joao');

Route::get('/produtos','ProdutoControlador@index');

Route::get('/negado', function(){
    return "Acesso Negado";
})->name('negado');

Route::post('/login', function(Request $req){

    $login_ok = false;

    switch($req->input('user')){
        case 'joao':
        $login_ok = $req->input('passwd') === "senhajoao";
            break;
        case 'Marcos':
        $login_ok = $req->input('passwd') === "senhamarcos";
            break;
        case 'default':
        $login_ok = false;
    }
    if($login_ok){
        $login = ['user'=> $req->input('user')];
        $req->session()->put('login', $login);
        return response("Login Ok", 200);
    }
    else {
        $req->session()->flush();
        return response("Error no login", 404);
    }
});

Route::get('/logout', function(Request $request){
    $request->session()->flush();
    return response('Deslogado com sucesso', 200);
});
