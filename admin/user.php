<?php
session_start();
include '../connexion.php';
include('includes/header.php'); 
include('includes/navbar.php'); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  

  <title>Utilisateurs</title>
</head>

<body>
    <div class="Container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <?php 
                if(isset($_SESSION['message'])):
                ?>
                <h5 class="alert alert-success"> <?= $_SESSION['message'];  ?></h5>
                <?php 
                unset($_SESSION['message']);
                
                endif ?>
                <div class="card">
                    <div class="card-header">
                    <h3>Liste des utilisateur
                        <a href="useradd.php" class="btn btn-primary float-end" >Ajouter Utilisateur</a>
                     </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>Sexe</th>
                                    <th>role</th>
                                    <th>image</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                               require 'Personne.php';
                               $p=new personne(null,"","","","","","","");
                               $res=$p->selection($pdo);
                            
                                    foreach($res as $row)
                                    {
                                        ?>
                                        <tr>
                                        <td> <?php echo $row['id'] ?> </td>
                                         <td> <?php echo $row['nom'] ?> </td>
                                         <td> <?php echo $row['prenom'] ?> </td>
                                         <td> <?php echo $row['email'] ?> </td>
                                         <td> <?php echo $row['sexe'] ?> </td>
                                         <td> <?php echo $row['role'] ?> </td>
                                         <!-- <td> <?php echo $row['image'] ?> </td> -->
                                         <td> <?php if ($row['image']) {
    $image_path = '../images/' . $row['image'];

    echo '<img src="' . $image_path . '" alt="Image de profil"  width="100" 
    height="100">';
} ?>

</td>

                                         <td>
                                                <a href="modifuser.php?id= <?php echo $row ['id'] ;?>"  class="btn btn-primary ">Modifier</a>
                                            </td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                <button type="submit" name="suppr_user" value="<?php echo $row ['id'] ;?>" class="btn btn-danger">Supprimer</button>

                                                </form>
                                            </td>
                                        </tr>

                                        <?php
                                    }
                                
                                ?>
                                <tr>
                                
                    <td colspan="9">
                        Listes des Utilisateurs inscrits
                    </td>                                </tr>
                                <?php

                                ?>

                            </tbody>

                        </table>

                    </div>


                </div>

            </div>

        </div>

    </div>
</body>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>