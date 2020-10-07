<?php

echo "<p class='clock'> ".dateTime()." </p>";

if($messages != null) {

  foreach ($messages as $m) {

    if ($m->autor == $_SESSION['loggedUser']['nome']) {
        echo '<div id="viewMessage"><img class="thumbMessageRight" src="'.base_url().'images/user.png"><p class="textMessageRight"><i class="options fas fa-angle-down" onclick=options('.$m->id.')></i><strong class="right">'.$m->autor.'</strong><br />'.$m->message.'</p></div><div class="clearfix"></div>';
    } else {
      echo '<div id="viewMessage"><img class="thumbMessage" src="'.base_url().'images/user.png"><p class="textMessage"><strong>'.$m->autor.'</strong><br />'.$m->message.'</p></div><div class="clearfix"></div>';
    }

  }

} else {
  echo '<div class="noMessage"><i class="far fa-comment-dots"></i> Nenhuma mensagem recebida!<div class="clearfix"></div>';
}
