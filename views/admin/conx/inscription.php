//
<!--il faut jamais appeler des projets avec des accents-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- <link rel="stylesheet" type="text/css" href="inscription.css"> -->

        <title></title>
    </head>
    <body>
    <div class="container">
    <form method="post" enctype="multipart/form-data">
      <h2>Creer votre compte</h2>
      <label style="margin-left: -0.2cm;"> Nom</label>
      <input type="text" required name="nom">
      <label style="margin-left: 1cm;">Prenom</label>
      <input type="text" required name="prenom"><br>

      <label> Email</label>
      <input type="email" required name="email">
      <label>Mots de passe</label>
      <input type="password" required minlength="6" name="mots_passe"><br>
      Photo: <input type="file" name="photo" > <br><br><br><br>
        Login : <input type="text" name="login"> <br><br>


      <div class="sexe">
      Sexe: H <input type="radio" name="rad" value="Homme">
             F <input type="radio" name="rad" value="Femme"><br><br>
      </div>  
       <input style="text-align: center;" type="submit"  value="inserer">&nbsp &nbsp
           <input style="text-align: center;" type="reset" value="Effacer">  
           <input type="submit" value="afficher" name="bt"> 

  </div> 
     
        </form>
        <?php
        require 'admin.php';
        $p=new admin(null,"","","","","","","");
        

        if(isset($_POST['inserer'])){
                $p->nom=$_POST['nom'];
                $p->prenom=$_POST['prenom'];
                $p->email=$_POST['email'];
                $p->mots_passe=$_POST['mots_passe'];
                $p->sexe=$_POST['rad'];
             
                $p->photo=$_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']['tmp_name'],"../../../images".$p->photo);
             
                $p->login=$_POST['login'];
                $p->email=$_POST['email'];
                $p->affiche();
                $p->insertion($pdo);
                
                
                
                
        }
                ?>
       