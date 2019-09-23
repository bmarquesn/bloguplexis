@extends('usuario.layout')
@section('content')
<div class="alert alert-danger" role="alert" style="display:none;"></div>
<form action="{{url('/usuario/login')}}" method="post" id="login">
@csrf
	<div class="row">
		<div class="form-group">
			<label>
				<strong>Usuario:</strong>
				<input type="text" name="usuario" class="form-control" placeholder="Usuario" />
			</label>
		</div>
	</div>
	<div class="row">
		<div class="form-group">
			<label>
				<strong>Senha:</strong>
				<input type="password" name="senha" class="form-control" placeholder="Senha" />
			</label>
		</div>
	</div>
	<div class="row">
		<button type="submit" class="btn btn-primary">Entrar</button>
	</div>
</form>
<script type="text/javascript">
$(function(){
	$('.btn.btn-primary').click(function(event){
		event.preventDefault();
		var usuario = $('input[name="usuario"]');
		var senha = $('input[name="senha"]');
		if(usuario.val() == ''){
			exibir_alerta('É preciso preencher o campo USUÁRIO!');
			usuario.focus();
		}else if(senha.val() == ''){
			exibir_alerta('É preciso preencher o campo SENHA!');
			senha.focus();
		}else{
			$('.alert.alert-danger').hide('slow');
			$('form#login').submit();
		}
	});
});
@if ($message = Session::get('fail'))
   exibir_alerta("{{ $message }}");
@endif
</script>
@endsection