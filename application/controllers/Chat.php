<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	public function __construct() {
		parent::__construct();
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
		$data["messages"] = $this -> chatModel -> viewMessage();
		$this->load->view('pages/message', $data);
	}

}
