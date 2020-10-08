<?php

/**
 * A Função uploadFiles serve para realizar o upload dos arquivos enviados como método post
 *
 * @param  object $filesToSend = Arquivos enviados por post
 * @return void
 */
function uploadFiles($filesToSend) {

  $filesToSend   = $_FILES['files'];

  /** @var int $numFile recebe a quantidade de arquivos */
  $numFile       = count(array_filter($filesToSend['name']));

  /** @var array $permite recebe um array com os tipos de arquivo que podem ser enviados  */
  $permite       = array (
	
    'application/msword',
    'application/msword',

    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
    'application/vnd.openxmlformats-officedocument.wordprocessingml.template',
    'application/vnd.ms-word.document.macroEnabled.12',
    'application/vnd.ms-word.template.macroEnabled.12',

    'application/vnd.ms-excel',
    'application/vnd.ms-excel',
    'application/vnd.ms-excel',

    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    'application/vnd.openxmlformats-officedocument.spreadsheetml.template',
    'application/vnd.ms-excel.sheet.macroEnabled.12',
    'application/vnd.ms-excel.template.macroEnabled.12',
    'application/vnd.ms-excel.addin.macroEnabled.12',
    'application/vnd.ms-excel.sheet.binary.macroEnabled.12',

    'application/vnd.ms-powerpoint',
    'application/vnd.ms-powerpoint',
    'application/vnd.ms-powerpoint',
    'application/vnd.ms-powerpoint',

    'application/vnd.openxmlformats-officedocument.presentationml.presentation',
    'application/vnd.openxmlformats-officedocument.presentationml.template',
    'application/vnd.openxmlformats-officedocument.presentationml.slideshow',
    'application/vnd.ms-powerpoint.addin.macroEnabled.12',
    'application/vnd.ms-powerpoint.presentation.macroEnabled.12',
    'application/vnd.ms-powerpoint.template.macroEnabled.12',
    'application/vnd.ms-powerpoint.slideshow.macroEnabled.12',

    'application/vnd.ms-access',
    
    'application/pdf', 'audio/mp3', 'audio/ogg', 'image/jpeg', 'image/jpg', 'image/gif', 'image/png');

  /** @var int $maxSize = Tamanho do arquivo suportado */
  $maxSize	= 1024 * 1024 * 24;

 /** @var string $folder = Local onde serão armazenadas os arquivos */
  $folder = './uploads';

    /** Envia múltiplos arquivos para pasta de destino */
		for ($count = 0; $count < $numFile; $count++) {
			$name	 = $filesToSend['name'][$count];
			$type	 = $filesToSend['type'][$count];
			$size	 = $filesToSend['size'][$count];
			$error = $filesToSend['error'][$count];
			$tmp	 = $filesToSend['tmp_name'][$count];

      $sendedFile = $name;

      /** armazena os arquivos na pasta especificada */ 
      move_uploaded_file($tmp, $folder.'/'.$sendedFile);
    }

}
