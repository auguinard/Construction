<?php
 require 'db.class.php';
 require 'panier.class.php';
 $DB = new DB();
 $panier = new panier($DB);
 
 //suppression de produit
 /*if (isset($_GET['del'])) {
   $panier->del($_GET['del']);
 }
*/
?>

<!doctype html>
<html lang="en">
  <head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" type="text/css" href="css/dstyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Detail</title>
  </head>
  <body>
    
  <header>
    
  </header>
    
    <main>

      <div class="container mt-5">
        
    <div class="card card-cascade narrower">

 
  <div class="view view-cascade  narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center" style="background: linear-gradient(to left, #0000cc 0%, #66ccff 104%); color: white !important;">

    <div>
      <button type="button" class="btn btn-sm px-2" style="color: white; border-radius: 100px;border: 1px solid white;margin-left: 10px">
        <i class="fas fa-th-large mt-0"></i>
      </button>
      <button type="button" class="btn btn-sm px-2" style="color: white; border-radius: 100px;border: 1px solid white;">
        <i class="fas fa-columns mt-0"></i>
      </button>
    </div>

    <b class="mx-5" style="color: white">La liste de mes travaux détaillé</b>

    <div>
      <button type="button" class="btn btn-sm px-2" style="color: white; border-radius: 100px;border: 1px solid white;margin-right: 10px;">
        <i class="" style="font-weight: 900;font-size: 15px;"><?= $panier->count(); ?></i>
      </button>
    </div>

  </div>


  <div class="px-4">

    <div class="table-wrapper">

      <form method="post" action="panier.php">
  
      <table class="table table-hover mb-0">

        <thead>
          <tr>
            <th class="th-md">
              <b>PIECES</b>
            </th>
            <th class="th-md">
              <b>LOT</b>
            </th>
            <th class="th-md">
              <b>PRIX UNITAIRE</b>
            </th>
            <th class="th-md">
              <b>QUANTITE</b>
            </th>
            <th class="th-md">
             <b>PRIX HT</b>
            </th>
            <th class="th-md">
             <b>ACTIONS</b>
            </th>
          </tr>
        </thead>
    
  <?php
  $ids =array_keys($_SESSION['panier']);
  if (empty($ids)) {
    $prestation = array();
  }else{
  $prestation = $DB->query('SELECT * FROM prestation WHERE id IN ('.implode(',',$ids).')');
  }

  foreach ($prestation as $prest):
  ?>
  
        <tbody>

          <tr>
            <td><?= $prest->name; ?></td>
            <td></td>
            <td><?=  number_format($prest->price,2,',',' '); ?>Fcfa</td>
            <td><?= $_SESSION['panier'][$prest->id]; ?></td>
            <td><?=  number_format($prest->price * 1.15,2,',',' '); ?> Fcfa</td>
             <td>
                  <button type="button" class="btn btn-sm px-2" style="color: black; border-radius: 50px;border: 1px solid black;">
                  <a href="panier.php?delpanier=<?= $prest->id; ?>"><i class="far fa-trash-alt mt-0"></i></a>
                  </button>
             </td>
          </tr>
          
        </tbody>
    <?php endforeach; ?>    
      </table>
      <b style="margin-left: 70%;font-size: 24px;color: red;">Grand Total:</b>&nbsp;&nbsp;&nbsp;<span><?= number_format($panier->total(),2,',',' '); ?> Fcfa</span>
      <br>
      </form>
    
    </div>

  </div>

</div>


      </div>
      


    </main>
    <footer>
      
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>