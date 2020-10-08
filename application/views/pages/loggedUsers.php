<?php

/** Lista os usuários logados pela função searchLoggedUsers() no JS */

  if($users != null) {

    foreach ($users as $u) {
      echo '<img class="thumb" src="'.base_url().'images/user.png"><p class="nameUser">'.$u->nome.'</p><div class="clearfix"></div>';
    }

  } else {
    echo '<div class="lblNoUsers"><i class="fa fa-users"></i> Apenas você está online!<div class="clearfix"></div>';
  }
