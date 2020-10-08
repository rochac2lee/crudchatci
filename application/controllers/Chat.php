<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Documentação da Classe do Controler Chat
 *
 * @copyright (c) 2020, Cleberli da Rocha
 */
class Chat extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		/** A Função permission é um helper que valida se o usuário já possui uma sessão ativa, caso não, o usuário será redirecionado para tela de login  */
		permission();

		$this->load->model('chatModel');
		$this->load->model('uploadModel');
	}

	//================================================================//
	//CHAT

	/**
	 * Método Index da Classe Chat
	 *
	 * @return view Chat
	 */
	public function index()	{
		/** @param object $data recebe os dados das mensagens e o titulo e envia para view  */
		$data["messages"] = $this -> chatModel -> index();
		$data['title'] = "Chat com CodeIgniter";
		$this->load->view('pages/chat', $data);
	}

	/**
	 * <b>newMessage</b>
     * A Função newMessage passa para o chatModel gravar a mensagem no banco
	 */
	public function newMessage() {
		/** @var array $message recebe a mensagem via método post  */
		$message = $_POST;
    	$this -> chatModel -> newMessage($message);
	}

	/**
	 * A Função viewMessage pega via objetos os dados da mensagem e identifica usuários logados para mostrar na aba "Usuários Online"
	 *
	 * @return view
	 */
	public function viewMessage() {
		/** @param object $data recebe os dados de usuários e mensagens e envia para view  */
		$data["users"]    = $this -> chatModel -> viewloggedUsers();
		$data["messages"] = $this -> chatModel -> viewMessage();
		$this->load->view('pages/message', $data);
	}

	/**
	 * A Função viewMessageOptions passa os dados da mensagem que deve ser editada ou excluída
	 *
	 * @param  int $id = Id da mensagem que vai receber as opções editar e excluir dinamicamente
	 * @return view
	 */
	public function viewMessageOptions($id) {
		/** @param object $data recebe os dados da mensagem que podem ser editadas ou excluídas  */
		$data["message"] = $this -> chatModel -> viewMessageOptions($id);
		$this->load->view('pages/messageOptions', $data);
	}

	/**
	 * A Função deleteMessage passa o parametro $id para o chatModel excluir do banco
	 * [Soft Delete] - Não será excluído do banco, mas não aparecerá mais na listagem dinâmica de mensagens
	 *
	 * @param  int $id = id da mensagem a ser excluída
	 * @return void
	 */
	public function deleteMessage($id) {
    	$this -> chatModel -> deleteMessage($id);
  }

	/**
	 * A Função editMessage passa a mensagem editada para o chatModel gravar no banco
	 *
	 * @param  mixed $id = Id da mensagem a ser editada
	 * @return view
	 */
	public function editMessage($id) {
		/** @var array $editMessage recebe a mensagem editada via método post  */
		$editMessage = $_POST;
		$this -> chatModel -> editMessage($id, $editMessage);
	}

	//================================================================//
	//UPLOAD DE ARQUIVOS

	/**
	 * A Função newFileMessage envia a mensagem com o nome do arquivo
	 *
	 * @return view
	 */
	public function newFileMessage() {
		/** @var array $editMessage recebe a mensagem vinculada ao arquivo via método post  */
		$message = $_POST;
		$this -> uploadModel -> newFileMessage($message);
	}

	/**
	 * A Função saveFiles passa o arquivo como post para o uploadModel que vai fazer o upload do arquivo
	 *
	 * @return void
	 */
	public function saveFiles() {
		/** @var array $filesToSend recebe a mensagem vinculada ao arquivo via método post  */
		$filesToSend = $_POST;
		$this -> uploadModel -> saveFiles($filesToSend);
	}

	//================================================================//
	//USUÁRIOS ATIVOS

	/**
	 * A Função viewloggedUsers busca usuários ativos
	 *
	 * @return view
	 */
	public function viewloggedUsers() {
		/** @param object $data recebe os dados dos usuários ativos  */
		$data["users"] = $this -> chatModel -> viewloggedUsers();
		$this->load->view('pages/loggedUsers', $data);
	}

}
