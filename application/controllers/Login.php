<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('loginModel');
	}

	public function index()	{
		$data["title"] = "Login no Chat";
		$this->load->view('pages/login', $data);
	}

	//Cria o usuário no banco apenas com o nome
	public function signIn() {

		$user = $_POST;
		$this -> loginModel -> signIn($user);

		if ($user) {
			$this -> session -> set_userdata("loggedUser", $user);
			redirect("chat");
		} else {
			redirect("login");
		}

	}

	//destroi a sessão do usuário no navegador
	public function logout() {
		$user = $_SESSION['loggedUser']['nome'];
		$this -> loginModel -> logout($user);
		$this -> session -> unset_userdata("loggedUser");
		redirect("login");
	}

}
