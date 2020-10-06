<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	public function index()	{
		$data['title'] = "Chat com CodeIgniter";
		$this->load->view('chat', $data);
	}
}
