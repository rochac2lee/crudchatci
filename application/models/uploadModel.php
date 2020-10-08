<?php

/**
 * Classe do Model Uploads
 *
 * @copyright (c) 2020, Cleberli da Rocha
 */
class uploadModel extends CI_Model {
 
  /**
   * A Função newFileMessage insere nova mensagem relacionada ao arquivo na tabela message do banco 
   *
   * @param  object $message
   * @return void
   */
  public function newFileMessage($message) {
    $this -> db -> insert("message", $message);
  }
  
  /**
   * A Função saveFiles recebe os arquivos via post pela função sendFiles() no js
   *
   * @param  object $filesToSend
   * @return void
   */
  public function saveFiles($filesToSend) {
    uploadFiles($filesToSend);
  }

}
