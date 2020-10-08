<?php

/**
 * A Função permission
 *
 * @return object $loggedUser = Dados do Usuário logado
 */
function permission() {
  $ci = get_instance();

  $loggedUser = $ci -> session -> userdata("loggedUser");

  /** Valida os usuários que não tem sessão ativa  */
  if (!$loggedUser) {
    $ci -> session -> set_flashdata("danger", "Você não está logado no sistema!");
    redirect("login");
  }

  return $loggedUser;

}
