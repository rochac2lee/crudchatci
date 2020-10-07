<?php

if($message != null) {

  foreach ($message as $m) {

    echo '

    <div class="dropdown dropdownOptions animated fadeInRight">
      <div class="dropdown-menu show" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" id="optionEdit" href="#">Editar</a>
        <a class="dropdown-item" id="optionDelete" href="javascript:void(0)" onclick="confirmMessageDelete()">Excluir</a>
      </div>
    </div>

    <div class="dropdown dropdownOptionsDelete animated fadeInRight" id="divOptionConfirmDelete">
      <div class="dropdown-menu show" aria-labelledby="dropdownMenuButton">
        <p class="textConfirm">Deseja realmente excluir essa mensagem?</p>
        <a class="dropdown-item optionConfirm" id="actionConfirm" href="javascript:void(0)" onclick="confirm('.$m->id.')">Sim</a>
        <a class="dropdown-item optionCancel" id="actionCancel" href="javascript:void(0)" onclick="confirm('.$m->id.')">Cancelar</a>
      </div>
    </div>

    ';

  }

}
