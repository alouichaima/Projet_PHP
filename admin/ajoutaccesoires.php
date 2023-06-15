<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
    <form style="margin-left: 1cm;" method="post" enctype="multipart/form-data">
        <h1>Accesoires</h1>
        Nom: <input type="text" name="nom"> <br><br>
        Prix: <input type="text" name="prix"><br><br>
        <br><br>
        Image: <input type="file" name="image" > <br><br><br><br>
        <input type="submit" name="enregistre" value="Enregistrer">
        <input type="submit" value="afficher" name="bt"> 
      </form>
        <?php
        require'accesoires.php';
        $p=new accesoire(null,"","","");
        
      ?>
                
        <?php
        if(isset($_POST['enregistre'])){
                $p->nom=$_POST['nom'];
                $p->prix=$_POST['prix'];
                $p->image=$_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'],"../images/".$p->image);
                $p->insert($pdo);
        }
                ?>
                <br><br>
         <table border="2" style="margin-left: 4cm;">
            <?php
             $res=$p->selection($pdo);
             while ($row=$res->fetch())
                 
             { ?>
            <tr><td><?php echo $row['id']?></td>
                <td><?php echo $row['nom']?></td>
                <td><?php echo $row['prix']?></td>
                <td><img width="200" height="200" src='../images/<?php echo $row['image']?>' >   </td>
                
              <!--en cliquant sur le lien modifier d'un certain id, on sera envoyé sur la page modifier.php avec la valeur id--> 
                <td><a href="modifieraccesoires.php?id=<?php echo $row['id']?>"> Modifier </a></td>
                
              <!--en cliquant sur le lien supprimer d'un certain id, on veut rester sur  la meme pagemais dans la meme case ou se trouve le lien hypertexte supprimer, on veut afficher deux boutons supprimer et annuler, et puis on choist, soit on supprime soit on annule-->   
                <td><a href="ajoutaccesoires.php?idsup=<?php echo $row['id']?>" > Supprimer </a>
              <!--tester si on a cliqué sur un bouton supprimer,avec if(isset($_GET['idsup']) et L autre pour n afficher que sur ligne concernee-->     
                    <?php if(isset($_GET['idsup']) && $row['id'] ==$_GET['idsup']){
                        
                        //récupérer le id choist pour etre supprimé
            $idp=$_GET['idsup'];
            //ajouter les deux boutons juste dans la case concernée
            ?> <form method="post">
                <input type="submit" name="supprimer" value="Supprimer">
                <input type="submit" name="annuler"  value="Annuller">
                 </form>
           
        <?php
        //appelr al methode supprimer au cas ou on a appuyé sur le bouton supprimer
          if(isset($_POST['supprimer'])){
              
            $p->supprimer($pdo,$idp);
            //redirection vers l apage undex.php pour qu'elle soit rafraichie  et la ligne concernée va être supprimé du tableau
           // header("location:ajoutproduithomme.php");
        
          }
         
          //redirection vers index.htmlen ca d'annulation pour cacher les deux boutons supprimet et annuler
         } ?>
             </td>
        </tr>
        
        <?php }
        
            ?>
       
        
                
    </table>    
          
    </body>
</html>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>