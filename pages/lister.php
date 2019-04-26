<?php 
 
 require_once '../include/functions.php';
 
 //acces_refuse();

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Demande de Devis</title>

	 <!--balises meta-->
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <link rel="stylesheet" type="text/css" href="./style.css">
       <link rel="stylesheet" type="text/css" href="lister.css">


    <!--inclusion du css 
          
       <link rel="stylesheet" type="text/css" href="../css/demo1.css">-->
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>
	<header>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" id="top-nav-collapse">
    <div class="container">
<a class="navbar-brand" href="./index.php" style="font-weight: 900;">G-Business</a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicNav" aria-controls="basicNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="basicNav">
                <ul class="navbar-nav mr-auto smooth-scroll">
                    <li class="nav-item">
                        <a class="nav-link" href="lister.php">Lister vos travaux</a>
                    </li>
                <li class="nav-item">
            <a class="nav-link" href="#best-features">Demandez un Devis</a>
        </li>
    <li class="nav-item dropdown">
<a class="nav-link" href="#" >
<i class="fa fa-book ml-2"></i>Nos guides</a></li>
            <li class="nav-item">
        <a class="nav-link" href="#gallery">Emploi</a>
    </li>
    </ul>
    <ul>
        
    

     <li class="nav-item dropdown" style="list-style-type: none;">
                <?php if (isset($_SESSION['auth'])): ?>
     <a href="pages/profil.php" style="text-decoration: none;text-transform: uppercase;font-size: 10px;font-weight: 900;color: white;"><?= $_SESSION['auth']->Pseudo; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="pages/log-out.php" class="btn"><i style="color: white;margin-top: 5px;" class="fas fa-sign-out-alt"></i></a></li>
<?php else: ?> 
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: 700; text-decoration: none;cursor: pointer;color: white; text-transform: uppercase;">
          Membres
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">  
 <a class="dropdown-item" href="register.php">Inscription</a>
 <a style="text-decoration: none;" class="dropdown-item" href="login.php">Connexion</a>
 <?php endif; ?>
        </div>                        
        </ul>
        </div>
    </div>
</nav>

    <?php if (isset($_SESSION['flash'])): ?>
      <?php foreach ($_SESSION['flash'] as $type => $message): ?>
        <div class="alert alert-<?= $type; ?>">
          <?= $message; ?>
        </div>
      <?php endforeach; ?>
      <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>



	</header>

	<main>

		<div class="container" style="margin-top: 10%">
			<h1 style="color: #f0932b">lister vos travaux</h1>
			  <div class="row mt-5">
     	            
               <div class="col-md-9">
               	
                 <div class="row">
                 	<h5 style="color: #f0932b">Par prestation</h5>
                 	
                    <table class="table table-borderless">
                      
                    <tbody>
                        <tr>
                          <td>

                            
                              <button class="btn dropdown-toggle" type="button" id="Menu1" style="border: 2px solid #dcdde1;" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false"><i>Plomberie</i></button>
                                 <div class="dropdown-menu dropdown-primary">
                                  <a class="dropdown-item" href="#">Equipement sanitaires</a>
                                 <a class="dropdown-item" href="#">Autres équipements</a>
                            </div>
                           

                          </td>
                          <td>
                                    	
                            
                              <button class="btn dropdown-toggle" type="button" id="Menu2" style="border: 2px solid #dcdde1;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i>Menuisérie</i></button>
                                <div class="dropdown-menu dropdown-primary">
                                  <a class="dropdown-item" href="#">Porte</a>
                                    <a class="dropdown-item" href="#">Fénêtre</a>
                                  <a class="dropdown-item" href="#">Porte-Fénêtre</a>
                                <a class="dropdown-item" href="#">Plancher / Escalier</a>
                              </div>
                           

                          </td>
                          <td>
                                	
                            
                            <button class="btn dropdown-toggle" type="button" id="Menu3" style="border: 2px solid #dcdde1;" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false"><i>Maçonnerie</i></button>
                                <div class="dropdown-menu dropdown-primary">
                                  <a class="dropdown-item"  href="#">Façade</a>
                                    <a class="dropdown-item" href="#">Extérieur</a>
                                  <a class="dropdown-item" href="#">Maçonnérie sols</a>
                                <a class="dropdown-item" href="#">Maçonnérie murs</a>
                              </div>
                            
                          </td>
                          </tr>

                          <!---ligne 1-->
                          <tr>
                          
                              <td>                           
                              <button class="btn dropdown-toggle" type="button" id="Menu2" style="border: 2px solid #dcdde1;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i>Electricité</i></button>
                                <div class="dropdown-menu dropdown-primary">
                                  <a class="dropdown-item" href="#">Luminaire</a>
                                    <a class="dropdown-item" href="#">Prises et tableau électrique</a>
                              </div>
                          </td>
                          <td>
                                      
                            
                              <button class="btn dropdown-toggle" type="button" id="Menu2" style="border: 2px solid #dcdde1;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i> VMC/Clim </i></button>
                                <div class="dropdown-menu dropdown-primary">
                                  <a class="dropdown-item" href="#">VMC</a>
                                    <a class="dropdown-item" href="#">Radiateur</a>
                                  <a class="dropdown-item" href="#">Chaudière</a>
                                <a class="dropdown-item" href="#">Clim Réversible</a>    
                              </div>
                           

                          </td>
                          <td>
                                  
                            
                             <button class="btn dropdown-toggle" type="button" id="Menu1" style="border: 2px solid #dcdde1;" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false"><i>Revêtements</i></button>
                                 <div class="dropdown-menu dropdown-primary">
                                  <a class="dropdown-item" href="#">Intérieur</a>
                                 <a class="dropdown-item" href="#">Terrase</a>
                                <a class="dropdown-item" href="#">Peintures et enduits</a>
                               <a class="dropdown-item" href="#">Autres revêtements</a>  
                            </div>
                            
                          </td>

                        </tr>
                        </tbody>
                    </table>

                 </div>
                 <div class="row" style="margin-top: 5px">
                 	<h5 style="color: #f0932b">Par projet complet</h5>

                <table class="table table-borderless">
                      
                    <tbody>
                        <tr>
                          <td>                            
                              <button class="btn" id="Salle" type="button" style="border: 2px solid #dcdde1;"><i><a href="" style="text-decoration: none;color: #2d3436">Salle de bains</a> <br></i></button>                                                    
                          </td>
                          <td>                            
                              <button class="btn" id="install" type="button" style="border: 2px solid #dcdde1;"><i>Installation électrique <br></i></button>                                                     
                          </td>
                          <td>                                                           
                            <button class="btn" id="decor" type="button" style="border: 2px solid #dcdde1;"><i>Décoration d'une pièce <br></i></button>                                                         
                          </td>
                        </tr>
                        <!---ligne 2-->
                        <tr>                          
                          <td>                           
                              <button class="btn" id="creation" type="button" style="border: 2px solid #dcdde1;"><i>Création fénêtre <br></i></button>                             
                          </td>
                          <td>                                                               
                              <button class="btn" type="button" style="border: 2px solid #dcdde1;"><i> VMC/Clim </i></button>                                                        
                         </td>
                          <td>                            
                             <button class="btn" type="button" style="border: 2px solid #dcdde1;"><i>Revêtements</i></button>
                          </td>
                        </tr>
                        </tbody>
                    </table>

                 </div>

               </div>
               <div class="col-md-3">
               	<h6 style="color: #f0932b">Total Devis : </h6>
                <div>
                  
                </div>
                
               </div>
              </div>
		      </div>
		
	</main>

	<footer class="page-footer font-small unique-color-dark" style="background-color: #192a56; color: #fff;margin-top: 10px">
		<?php  require_once '../include/footer.php'; ?>
	</footer>
  <script type="text/javascript">

    //decoration salle
    
    $( "#decor" ).hover(
  function() {
    $( this ).append( $( "<span style='text-align: left;'><hr><p>lister la décoration d'une pièce complète : <b style='color: #f0932b;'>sols, murs et plafond</b> ou seulement 2 surfaces(<b style='color: #f0932b;'>sol et murs, murs et plafond, etc</b>).</p><p>Tous les revêtements les plus courant sont proposés : <b style='color: #f0932b;'>peinture, tapisserie, parquet, carrelage, moquette, etc</b></p><p>Les prestations de présentation de support sont également prises en compte.</p></span>" ) );
  }, function() {
    $( this ).find( "span:last" ).remove();
  }
);
 
