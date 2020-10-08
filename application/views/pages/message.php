<?php

//hora atual do servidor para ir junto com as mensagens pro banco
echo "<p class='time'> ".dateTime()." </p>";

//valida se tem alguma mensagem
if($messages != null) {

  foreach ($messages as $m) {
    //verifica o usuário ativo para mostrar as mensagens no lado certo da tela
    if ($m->autor == $_SESSION['loggedUser']['nome']) {
        echo '
          <div id="viewMessage" onclick=options('.$m->id.')>
            <img class="thumbMessageRight" src="'.base_url().'images/user.png">
            <p class="textMessageRight">
              <i class="options fas fa-angle-down"></i>
              <strong class="right">'.$m->autor.'</strong>
              <br />
              <span class="right">'.$m->message.'</span>
              <span class="messageTimeRight">'.$m->time.'</span>
            </p>
          </div>
          <div class="clearfix"></div>
        ';
    } else {
      //se tiver apenas 1 usuário ativo deixa com opacidade o que já foi escrito pelos outros usuários
      if ($users == null) { $classUser = "noUsers"; } else { $classUser = ""; };
      echo '
        <div id="viewMessage" class="'.$classUser.'">
          <img class="thumbMessage" src="'.base_url().'images/user.png">
          <p class="textMessage">
            <strong>'.$m->autor.'</strong>
            <br />
            <span>'.$m->message.'</span>
            <br />
            <span class="messageTimeLeft">'.$m->time.'</span>
          </p>
        </div>
        <div class="clearfix"></div>';
    }
  }

} else {
  echo '<div class="noMessage"><i class="far fa-comment-dots"></i> Nenhuma mensagem recebida!<div class="clearfix"></div>';
}
