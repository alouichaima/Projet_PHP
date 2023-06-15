<!DOCTYPE html>
<html>
    <head>
        <title>Liste des utilisteurs</title>
        <link rel="stylesheet" href="list.css">

    </head>
<?php
include '../../connexion.php';

?>
    <body>
        <h1>Liste des Utilisateurs</h1>
            
        <table>
            <thead>
            <tr>
                <th>Identifient</th>
                <th>Nom</th> 
                <th>Prenom</th>
                <th>Email</th>
                <th>Sexe</th> 
                <th>Action</th>              
            </tr>

            </thead>
            <tbody>
            <?php   
                   $query= "select * from personne";
                   $statement= $pdo->prepare($query);
                   $statement->execute();

                  // $statement->setFetchMode(PDO::FETCH_OBJ);
                   $resultat=$statement->fetchAll(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOC
                   if($resultat)
                   {

                      foreach($resultat as $row )
                      {
                        ?>
                        <tr>
                        <td> <?php $row ['id' ]; ?> </td>
                         <td> <?php  $row ['nom']; ?> </td>
                        <td> <?php  $row ['prenom'] ?> </td>
                         <td> <?php  $row ['email'] ?> </td>
                            <td> <?php  $row ['sexe'] ?> </td>
                        </tr>
                        <?php
                      }
                   }
                   else
                   {

                   }

        
            ?>
        
        <tr>
        
          <td> <a href="Modifier.php">Modifier</a>
        </tr>

        <?php  ?>

            
     


            <tfoot>
                <tr>
                    <td colspan="6">
                        Listes des Utilisateurs inscrits
                    </td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>


