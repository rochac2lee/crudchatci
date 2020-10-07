<?php

  //Lista os usuários logados

  if($users != null) {

    foreach ($users as $u) {
      echo '<img class="thumb" src="'.base_url().'images/user.png"><p class="nameUser">'.$u->nome.'</p><div class="clearfix"></div>';
    }

  } else {
    echo '<div class="noMessage"><i class="far fa-users"></i> Apenas você está online!<div class="clearfix"></div>';
  }
