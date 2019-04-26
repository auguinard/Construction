<?php

 session_start();

   if (!empty($_POST) && !empty($_POST['Pseudo']) && !empty($_POST['password'])) {
     
      require_once '../include/db.php';
      require_once '../include/functions.php';


      $req = $pdo->prepare('SELECT * FROM Register WHERE Pseudo = :Pseudo');
      $req->execute(['Pseudo' => $_POST['Pseudo']]);

      $user = $req->fetch();

      if(password_verify($_POST['password'], $user->password)){
        session_start();

        $_SESSION['auth'] = $user;

        $_SESSION['flash']['success'] = 'Vous êtes connecté';

        header('Location: ../index.php');
        exit();
      } else {
        $_SESSION['flash']['danger'] = 'Pseudo ou mot de passe incorrect';
      }

   }

 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Login</title>
   <link rel="stylesheet" href="../css/main.css">
   <link rel="stylesheet" href="../css/bootstrap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body style="background:lightgray;">

<div class="container" style="text-align: center;width: 400px;padding: 2em;background:white; border-radius: 8px;margin: 10% auto;">
  <div class="contenu">

    <?php if (isset($_SESSION['flash'])): ?>
      <?php foreach ($_SESSION['flash'] as $type => $message): ?>
        <div class="alert alert-<?= $type; ?>">
          <?= $message; ?>
        </div>
      <?php endforeach; ?>
      <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <br>
    <div class="" style="text-align: left;margin-left: 30px;">
      <span class="msg" style="position: absolute;padding: .5em;background:#00c3ff;color: #fff;opacity: 0;">Bienvenue sur notre espace membre</span>
    </div>
    <br>
    <h4 style="text-align: center">Authentification</h4>
      <hr>
     <p style="color:gray;"><i>Merci de renseigner vos identifiants de connexion pour accéder a votre compte afin d'avoir accès a tout nos services</i></p>

    <form action="" method="post">

        <div class="">
            <input type="text" name="Pseudo" placeholder="Pseudo" class="form-control">
        </div>
        <br>
        <div class="">
             <input type="password" name="password" placeholder="Mot de Passe" class="form-control">
        </div>
        <br>
        <div class="d-flex justify-content-around">
        <div class="">
          <input type="submit" value="Connexion" class="btn" style="width:100%;background:#00c3ff;color:white;margin-top:2em;border:none;border-radius:5px;font-size:1.2em;cursor:pointer;">
        </div>
        <p>Vous n'êtes pas encore membre?<br>
         <a href="register.php">Inscrivez-vous</a>
        </p>
    </form>

  </div>
  </div>

<script src="https://unpkg.com/popmotion/dist/popmotion.global.min.js"></script>
<script type="text/javascript">

const container = popmotion.styler(document.querySelector('.container'));
const formElements = document.querySelector('.contenu');
const msgPop = popmotion.styler(document.querySelector('.msg'));

const myAnim = popmotion.tween({
    from: {
        scale: .7,
        opacity: 0,
        x: 600
    },
    to: {
        scale: 1,
        opacity: 1,
        x: 0
    },
    duration: 100
})

const myAnim2 = popmotion.keyframes({
    values: [
        { y: -40, opacity: 0 },
        { y: -20, opacity: 1 },
        { y: -20, opacity: 1 },
        { y: 0, opacity: 0 },
    ],
    times: [0, .2,.8, 1],
    duration: 3000
})

myAnim.start({
    update: container.set,
    complete: () => { myAnim2.start(msgPop.set) }
});


const stylers = Array
    .from(formElements.children)
    .map(popmotion.styler);

const animations = Array(stylers.length)
    .fill(popmotion.spring({ from: 100, to:  0 }));

popmotion.stagger(animations, 100)
    .start((v) => v.forEach((x, i) => stylers[i].set({'y': x})));
</script>
</body>
</html>
