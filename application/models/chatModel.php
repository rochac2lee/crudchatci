<?php

/**
 * Classe do Model Chat
 *
 * @copyright (c) 2020, Cleberli da Rocha
 */
class chatModel extends CI_Model {
    
  /**
   * Método Index da Classe Chat
   *
   * @return object $this Retorna todas as mensagens enviadas do banco
   */
  public function index() {
    return $this -> db -> get("message") -> result();
  }

  /**
   * A Função newMessage insere nova mensagem na tabela message do banco de dados  
   *
   * @param  object $message = Mensagem enviada por método post
   * @return void
   */
  public function newMessage($message) {
    $this -> db -> insert("message", $message);
  }

  //Busca a mensagens não excluídas  
  /**
   * A Função viewMessage busca todas as mensagens que não estão excluídas [Soft Delete]
   *
   * @return object $this Retorna as mensagens do banco
   */
  public function viewMessage() {
    $this -> db -> where("visible =", 1);
    $this -> db -> order_by("id", "ASC");
    return $this -> db -> get("message") -> result();
  }
 
  /**
   * A Função viewMessageOptions busca as mensagens que vão receber as opções editar/excluir 
   *
   * @param  int $id
   * @return object $this Retorna as mensagens onde o campo id for igual ao parametro id enviado
   */
  public function viewMessageOptions($id) {
    return $this -> db -> get_where("message", array('id' => $id)) -> result();
  }

  //soft delete 
  /**
   * A Função deleteMessage realiza um [Soft Delete]
   * (Se o campo visible for igual a zero, não aparecerá na listagem das mensagens)  
   *
   * @param  int $id
   * @return object $this Retorna resultado da query
   */
  public function deleteMessage($id) {
    $this -> db -> set("visible", 0);
    $this -> db -> where("id", $id);
    return $this -> db -> update("message");
  }

  /**
   * A Função editMessage atualiza a mensagem editada no banco 
   *
   * @param  int $id = Id da mensagem a ser atualizada
   * @param  int $editMessage = Mensagem editada
   * @return object $this Retorna resultado da query
   */
  public function editMessage($id, $editMessage) {
    $this -> db -> where("id", $id);
    return $this -> db -> update("message", $editMessage);
  }

  /**
   * A Função viewloggedUsers busca por usuários logados 
   *
   * @return object $this = Usuários logados
   */
  public function viewloggedUsers() {
    $this -> db -> where("visible =", 1);
    $this -> db -> where("nome !=", $_SESSION['loggedUser']['nome']);
    return $this -> db -> get("users") -> result();
  }
}
