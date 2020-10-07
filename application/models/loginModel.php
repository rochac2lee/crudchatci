<?php

class loginModel extends CI_Model {

  public function signIn ($user) {
    //Pesquisa na tabela de usuários se tem alguém com esse nome
    $this -> db -> like("nome", $user['nome']);
    $result = $this -> db -> get("users") -> row_array();

    //Se o nome estiver livre faz o insert e entra no sistema
    if (empty($result)) {
      $this -> db -> insert("users", $user);
      return $user;
    } else {
      return $user;
    }
  }

}
