<?php require '../include/functions.php'; ?>

<?php

session_start();
 if (!empty($_POST)) {
   
   $errors = array();

   require_once '../include/db.php';

  
  if (empty($_POST['nom'])) {
    $errors['nom'] = "veillez entrer votre nom";
  }

   if(empty($_POST['Pseudo'])) {
     
     $errors['Pseudo'] = "Vous n'avez pas entrer de pseudo";
   } elseif (!preg_match('/^[a-z0-9_]+$/', $_POST['Pseudo'])) {
     $errors['Pseudo'] = "Votre pseudo est invalide";
   }
    else 
   {
     $req = $pdo->prepare('SELECT id FROM Register WHERE Pseudo = ?');

     $req->execute([$_POST['Pseudo']]);

     $user = $req->fetch();

     if ($user) {
      
         $errors['Pseudo'] = 'Ce pseudo est déjà utiliser';
           }
   }


   if(empty($_POST['email'])) {

    $errors['email'] = "Entre une adresse mail svp";
    
   } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "votre email est invalide";
   }

   else {

     $req = $pdo->prepare('SELECT id FROM Register WHERE email = ?');

     $req->execute([$_POST['email']]);

     $user = $req->fetch();

     if ($user) {
       $errors['email'] = 'ce email est déjà associé a un compte';
     }
   }


   if (empty($_POST['password'])) {

     $errors['password'] = "veillez saisir un mot de passe";

   }elseif ($_POST['password'] != $_POST['password_confirm']) {

     $errors['password'] = "Vos mot de passes ne correspondent pas";
   }

   if (empty($errors)) {
      


       $req = $pdo->prepare("INSERT INTO Register SET nom = ?, Pseudo = ?, email = ?, password = ?");

       $mdp = password_hash($_POST['password'], PASSWORD_BCRYPT);

       $req->execute([$_POST['nom'], $_POST['Pseudo'], $_POST['email'], $mdp]); 

       $_SESSION['flash']['success'] = 'Félicitation votre compte a bien été créer vous pouvez maintenant vous connecté';

       header('location: login.php');

       exit();    
     
   }



 }

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <title>Register</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
  </head>
  <body style="background:lightgray;">

  <div class="container" style="text-align: center;width: 400px;padding: 2em;background:white; border-radius: 8px;margin: 10% auto;">
    <div class="contenu">

       <?php if (!empty($errors)): ?>
         
         <div class="alert alert-danger">

          <p>vous n'avez pas renseigner le formulaire correctement</p>

          <ol> 
          <?php foreach ($errors as $error): ?>
            
            <li><?= $error; ?></li>

          <?php endforeach; ?>  
          </ol> 

         </div>

       <?php endif ?> 

      <br>
      <div class="" style="text-align: left;margin-left:30px">
        <span class="msg" style="position: absolute;padding: .5em;background:#00c3ff;color: #fff;opacity: 0;">Renseigner des informations corrects SVP</span>
      </div>
      <br>
      <h4 style="text-align: center">Enregistrement</h4>
        <hr>
      <form action="" method="post">
        <div class="form-group">

          <div class="">
              <input type="text" id="nom" name="nom" placeholder="Votre nom" class="form-control">
          </div>
           <br>
          <div class="">
              <input type="text" id="Pseudo" name="Pseudo" placeholder="Pseudo" class="form-control">
          </div>
          <br>
          <div class="">
               <input type="txet" name="email" placeholder="Votre email" class="form-control">
          </div>
          <br>
          <div class="">
               <input type="password" name="password" placeholder="Votre mot de Passe" class="form-control">
          </div>
          <br>
          <div class="">
               <input type="password" name="password_confirm" placeholder="Confirmez le Mot de Passe" class="form-control">
          </div>
          <br>
          <div class="">
            <input type="submit" value="s'enregistrer" class="btn" style="width:100%;background:#00c3ff;color:white;margin-top:2em;border:none;border-radius:5px;font-size:1.2em;cursor:pointer;">
          </div>
          <p>Vous êtes déjà membre?<br>
           <a href="login.php">Connectez-vous</a>
          </p>

        </div>
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
          y: 800
      },
      to: {
          scale: 1,
          opacity: 1,
          y: 0
      },
      duration: 1000
  })

  const myAnim2 = popmotion.keyframes({
      values: [
          { y: -50, opacity: 0 },
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
