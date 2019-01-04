<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControllador extends Controller
{
    public function listar(){
    	$produtos = [
    		"Notebook Dell i5 1TB",
    		"Mouse Razer Chorma 10kDPi",
    		"TV 32 Samsung",
    		"Samsung 7 EDGE",
    		"Teclado Multila"
    	];
    	return view('produtos', compact('produtos'));
    }

    public function secaoprodutos($palavra){
        return view('secao_produtos', compact('palavra'));
    }

    public function mostraropcoes(){
        return view('mostrar_opcoes');
    }

    public function opcoes($opcao){
        return view('opcoes', compact('opcao'));
    }

    public function loopfor($n){
        return view('loopfor', compact('n'));
    }
}
