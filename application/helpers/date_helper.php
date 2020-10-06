<?php

function dateTime() {

  date_default_timezone_set('America/Sao_Paulo');
  $dateTime = date('d/m H:i:s');

  return $dateTime;

}
