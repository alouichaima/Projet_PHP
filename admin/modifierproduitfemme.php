<?php
require 'produitfemme.php';
$p=new produitfemme(null,"","","");
//il recupere le id qui a éte passé dans le get a partir de index.php
$id=$_GET['id'];
//il appelle la methode selection_id de la classe personne qui va permetter de remplir 
//le reste des champs de l instance $p avec les valeurs recuperees de la base
$p->selection_id($pdo,$id);

?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <form method="post" enctype="multipart/form-data" style="margin-left: 12cm; margin-top:4cm" >
    <h1>Modifier Produit</h1>

        
        Nom: <input type="text" name="nom" value="<?php echo $p->nom ?>"><br>
        Prix: <input type="text" name="prix" value="<?php echo $p->prix ?>"> <br>
         <br><br>
        Image: <img src="../images/<?php echo $p->image ?>"  width="200" 
height="200">
        <input type="file" name='image'><br><br>
        <input type="submit" value="Modifier" name="modifier">
    </form>
    <?php
       //apres avoir rempli les champs à modifier et cliquer sur modif, il va 
       //recuperer les donnes du formulaire et les modifier dans la base
        if(isset($_POST['modifier'])){
                $p->nom=$_POST['nom'];
                $p->prix=$_POST['prix'];
                if (!empty($_FILES['photo']['tmp_name'])) {
                    $p->image = $_FILES['photo']['name'];
                    move_uploaded_file($_FILES['photo']['tmp_name'], "../images/" . $p->image);
                }
                
                //j'applle la methode update qui va modiefier dans la base de donnes
                $p->update($pdo,$id);
                //redirection vers index.php apres avoir modifier
                header("location:ajoutproduitfemme.php");
        }
                ?>
 
</html>
