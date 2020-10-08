<?php

$this -> load -> view("templates/header");

$chatDoc = new Chat();
$newMessage = $chatDoc->;

echo $newMessage;

$this -> load -> view("templates/footer");
