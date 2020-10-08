<?php

/**
 * Classe do Model Login
 *
 * @copyright (c) 2020, Cleberli da Rocha
 */
class loginModel extends CI_Model {
  
  /**
   * A Funçao signIn pesquisa na tabela de usuários se tem alguém com o nome informado pelo usuário 
   *
   * @param  object $user
   * @return object $user = Usuário com sessão ativa
   */
  public function signIn ($user) {
    $this -> db -> like("nome", $user['nome']);
    $result = $this -> db -> get("users") -> row_array();

    /** Se o nome estiver livre faz o insert e entra no sistema */
    if (empty($result)) {
      $this -> db -> insert("users", $user);
      return $user;
    } else {
      $this -> db -> set("visible", 1);
      $this -> db -> where("nome", $user['nome']);
      $this -> db -> update("users");
      return $user;
    }
  }
  
  /**
   * A Funçao logout muda o status do usuário para inativo
   *
   * @param  object $user
   * @return object $this Retorna o usuário com status atualizado
   */
  public function logout($user) {
    $this -> db -> set("visible", 0);
    $this -> db -> where("nome", $user);
    return $this -> db -> update("users");
  }

}
