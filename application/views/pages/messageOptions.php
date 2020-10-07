<?php

if($message != null) {

  foreach ($message as $m) {
    $id       = $m->id;
    $messsage = $m->message;

    echo '

    <p id="messageToEdit">'.$messsage.'</p>

    <div class="dropdown dropdownOptions animated fadeInRight">
      <div class="dropdown-menu show" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" id="optionEdit" href="javascript:void(0)" onclick=messageToEdit('.$id.')>Editar</a>
        <a class="dropdown-item" id="optionDelete" href="javascript:void(0)" onclick="confirmMessageDelete()">Excluir</a>
      </div>
    </div>

    <div class="dropdown dropdownOptionsDelete animated fadeInRight" id="divOptionConfirmDelete">
      <div class="dropdown-menu show" aria-labelledby="dropdownMenuButton">
        <p class="textConfirm">Deseja realmente excluir essa mensagem?</p>
        <a class="dropdown-item optionConfirm" id="actionConfirm" href="javascript:void(0)" onclick="deleteMessage('.$m->id.')">Sim</a>
        <a class="dropdown-item optionCancel" id="actionCancel" href="javascript:void(0)" onclick="cancelMessageDelete()">Cancelar</a>
      </div>
    </div>

    ';

  }

}
