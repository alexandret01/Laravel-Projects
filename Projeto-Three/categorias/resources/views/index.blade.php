@extends('layout.app', ["current"=>"home"])
@section('body')

<div class="jumbotron bg-light border border-secondary">
    <div class="row">
        <div class="card-deck">
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-tittle"> Cadastro de produtos</h5>
                    <p class="card-text">
                        Aqui você cadastra os produtos, Mas não se esqueça de cadastrar as categorias
                    </p>
                    <a href="/produtos" class="btn btn-primary">Cadastre seus produtos</a>
                </div>
            </div>
            <div class="card border border-primary">
                <div class="card-body">
                    <h5 class="card-tittle"> Cadastro de Categorias</h5>
                    <p class="card-text">
                        Cadaste as categorias dos seus Produtos
                    </p>
                    <a href="/categorias" class="btn btn-primary">Cadastre seus categorias</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
