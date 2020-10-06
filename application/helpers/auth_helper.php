<?php

function permission() {
  $ci = get_instance();

  $loggedUser = $ci -> session -> userdata("loggedUser");

  if (!$loggedUser) {
    $ci -> session -> set_flashdata("danger", "Você não está logado no sistema!");
    redirect("login");
  }

  return $loggedUser;

}
