<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=devices-width , initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">

  </head>

  <header>
  
    <label for="toggler" class="fas fa-bars"></label>
    <a href="acceuil.php" class="logo"><img style="width: 4.5cm; height: 4cm; margin-left: -1.5cm; margin-top: 0.5cm;" src="images/logo.png"></a>
    <nav class="navbar">
        <a href="acceuil.php">Acceuil</a>
        <a href="homme.php">Homme</a>
        <a href="femme.php">Femme</a>
        <a href="enfant.php">Enfant</a>
        <a href="accesoire.php">Matériel & Accessoire</a>
  
    </nav>
    <div class="icons">
        <a href="#review" class="fas fa-heart"></a>
        <a href="panier.html" class="fas fa-shopping-cart"></a>
        <a href="login.php" class="fas fa-user"></a>
        <a class="fa fa-search" aria-hidden="true"></a>
    </div>
  </header> 
<div class="container">
    <form  method="post">
      <p sty>Bienvenue</p>
      <input type="email" placeholder="Email" name="email" required><br>
      <input type="password" placeholder="Mot de passe" name="mots_passe" required><br>
      <input type="submit" value="Connexion" name="connexion"><br>
      <a href="inscription.php">Créer un compte</a>
    </form>

    <?php
          // il faut que le require doit etre avant le test, car l arecuperartion de session est dans admin.php
                require('../sportF/admin/Personne.php');
                require('connexion.php');
     
        $p=new Personne(null,"","","","","","","");
        
          if(isset($_POST['connexion']))
          {
                $p->email=$_POST['email'];
                $p->mots_passe=$_POST['mots_passe'];
                $p->verifier($pdo);
         
          }
       
        
     
        ?>
  
    <div class="drop drop-1"></div>
    <div class="drop drop-2"></div>
    <div class="drop drop-3"></div>
    <div class="drop drop-4"></div>
    <div class="drop drop-5"></div>
  </div>  

  