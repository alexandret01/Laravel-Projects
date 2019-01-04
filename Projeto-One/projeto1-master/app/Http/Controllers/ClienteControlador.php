<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteControlador extends Controller
{
    public function index()
    {
        return "Lista de Clientes: ClienteRoot";
    }

    public function create()
    {
        return "Formulario de Cadastro";
    }

    public function store(Request $request)
    {
        $s = "Amazenar: ";
        $s .= "Nome: " . $request->input('nome') . " e ";
        $s .= "Idade: " . $request->input('idade');
        return response($s, 201);
    }

    public function show($id)
    {
        $v =["Mario","Josoe","Gilson"];
        if($id >= 0 && $id< count($v))
            return $v[$id];
        return "Não encontrado";
    }

    public function edit($id)
    {
        return "Formulario a editar tem o ID: " . $id;
    }

    public function update(Request $request, $id)
    {
         $s = "Atualizar o Cliente com o id $id: ";
        $s .= "Nome: " . $request->input('nome') . " e ";
        $s .= "Idade: " . $request->input('idade');
        return response($s, 201);
    }

    public function destroy($id)
    {
        return response("Apagado Cliente com o id $id", 200);
    }
}
