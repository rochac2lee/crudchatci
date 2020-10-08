<?php

class uploadModel extends CI_Model {

  //Insere nova mensagem na tabela message do banco de dados
  public function newFileMessage($message) {
    $this -> db -> insert("message", $message);
  }

  public function saveFiles($filesToSend) {
    uploadFiles($filesToSend);
  }

}
