<?php

class chatModel extends CI_Model {
  public function index() {
    return $this -> db -> get("message") -> result();
  }

  public function newMessage($message) {
    $this -> db -> insert("message", $message);
  }

  public function viewMessage() {
    return $this -> db -> get("message") -> result();
  }

}