$( "#decor" ).hover(function() {
  $( this ).fadeOut( 100 );
  $( this ).fadeIn( 500 );
});

// salle de bains

    $( "#Salle" ).hover(
  function() {
    $( this ).append( $( "<span style='text-align: left;'><hr><p>lister la Création d'une salle de bain, avec le déploiement des réseaux, ou la rénovation d'une salle de bain existante : <b style='color: #f0932b;'><br> -Sols<br> -Murs<br> -Installation électrique<br> -Equipements sanitaires</b></span>" ) );
  }, function() {
    $( this ).find( "span:last" ).remove();
  }
);
 
$( "#Salle" ).hover(function() {
  $( this ).fadeOut( 100 );
  $( this ).fadeIn( 500 );
});

//installation électrique

    $( "#install" ).hover(
  function() {
    $( this ).append( $( "<span style='text-align: left;'><hr><p>lister la rénovation complète de votre Installation électrique.</p> <p><b style='color: #f0932b;'>installation avant doublage</b>(isolation des murs ou plafonds) ou <b style='color: #f0932b;'>Installation encastrée</b> (saignées ou si impossible goulottes).</p><p>La prestation proposée s'adapte à la dimension de votre logement.</p></span>" ) );
  }, function() {
    $( this ).find( "span:last" ).remove();
  }
);
 
$( "#install" ).hover(function() {
  $( this ).fadeOut( 100 );
  $( this ).fadeIn( 500 );
});

//creation fénêtre

    $( "#creation" ).hover(
  function() {
    $( this ).append( $( "<span style='text-align: left;'><hr><p>lister la Création d'une fénêtre ou d'une Porte-Fénêtre : <b style='color: #f0932b;'><br> -Ouverture d'un mur porteur<br> -Fourniture et pose d'une fénêtre ou Porte-Fénêtre<br> -Fourniture et pose de volets roulants ou doublants</b></p></span>" ) );
  }, function() {
    $( this ).find( "span:last" ).remove();
  }
);
 
$( "#creation" ).hover(function() {
  $( this ).fadeOut( 100 );
  $( this ).fadeIn( 500 );
});

  </script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>