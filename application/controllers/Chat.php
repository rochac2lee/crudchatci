<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	public function __construct() {
		parent::__construct();
		permission(); //Valida se o usuário tem sessão no navegador [função contruída no arquivo AUTH_HELPER]
		$this->load->model('chatModel');
		$this->load->model('uploadModel');
	}

//================================================================//
//CHAT

	public function index()	{
		$data["messages"] = $this -> chatModel -> index();
		$data['title'] = "Chat com CodeIgniter";
		$this->load->view('pages/chat', $data);
	}

	//Pega a mensagem como post e manda para o chatModel gravar no banco
	public function newMessage() {
		$message = $_POST;
    $this -> chatModel -> newMessage($message);
	}

	//Pega os dados da mensagem e identifica usuários logados para mostrar na aba "Usuários Online"
	public function viewMessage() {
		$data["users"]    = $this -> chatModel -> viewloggedUsers();
		$data["messages"] = $this -> chatModel -> viewMessage();
		$this->load->view('pages/message', $data);
	}

	//passa os dados da mensagen que deve ser editada ou excluída
	public function viewMessageOptions($id) {
		$data["message"] = $this -> chatModel -> viewMessageOptions($id);
		$this->load->view('pages/messageOptions', $data);
	}

	//passa o parametro id para o chatModel excluir do banco - [Soft Delete]
	public function deleteMessage($id) {
    $this -> chatModel -> deleteMessage($id);
  }

	//passa a mensagem editada para o chatModel gravar no banco
	public function editMessage($id) {
		$editMessage = $_POST;
		$this -> chatModel -> editMessage($id, $editMessage);
	}

//================================================================//
//UPLOAD DE ARQUIVOS

	//envia a mensagem com o nome do arquivo
	public function newFileMessage() {
		$message = $_POST;
		$this -> uploadModel -> newFileMessage($message);
	}

	//passa o arquivo como post para o uploadModel que vai fazer o upload do arquivo
	public function saveFiles() {
		$filesToSend = $_POST;
		$this -> uploadModel -> saveFiles($filesToSend);
	}

//================================================================//
//USUÁRIOS ATIVOS

	//busca usuários ativos
	public function viewloggedUsers() {
		$data["users"] = $this -> chatModel -> viewloggedUsers();
		$this->load->view('pages/loggedUsers', $data);
	}

}
