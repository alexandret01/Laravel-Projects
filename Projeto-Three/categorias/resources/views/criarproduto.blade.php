@extends('layout.app',["current"=>"produtos"])

@section('body')
    <div class="catd border">
        <div class="card-body">
            <form action="/produtos" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomeCategoria">Nome so Produto</label>
                    <input type="text" class="form-control" name="nomeProduto" id="nomePorduto" placeholder="Produto">
                </div>
                <div class="form-group">
                    <label for="nomeCategoria">Quantidade</label>
                    <input type="text" class="form-control" name="Quantidade" id="Quantidade" placeholder="Quantidade">
                </div>
                <div class="form-group">
                    <label for="nomeCategoria">Preço</label>
                    <input type="text" class="form-control" name="preco" id="preco" placeholder="Preço">
                </div>
                <button type="submit" class="btn btn-primary btn-sn">Criar</button>
            </form>
        </div>
    </div>
@endsection
