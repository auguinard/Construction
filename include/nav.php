<?php

 require_once 'functions.php';

 session_start();

 ?>


<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" id="top-nav-collapse">
    <div class="container">
<a class="navbar-brand" href="#" style="font-weight: 900;">G-Business</a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicNav" aria-controls="basicNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="basicNav">
                <ul class="navbar-nav mr-auto smooth-scroll">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/lister.php">Lister vos travaux</a>
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
 <a class="dropdown-item" href="pages/register.php">Inscription</a>
 <a style="text-decoration: none;" class="dropdown-item" href="pages/login.php">Connexion</a>
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
