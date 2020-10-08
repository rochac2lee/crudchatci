<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Documentação da Classe do Controler Login
 *
 * @copyright (c) 2020, Cleberli da Rocha
 */
class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('loginModel');
	}
	
	/**
	 * Método Index da Classe Chat
	 *
	 * @return view Login
	 */
	public function index()	{
		/** @param object $data envia o titulo e envia para view  */
		$data["title"] = "Login no Chat";
		$this->load->view('pages/login', $data);
	}

	/**
	 * A Função signIn envia o nome do usuário para a model que irá gravar no banco 	
	 *
	 * @return redirect
	 */
	public function signIn() {
		/** @var array $user recebe o nome do usuário via método post  */
		$user = $_POST;
		$this -> loginModel -> signIn($user);

		/** Valida se o usuário já tem uma sessão ativa  */
		if ($user) {
			$this -> session -> set_userdata("loggedUser", $user);
			redirect("chat");
		} else {
			redirect("login");
		}

	}

	/**
	 * A Função logout destroi a sessão do usuário no navegador	
	 *
	 * @return redirect
	 */
	public function logout() {
		/** @var string $user recebe o nome do usuário da sessão atual e destroi envia para model atualizar o status visible para false */
		$user = $_SESSION['loggedUser']['nome'];
		$this -> loginModel -> logout($user);
		$this -> session -> unset_userdata("loggedUser");
		redirect("login");
	}

}
