<?php

class loginModel extends CI_Model {

  public function signIn($nome){
    $this -> db -> where("nome", $nome);

    $user = $this -> db -> get("users") -> row_array();
    return $user;

  }

}
