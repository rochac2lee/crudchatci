<?php

/**
 * A Função dateTime serve para retornar a hora servidor
 *
 * @return string $time = Hora
 */
function dateTime() {

  date_default_timezone_set('America/Sao_Paulo');
  $time = date('H:i');

  return $time;

}
