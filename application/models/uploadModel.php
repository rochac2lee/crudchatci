<?php

class uploadModel extends CI_Model {

  //Insere nova mensagem na tabela message do banco de dados
  public function newMessage($uploadFiles) {
    $this -> db -> insert("message", $uploadFiles);
  }

}
