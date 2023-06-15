<?php 
   session_start();
   include './connexion.php';

   //supprimer les produits
   //si la variable del existe
   if(isset($_GET['del'])){
    $id_del = $_GET['del'] ;
    //suppression
    unset($_SESSION['panier'][$id_del]);
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="panier">
    <section>
        <table>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Action</th>
            </tr>
            <?php 
              $total = 0 ;
              // liste des produits
              //vérifier que $_SESSION['panier'] est set et non vide avant d'utiliser array_keys()
              if(isset($_SESSION['panier']) && !empty($_SESSION['panier'])){
                //récupérer les clés du tableau session
                $id = array_keys($_SESSION['panier']);
                $produithomme = mysqli_query($con, "SELECT * FROM produithomme WHERE id IN (".implode(',', $id).")");

                //lise des produit avec une boucle foreach
                foreach($produithomme as $produithomme):
                    //calculer le total ( prix unitaire * quantité) 
                    //et aditionner chaque résutats a chaque tour de boucle
                    $total = $total + $produithomme['prix'] * $_SESSION['panier'][$produithomme['id']] ;
                ?>
                <tr>
                    <td><img src="../images/<?=$produithomme['image']?>"></td>
                    <td><?=$produithomme['nom']?></td>
                    <td><?=$produithomme['prix']?>€</td>
                    <td><?=$_SESSION['panier'][$produithomme['id']] // Quantité?></td>
                    <td><a href="panier.php?del=<?=$produithomme['id']?>"></td>
                </tr>

            <?php endforeach ;
              } else {
                echo "<tr><td colspan='5'>Votre panier est vide</td></tr>";
              }
            ?>

            <tr class="total">
                <th>Total : <?=$total?>€</th>
            </tr>
        </table>
    </section>
</body>
</html>