<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
<body>

	@hasSection('minha_secao_produtos')
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Produtos</h5>
			<p class="card-text">
				@yield('minha_secao_produtos')
			</p>
			<a href="" class="card-link">Ajuda</a>
			<a href="" class="card-link">Informações</a>
		</div>
	</div>
	@endif

	<script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
</body>
</html>