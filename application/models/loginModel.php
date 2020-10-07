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
      $this -> db -> set("visible", 1);
      $this -> db -> where("nome", $user['nome']);
      $this -> db -> update("users");
      return $user;
    }
  }

  public function logout($user) {
    $this -> db -> set("visible", 0);
    $this -> db -> where("nome", $user);
    return $this -> db -> update("users");
  }

}
