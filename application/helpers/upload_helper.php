<?php

function uploadFiles($filesToSend) {

  $filesToSend   = $_FILES['files'];
  $numFile       = count(array_filter($filesToSend['name']));

  //requisitos
  $permite 	= array (

  'application/msword',

  'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
  'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
  'application/vnd.ms-word.document.macroEnabled.12',

  'application/vnd.ms-excel',

  'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
  'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
  'application/vnd.ms-excel.sheet.macroEnabled.12',
  'application/vnd.ms-excel.template.macroEnabled.12',
  'application/vnd.ms-excel.addin.macroEnabled.12',
  'application/vnd.ms-excel.sheet.binary.macroEnabled.12',

  'application/vnd.ms-powerpoint',

  'application/vnd.openxmlformats-officedocument.presentationml.presentation',
  'application/vnd.openxmlformats-officedocument.presentationml.template',
  'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
  'application/vnd.ms-powerpoint.addin.macroEnabled.12',
  'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
  'application/vnd.ms-powerpoint.template.macroEnabled.12',
  'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',

  'application/pdf', 'audio/mp3', 'audio/ogg', 'image/jpeg', 'image/jpg', 'image/gif', 'image/png');
  $maxSize	= 1024 * 1024 * 24;

  //pasta
  $folder = './uploads';

		//Faz o upload de multiplos arquivos
		for ($count = 0; $count < $numFile; $count++) {
			$name	 = $filesToSend['name'][$count];
			$type	 = $filesToSend['type'][$count];
			$size	 = $filesToSend['size'][$count];
			$error = $filesToSend['error'][$count];
			$tmp	 = $filesToSend['tmp_name'][$count];

			//$data['sendedFile'] += $name;
      $sendedFile = $name;

      //armazena os arquivos na pasta especificada
      if (move_uploaded_file($tmp, $folder.'/'.$sendedFile)) {$mensagem = "Sucesso!";} else {$mensagem = "deu ruim";};
    }

  return print_r($filesToSend);

}
