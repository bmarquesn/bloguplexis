<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Blog UpLexis - Bruno Nogueira</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	function exibir_alerta(mensagem){
		$('.alert.alert-danger').hide('slow');
		$('.alert.alert-danger').text(mensagem);
		$('.alert.alert-danger').show('slow');
	}
	</script>
</head>
<body class="bg-light">
<div class="container">
	<div class="py-5 text-center">
		<h2>Prova / Teste UpLexis</h2>
	</div>
    @yield('content')
	<footer class="my-5 pt-5 text-muted text-center text-small">
		<p class="mb-1">© 2019 Bruno Nogueira - UpLexis</p>
	</footer>
</div>
</body>
</html>