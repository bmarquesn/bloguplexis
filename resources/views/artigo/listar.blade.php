@extends('usuario.layout')
@section('content')
<div class="alert alert-danger" role="alert" style="display:none;"></div>
@csrf
<h3>Lista de Artigos capturados do Blog Uplexis</h3>
<br />
<p>
	Existem {{$qtd_artigos}} artigos cadastrados(s)
	<div id="cerregando" style="font-size:11px;margin-left:10px;display:none;float:right;">Aguarde... <img src="{{ asset('img/loader.gif') }}" alt="Carregando" title="Carregando" style="width:20px; !important;" /></div>
</p>
<br />
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Título</th>
			<th>Link</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
	@if(count($artigos) > 0)
		@foreach ($artigos as $key => $value)
		<tr>
			<td>{{$value->titulo}}</td>
			<td><a href="{{$value->link}}" target="_blank">{{$value->link}}</a></td>
			<td style="text-align:center;"><input type="hidden" value="{{$value->id}}" /><span class="btn btn-danger
 btn-sm" title="Excluir" style="cursor:pointer;">X</span></td>
		</tr>
		@endforeach
	@else
		<tr>
			<td colspan="3"><em>Não há Artigo para ser exibido</em></td>
		</tr>
	@endif
	</tbody>
</table>
{{ $artigos->appends(['sort' => 'nome'])->links() }}
<div><a href="{{url('/artigo/index')}}" title="Voltar" class="btn btn-primary">Voltar</a></div>
<script type="text/javascript">
$(function(){
	$('span[title="Excluir"]').click(function(){
		var confirmar = confirm('Deseja mesmo excluir o artigo selecionado?');
		var id_artigo = null;
		if(confirmar){
			id_artigo = $(this).parent('td').children('input[type="hidden"]').val();
			if(id_artigo !== null){
				$.ajax({
					url:"{{url('/artigo/excluir').'/'}}"+id_artigo,
					beforeSend:function(){
						$('#cerregando').show('fast');
					}
				})
				.done(function(data){
					$('#cerregando').hide('fast');
					
					if(data == '1'){
						alert('Registro excluído com sucesso!');
						window.location.reload();
					} else if(data == '0' || data == '-1') {
						alert('Erro ao excluir o registro!');
					}
				});
			}
			return true;
		}else{
			return false;
		}
	});
});
@if ($message = Session::get('fail'))
	exibir_alerta("{{ $message }}");
@endif
</script>
@endsection