<?php

/** Mensagens serão renderizadas pela função searchMessages() no JS 
 * 
 * Função dateTime mostra a hora atual do servidor para ir junto com as mensagens pro banco */
echo "<p class='time'> ".dateTime()." </p>";

/** Valida se tem alguma mensagem */
if($messages != null) {

  foreach ($messages as $m) {

    $file     = $m->file;
    $fileType = $m->fileType;

    if ($file != null) { $noTime = "noTime"; } else { $noTime = ""; $viewFile = ""; }

    /** Identifica o tipo do arquivo */
    switch ($fileType) {

      case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
          $viewFile = "
            <a href='./uploads/$file'>
              <img class='viewFileDoc' src='./images/word.png'>
            </a>
          ";
      break;

      case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet':
        $viewFile = "
          <a href='./uploads/$file'>
            <img class='viewFileDoc' src='./images/excel.png'>
          </a>
        ";
      break;

      case 'application/vnd.openxmlformats-officedocument.presentationml.presentation':
          $viewFile = "
            <a href='./uploads/$file'>
              <img class='viewFileDoc' src='./images/powerpoint.png'>
            </a>
          ";
      break;

      case 'application/pdf':
          $viewFile = "
            <a href='./uploads/$file'>
              <img class='viewFileDoc' src='./images/pdf.png'>
            </a>
          ";
      break;

      case 'image/jpeg' || 'image/jpg' || 'image/gif' || 'image/png':
          $viewFile = "
            <a data-fancybox='gallery' href='./uploads/$file'>
              <img class='viewFile' src='./uploads/$file'>
            </a>
          ";
      break;

    }

    if ($fileType === 'audio/ogg' || $fileType === 'audio/mpeg') {
        $viewFile = "
        <a href='./uploads/$file'>
          <img class='viewFileDoc' src='./images/audio.png'>
        </a>
        ";
    }

    /** Verifica o usuário ativo para mostrar as mensagens no lado certo da tela */
    if ($m->autor == $_SESSION['loggedUser']['nome']) {
        echo '
          <div id="viewMessage" onclick=options('.$m->id.')>
            <img class="thumbMessageRight" src="'.base_url().'images/user.png">
            <p class="textMessageRight">
              <i class="options fas fa-angle-down"></i>
              <strong class="right">'.$m->autor.'</strong>
              <br />
              <span class="right">'.$m->message.'</span>
              <span class="right">'.$viewFile.'</span>
              <span class="'.$noTime.' messageTimeRight">'.$m->time.'</span>
            </p>
          </div>
          <div class="clearfix"></div>
        ';
    } else {
      /** Se tiver apenas 1 usuário ativo deixa com opacidade o que já foi escrito pelos outros usuários */
      if ($users == null) { $classUser = "noUsers"; } else { $classUser = ""; };
      echo '
        <div id="viewMessage" class="'.$classUser.'">
          <img class="thumbMessage" src="'.base_url().'images/user.png">
          <p class="textMessage">
            <strong>'.$m->autor.'</strong>
            <br />
            <span>'.$m->message.'</span>
            <br />
            <span class="right">'.$viewFile.'</span>
            <br />
            <span class="'.$noTime.' messageTimeLeft">'.$m->time.'</span>
          </p>
        </div>
        <div class="clearfix"></div>';
    }
  }

} else {
  echo '<div class="noMessage"><i class="far fa-comment-dots"></i> Nenhuma mensagem recebida!<div class="clearfix"></div>';
}
