<?php

function dateTime() {

  date_default_timezone_set('America/Sao_Paulo');
  $time = date('H:i');

  return $time;

}
