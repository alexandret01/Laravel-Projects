<!DOCTYPE html>
<html>
<head>
	<title>Meu Titulo - @yield('titulo')</title>
</head>
<body>
	@section('barralateral')
		<p>Esta parte e do tamplate pai</p>
	@show
	<div>
		@yield('conteudo')
	</div>
</body>
</html>