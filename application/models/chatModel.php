<?php

class chatModel extends CI_Model {
  public function index() {
    return $this -> db -> get("message") -> result();
  }

  //Insere nova mensagem na tabela message do banco de dados
  public function newMessage($message) {
    $this -> db -> insert("message", $message);
  }

  public function viewMessage() {
    $this -> db -> order_by("id", "ASC");
    return $this -> db -> get("message") -> result();
  }

  public function viewMessageOptions($id) {
    return $this -> db -> get_where("message", array('id' => $id)) -> result();
  }

  public function viewloggedUsers() {
    $this -> db -> where("nome !=", $_SESSION['loggedUser']['nome']);
    return $this -> db -> get("users") -> result();
  }

}
