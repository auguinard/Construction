<?php 
require 'db.class.php';
require 'panier.class.php';
$DB = new DB();
$panier = new panier($DB);

$json = array('error' => true);
if (isset($_GET['id'])) {
  $prest = $DB->query('SELECT id FROM prestation WHERE id=:id', array('id' => $_GET['id']));
  if (empty($prest)) {
  $json['message'] = "choix non disponible";
  }
  $panier->add($prest[0]->id);
  $json['error'] = false;
  $json['total'] = $panier->total();
  $json['total'] = $panier->count();
  $json['message'] = 'votre choix a bien été enregistré ';
}else{
  $json['message'] = "vous n'avez pas clique sur le bouton";
}
 echo json_encode($json);


//<a href="javascript:history.back()">continuer votre chiffrage</a>-->