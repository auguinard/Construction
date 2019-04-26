<?php 
require 'db.class.php';
require 'panier.class.php';
$DB = new DB();
$panier = new panier($DB);
//var_dump($DB->query('SELECT * FROM prestation'));
?>





<!doctype html>
<html lang="fr">
  <head>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" type="text/css" href="styledeco.css">

    <title>Hello, world!</title>
  </head>
  <body>
    
  <header>
    
  </header>

 
  <div class="prod-card">
<!--
   <span>NOMBRE D'ELEMENTS<span id="count">
      <button type="button" class="btn btn-sm px-2" style="color: white; border-radius: 100px;border: 1px solid white;margin-right: 10px;">
        <i class="" style="font-weight: 900;font-size: 15px;"><?= $panier->count(); ?></i>
      </button>
   </span></span> 
    <br>
   <span>TOTAL<span id="total">
      <button type="button" class="btn btn-sm px-2" style="color: white; border-radius: 100px;border: 1px solid white;margin-right: 10px;">
        <i class="" style="font-weight: 900;font-size: 15px;"><?= number_format($panier->total(),2,',',' '); ?> Fcfa</i>
      </button>
   </span></span>
-->

    <div class="col">
      <div class="img">
      <img src="../images/decoration.jpg" alt="">
    </div>
    </div>
    <div class="prod-info"> 

      <h2>Décoration d'une pièce</h2> 

      <span class="desc">Description du produit</span>
      <h4 style="color: #9e9e9e;">Quelles surfaces souhaitez-vous décorer ?</h4>
       

      <form action="/monsite/pages/decoration.php" method="GET">

        <?php $prestation = $DB->query('SELECT * FROM prestation'); ?>

        
     <span>
       <?php foreach ($prestation as $prest): ?>

      <a class="add" href="detail.php?id=<?= $prest->id; ?>"><?= $prest->name; ?></a>

      <?php endforeach ?>

     </span>
   
     <h4 style="color: #9e9e9e;">Quel est votre revêtement de sol actuel ?</h4>

     <span>
      <a href="">Chape brute</a>
     </span>
      <h4 style="color: #9e9e9e;">Quelle préparation souhaité-vous pour votre sol ?</h4>

     <span>
      <a href="">Ragréage</a>     
     </span>
      <h4 style="color: #9e9e9e;">Quel revêtement souhaité-vous pour votre sol ?</h4>
     <span>
      <a href="">Lino</a>
      <a href="">Parquet stratifié</a>
      <a href="">Parquet massif collé</a>
      <a href="">Moquette naturelle</a>
      <br>
      <br>
      <a href="">Parquet massif sur lambourdes</a>
      <a href="">Moquette synthétique</a>
      <a href="">Carrelage</a>
     </span>
     </span>
      <h4 style="color: #9e9e9e;">Quel niveau de game souhaité vous pour votre revêtément de sol ?</h4>
     <span>
      <a href="">Entrée de gamme</a>
      <a href="">Milieu de gamme</a>
      <a href="">Haut de gamme</a>
     </span>
     <h4 style="color: #9e9e9e;">Quel est votre revêtement de mur actuel ?</h4>
      <span>
      <a href="">Support sain</a>
      <a href="">Peinture dégradée partiellement</a>
      <a href="">Lambris</a>
      <a href="">Enduit decoratif</a>
      <br>
      <br>
      <a href="">Peinture degradée en majorité</a>
      <a href="">Tapisserie / Toile de verre</a>
      <a href="">Faience murale</a>
     </span>
     <h4 style="color: #9e9e9e;">Quel revêtement souhaitez-vous pour votre murs ?</h4>
      <span>
      <a href="">Tapisserie</a>
      <a href="">Peinture</a>
      <a href="">Toile de verre</a>
      <a href="">Enduit decoratif</a>
      <br>
      <br>
      <a href="">Lambris pin</a>
      <a href="">Peinture + Toile de verre</a>
      <a href="">Lambris chêne</a>
     </span>
     <h4 style="color: #9e9e9e;">Veillez saisir la surface au sol de la pièce (en m<sup>2</sup>)</h4>


      <!--<input type="number" name="chiffe" placeholder="1 à 100" value="<?= $value ?>">
      <button type="submit" class="addbtn1">valider</button>-->
      <br>
     <a href="" class="addbtn"><i class="ion-ios-cart"></i> Ajouter aux Devis</a>

     </form>
    </div>

  

  </div>
  

  <footer>
    
  </footer>
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script type="text/javascript" src="main.js"></script>
  </body>
</html>