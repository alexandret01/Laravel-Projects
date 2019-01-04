@extends('layout.app')

@section('titulo', 'Minha Página - Filho')

@section('barralateral')
	@parent
	<p>Essa parte e do filho</p>
@endsection

@section('conteudo')
	<p>Este é o conteudo do filho</p>
@endsection