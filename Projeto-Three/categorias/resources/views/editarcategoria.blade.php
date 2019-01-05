@extends('layout.app',["current"=>"categorias"])

@section('body')
    <div class="catd border">
        <div class="card-body">
            <form action="/categorias/{{ $cat->id }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nomeCategoria">Nome da Categoria</label>
                    <input type="text" class="form-control" name="nomeCategoria" id="nomeCategoria" value="{{ $cat->nome }}" placeholder="Categoria">
                </div>
                <button type="submit" class="btn btn-primary btn-sn">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sn">Cancel</button>
            </form>
        </div>
    </div>
@endsection
