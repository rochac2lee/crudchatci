<?php

class chatModel extends CI_Model {
  public function index() {
    return $this -> db -> get("message") -> result();
  }

  //Insere nova mensagem na tabela message do banco de dados
  public function newMessage($message) {
    $this -> db -> insert("message", $message);
  }

  //Busca a mensagens não excluídas
  public function viewMessage() {
    $this -> db -> where("visible", 1);
    $this -> db -> order_by("id", "ASC");
    return $this -> db -> get("message") -> result();
  }

  //Passa o id da mensagem como parâmetro para opções editar/excluir
  public function viewMessageOptions($id) {
    return $this -> db -> get_where("message", array('id' => $id)) -> result();
  }

  //soft delete (se o campo visible for igual a zero, não aparecerá na listagem das mensagens)
  public function deleteMessage($id) {
    $this -> db -> set("visible", 0);
    $this -> db -> where("id", $id);
    return $this -> db -> update("message");
  }

  //Atualiza a mensagem editada para o servidor
  public function editMessage($id, $editMessage) {
    $this -> db -> where("id", $id);
    return $this -> db -> update("message", $editMessage);
  }

  //busca por usuários logados
  public function viewloggedUsers() {
    $this -> db -> where("visible =", 1);
    $this -> db -> where("nome !=", $_SESSION['loggedUser']['nome']);
    return $this -> db -> get("users") -> result();
  }
}
