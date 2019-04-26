<?php

 require_once '../include/db.php';
 require_once '../include/functions.php';

 session_start();

 acces_refuse();


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/Profil.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
 
 <div class="card">
 	<div class="card-header">
 		<img src="../images/femme.jpg" alt="">
 		<div class="cover"> </div>
 		<div class="menu">
 			<ul>
 				<li class="ion-social-facebook"></li>
 				<li class="ion-social-youtube"></li>
 				<li class="ion-social-whatsapp"></li>
 			</ul>
 			<span class="ion-android-more-vertical"></span>
 		</div>
 		<div class="name">
 			<span class="last"><?= $_SESSION['auth']->Pseudo; ?></span>
 			<span class="first"><?= $_SESSION['auth']->nom; ?></span>
 		</div>
 	</div>

 	<div class="container">
 		<div class="left-section">
 			<h3>Vos informations</h3>
 			<p><?= $_SESSION['auth']->email; ?></p>
 			<a href="" class="followbtn">Editer</a>
 		</div>

 		<div class="right-section">
 			<h3 style="color: #9b59b6;">Vos actions</h3>
 			<div class="item">
 				<span class="num">null</span>
 				<span class="word">Favoris</span>
 			</div>

 			<div class="item">
 				<span class="num">Devis</span>
 				<span class="word">Plans enregistrer</span>
 			</div>
 			
 			<div class="item">
 				<span class="num">Ville</span>
 				<span class="word">Pays</span>
 			</div>
 		</div>
 	</div>
 </div>

</body>
</html>