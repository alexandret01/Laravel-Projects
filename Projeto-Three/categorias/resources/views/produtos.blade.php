@extends('layout.app',["current"=>"produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form>
                <div class="form-row align-items-center">
                  <div class="col-auto my-1">
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="produtos">
                      <option selected>Categorias</option>

                      @foreach ($cats as $cat)

                      <option value="{{ $cat->id }}">{{ $cat->nome }}</option>

                      @endforeach

                    </select>
                  </div>
                  <div class="col-auto my-1">
                    <a href="/produtos/novo/{{ $cat->id }}" class="btn btn btn-primary">Criar Produto</a>
                  </div>
                </div>
              </form>
        </div>
    </div>
@endsection
