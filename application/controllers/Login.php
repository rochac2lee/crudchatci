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

	public function logout() {
		$this -> session -> unset_userdata("loggedUser");
		redirect("login");
	}

}
