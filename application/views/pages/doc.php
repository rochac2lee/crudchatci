<?php

$this -> load -> view("templates/header");

$chatDoc = new Chat();
$chatDoc = new Login();
//$newMessage = $chatDoc->chat;

//echo $newMessage;

$this -> load -> view("templates/footer");
