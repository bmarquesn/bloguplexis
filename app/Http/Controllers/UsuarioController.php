<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
	public $hash_senha = '-!2019_BlogUpLexis_BrunoNogueira-*';
    /**
     * Mosatra a p´gina inicial de login no sistema.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		session_start();

		if(!isset($_SESSION['usuario']['id']) || empty($_SESSION['usuario']['id'])) {
			return view('usuario.login');
		} else {
			//return redirect()->route('artigo.index');
			return redirect()->to('artigo/index');
		}
    }
	
	/**
     * Login no sistema.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        //
		if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
			$usuario = $_POST['usuario'];
			$senha = md5($_POST['senha'].$this->hash_senha);
			$sql = DB::table('usuario')->where([
				['usuario', '=', $usuario]
				,['senha', '=', $senha]
			//])->toSql();
			])->get();
			if($sql->isEmpty()) {
				return redirect()->to('usuario/index')->with('fail', 'Usuário ou Senha incorretos');
			} else {
				session_start();
				$_SESSION['usuario']['id'] = $sql[0]->id;
				$_SESSION['usuario']['usuario'] = $sql[0]->usuario;
				return redirect()->to('usuario/index');
			}
		} else {
			return redirect()->to('usuario/index')->with('fail', 'Os campos Usuário e/ou Senha não foram preenchidos');
		}
    }
	
	/**
     * Logout no sistema.
     *
     * @return \Illuminate\Http\Response
     */
	public function sair()
	{
		session_start();
		session_destroy();
		return Redirect()->to('usuario/index');
	}
}
