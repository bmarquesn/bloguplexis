<?php

namespace App\Http\Controllers;

use App\Artigo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ArtigoController extends Controller
{
    /**
     * Página inicial de Artigos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session_start();

		if(!isset($_SESSION['usuario']['id']) || empty($_SESSION['usuario']['id'])) {
			return Redirect()->to('usuario/index')->with('fail', 'É preciso estar logado');
		} else {
			return view('artigo.index');
		}
    }
	
	public function buscar()
	{
		session_start();
		
		if(!isset($_SESSION['usuario']['id']) || empty($_SESSION['usuario']['id'])) {
			return Redirect()->to('usuario/index')->with('fail', 'É preciso estar logado');
		} else {
			$url_uplexis =  'https://www.uplexis.com.br/blog/?s=';
			
			if(isset($_POST['palavra_buscar']) && !empty($_POST['palavra_buscar'])) {
				$palavra_buscar = urlencode($_POST['palavra_buscar']);
				
				$dados_url = file_get_contents($url_uplexis.$palavra_buscar);
				
				if(strpos($dados_url, 'Lamentamos, mas esta página não possui registros') === false) {
					$artigos = preg_split('{<div class="col-12">}', $dados_url);
					$artigos = preg_split('{</div></div></div>}', $artigos[1]);
					$artigos = preg_split('{Próxima página}', $artigos[0]);

					$artigos = explode('Continue Lendo', $artigos[0]);

					foreach($artigos as $key => $value) {
						if(strpos($value, 'window.location.href=') === false) {
							break;
						} else {
							$link = preg_split('{window.location.href=\'}', $value)[1];
							$link = preg_split('{">}', $link)[0];
							$link = trim(str_replace("'", "", $link));
							
							if($key == 0) {
								/*primeiro artigo*/
								$titulo = preg_split('{<span>}', $value)[1];
								$titulo = trim(preg_split('{</span>}', $titulo)[0]);
							} else {
								/*demais artigos*/
								$titulo = preg_split('{<div class="title">}', $value)[1];
								$titulo = trim(preg_split('{</div>}', $titulo)[0]);
							}
							
							/* salvar no banco de dados */
							DB::table('artigo')->insert([
								'id_usuario' => $_SESSION['usuario']['id']
								,'titulo' => $titulo
								,'link' => $link
								,'created_at' => date('Y-m-d H:i:s')
							]);
						}
					}
					
					return Redirect()->to('artigo/index')->with('fail', 'Foram inseridos '.(count($artigos) - 1).' artigos com sucesso');
				} else {
					return redirect()->to('artigo/index')->with('fail', 'Não foram encontrados registros para a busca realizada');
				}
			} else {
				return view('artigo.index');
			}
		}
	}
	
	public function listar()
	{
		session_start();

		if(!isset($_SESSION['usuario']['id']) || empty($_SESSION['usuario']['id'])) {
			return Redirect()->to('usuario/index')->with('fail', 'É preciso estar logado');
		} else {
			$qtd_artigos = DB::table('artigo')->count();
			$artigos = DB::table('artigo')->paginate(5);
		
			return view('artigo.listar', ['artigos' => $artigos, 'qtd_artigos' => $qtd_artigos]);
		}
	}
	
	/**
     * Excluir o artigo selecionado.
     *
	 * @param  \App\Usuario  $id_usuario
     * @return \Illuminate\Http\Response
     */
	public function excluir($id_usuario)
	{
		session_start();
		
		if(!isset($_SESSION['usuario']['id']) || empty($_SESSION['usuario']['id'])) {
			echo "-1";
		} else {
			if(DB::table('artigo')->where('id', '=', (int)$id_usuario)->delete()) {
				echo "1";
			} else {
				echo "0";
			}
		}
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artigo  $artigo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artigo $artigo)
    {
        //
    }
}
