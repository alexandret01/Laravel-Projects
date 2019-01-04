<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
<body>

	@if(isset($produtos))
		@if (count($produtos) == 0)
		<h2>Estamos sem produtos</h2>
		@elseif (count($produtos) === 1)
		<h1>Um produto</h1>
		@else
		<h1>Temos varios produtos</h1>
		@endif
		
		@foreach($produtos as $p)
			<p>Nome: {{$p}}</p>
		@endforeach

	@else <h2>Estamos sem produtos</h2>
	@endif

	@empty($produtos)
		<h2>Não existe produtos</h2>
	@endempty

	<script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
</body>
</html>