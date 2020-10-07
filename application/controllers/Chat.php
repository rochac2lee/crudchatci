<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	public function __construct() {
		parent::__construct();
		permission(); //Valida se o usuário tem sessão no navegador [função contruída no arquivo AUTH_HELPER]
		$this->load->model('chatModel');
	}

	public function index()	{
		$data["messages"] = $this -> chatModel -> index();
		$data['title'] = "Chat com CodeIgniter";
		$this->load->view('pages/chat', $data);
	}

	public function newMessage() {
		$message = $_POST;
    $this -> chatModel -> newMessage($message);
	}

	public function viewMessage() {
		$data["users"]    = $this -> chatModel -> viewloggedUsers();
		$data["messages"] = $this -> chatModel -> viewMessage();
		$this->load->view('pages/message', $data);
	}

	public function viewMessageOptions($id) {
		$data["message"] = $this -> chatModel -> viewMessageOptions($id);
		$this->load->view('pages/messageOptions', $data);
	}

	public function deleteMessage($id) {
    $this -> chatModel -> deleteMessage($id);
  }

	public function editMessage($id) {
		$editMessage = $_POST;
		$this -> chatModel -> editMessage($id, $editMessage);
	}

	public function viewloggedUsers() {
		$data["users"] = $this -> chatModel -> viewloggedUsers();
		$this->load->view('pages/loggedUsers', $data);
	}

}
