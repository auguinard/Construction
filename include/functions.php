<?php

  function debug($variable) {
  	echo '<pre>' . print_r($variable, true) . '</pre>';
  }

 function str_random($lenght) {
 
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";

    return substr(str_shuffle(str_repeat($alphabet, $lenght)), 0, $lenght);

 }

 function acces_refuse(){

 	if (session_status() == PHP_SESSION_NONE) {

 		session_start();
 	}
 	if (!isset($_SESSION['auth'])) {
 		
 		$_SESSION['flash']['danger'] = "vous ne pouvez pas acceder a cette page; veillez vous connecté d'abord";

 		header('location: login.php');

 		exit();
 	} 
 }