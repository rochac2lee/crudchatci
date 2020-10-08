<?php

function uploadFiles($filesToSend) {

  $filesToSend   = $_FILES['files'];
  $numFile       = count(array_filter($filesToSend['name']));

  //requisitos
  $permite 	= array('image/bmp', 'image/jpeg', 'image/jpg', 'image/gif', 'image/png');
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
