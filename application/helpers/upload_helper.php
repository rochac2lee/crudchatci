<?php

function uploadFiles() {

  $filesToSend   = $_FILES['uploadBanner'];
  $numFile       = count(array_filter($banner['name']));

  //requisitos
  $permite 	= array('image/bmp', 'image/jpeg', 'image/jpg', 'image/gif', 'image/png');
  $maxSize	= 1024 * 1024 * 24;

  //pasta
  $folder = base_url().'uploads/banner';

		//Faz o upload de multiplos arquivos
		for ($count = 0; $count < $numFile; $count++) {
			$name	 = $banner['name'][$count];
			$type	 = $banner['type'][$count];
			$size	 = $banner['size'][$count];
			$error = $banner['error'][$count];
			$tmp	 = $banner['tmp_name'][$count];

			$sendedFile = array($name);

      //armazena os arquivos na pasta especificada
      move_uploaded_file($tmp, $folder.'/'.$banner);
    }

  return $sendedFile;

}
