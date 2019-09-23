@extends('usuario.layout')
@section('content')
<div class="row">
	<p>Capturar texto nos Artigos do Blog Uplexis</p>
</div>
<div class="row">
	<div class="alert alert-danger" role="alert" style="display:none;"></div>
</div>
<div class="row">
	<form class="form-inline" method="post" action="{{url('/artigo/buscar')}}" name="form_buscar">
		@csrf
		<label class="sr-only" for="palavra_buscar">Palavra</label>
		<input type="text" class="form-control mb-2 mr-sm-2" id="palavra_buscar" name="palavra_buscar" placeholder="Palavra" />
		<button type="submit" class="btn btn-primary mb-2">Buscar</button>
	</form>
	<div id="cerregando" style="display:none;font-size:11px;margin-left:10px;">Aguarde... <img src="{{ asset('img/loader.gif') }}" alt="Carregando" title="Carregando" style="width:15%;" /></div>
</div>
<br />
<div class="row">
	<a href="{{url('/artigo/listar')}}" class="btn btn-info" style="color:#fff;">Exibir Artigos das buscas salvas</a>
	&nbsp;
	<button type="button" class="btn btn-danger">Sair</button>
</div>
<script type="text/javascript">
$(function(){
	$('.btn.btn-primary.mb-2').click(function(event){
		event.preventDefault();
		var palavra_buscar=$('#palavra_buscar');
		if(palavra_buscar.val().trim()===''){
			exibir_alerta('É preciso digitar algo para fazer a busca...');
			palavra_buscar.focus();
		}else{
			$('#cerregando').show('slow');
			$('form[name="form_buscar"]').submit();
		}
	});
	
	$('.btn.btn-danger').click(function(event){
		event.preventDefault();
		var confirmar = confirm('Deseja mesmo sair do sistema?');
		if(confirmar){
			window.location.href = "{{url('/usuario/sair')}}";
		}
	});
});
@if ($message = Session::get('fail'))
	exibir_alerta("{{ $message }}");
@endif
</script>
@endsection