<?php

function getAllHomme($pdo)
{
    $requette = "SELECT * FROM produithomme";
    $resultat = $pdo->query($requette);
    $produithomme = $resultat->fetchAll();
    return $produithomme;
}

function getAllCatalogue($pdo)
{
    $requette = "SELECT * FROM catalogue";
    $resultat = $pdo->query($requette);
    $catalogue = $resultat->fetchAll();
    return $catalogue;
}

// Usage example
$pdo = new PDO("mysql:host=localhost;dbname=sport", "root", "");
$data = getAllHomme($pdo);
$data1 = getAllCatalogue($pdo);


?>
 <?php 
 session_start() ;
?>




<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Le Sportif</title>
  
      <!-- font awesome cdn link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
      <!-- custom css file link  -->
      <link rel="stylesheet" href="acceuil.css">
  
  </head>
  <body>
  
  <!-- header section starts  -->
  
  <header>
  
      <input type="checkbox" name="" id="toggler">
      <label for="toggler" class="fas fa-bars"></label>
      <a href="acceuil.php" class="logo"><img style="width: 4.5cm; height: 4cm; margin-left: -1.5cm; margin-top: 0.5cm;" src="images/logo.png"></a>
      <nav class="navbar">
          <a href="acceuil.php">Acceuil</a>
          <a href="homme.php">Homme</a>
          <a href="femme.php">Femme</a>
          <a href="enfant.php">Enfant</a>
          <a href="accesoire.php">Matériel & Accessoire</a>
          <a href="profil.php"><i class="fas fa-user"></i>
                  Profil</a>
                  

                  
                

      </nav>
      <div class="icons">
      <a href="" class="fas fa-heart"></a>
          <a href="panier.php" class="fas fa-shopping-cart">    </a>
          <!-- <a href="login.php" class="fas fa-user"></a> -->
          <a href="login.php" class="fas fa-key" style="color: #51441f;"></a>
         
          <a class="fa fa-search" aria-hidden="true"></a>
      </div>
  </header>
  
  <!-- header section ends -->
  
  <!-- home section starts  -->
  
  <section class="home" id="home">
  
      <div class="content">
          <h3>Le Sportif</h3>
          <span> Magasins de sport. </span>
          <p>Le Sportif Tunisie - Boutique de sport : vente en ligne de vêtements et chaussures de sport. Tous les articles de sport qui répondent à vos besoins.</p>
          <a href="#contact" class="btn">Contact</a><br><br>
      </div>
      
  </section>

  <p style="margin-top: -2.4cm; margin-left: 3.5cm;">
    <a href="https://www.facebook.com/tuttosporttunisie/" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-twitter"></a>
    <a style="color: black;" href="https://www.instagram.com/le_sportif_tunis/?hl=fr" class="fa fa-instagram"></a>


  </p>
  
  <!-- home section ends -->
  
  <!-- about section starts  -->
  
  <section class="about" id="about">
    <br><br>
      <h1 class="heading"> <span> À  </span> Propos </h1>
      <div class="row">
          <div class="video-container">
              <video src="images/video.mp4" loop autoplay controls></video>
              <h3>Le Sportif</h3>
          </div>
  
          <div class="content">
              <h3>Qui sommes-nous ?</h3>
              <p>Le Sportif propose des vêtements et des équipements de sport pour tous. Athlétisme, Triathlon, Running, Cyclisme, Football, Hand, Basket, Volley, Rugby... Paiement sécurisé, livraison suivie.</p>
              <p>Nous proposons également la fabrication de vos médailles et trophées pour récompenser vos athlètes.</p>
          </div>
  
      </div>
  
  </section>
  
  <!-- about section ends -->
  
  <!-- icons section starts  -->
  
  <?php foreach ($data1 as $catalogue) {?>
    <section class="icons-container">

      <div class="icons">
      <img src="images/<?php echo $catalogue['image']; ?>">
          <div class="info">
              <h3><?php echo $catalogue['nom']; ?></h3>
              <span><?php echo $catalogue['description']; ?></span>
          </div>
      </div>
  
      </section>

      <?php } ?>
  
  <!-- icons section ends -->
  
  <!-- prodcuts section starts  -->
  <h1 class="heading"> Nos <span>produits</span> </h1>

  <?php foreach ($data as $produithomme) { ?>
    <section class="products" id="products">
        <div class="box-container">
            <div class="box">
                <div class="image">
                    <img src="images/<?php echo $produithomme['image']; ?>">
                    <div style="margin-left: 9cm;" class="icons">
                        <a href="ajouter_panier.php?id=<?=$row['id']?>">Ajouter au panier</a>
                    </div>
                </div>
                <div class="content">
                    <div class="price">
                    <h3>
                        <?php echo $produithomme['nom']; ?>
                    </h3>
                        <?php echo $produithomme['prix']; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

  
  <!-- prodcuts section ends -->
  
  <!-- review section starts  -->
  
  

  <!-- contact section starts  -->
  
  <section class="contact" id="contact">
  
      <h1 class="heading"> <span> contact </span> nous </h1>
  
      <div class="row">
  
          <form action="">
              <input type="text" placeholder="Nom" class="box">
              <input type="email" placeholder="Email" class="box">
              <input type="number" placeholder="Numéro" class="box">
              <textarea name="" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
              <input type="submit" value="envoyer message" class="btn">
          </form>
  
          <div class="image">
              <img src="images\m-l-b-boutique-homme-1.jpg" alt="">
          </div>
  
      </div>
  
  </section>
  
  <!-- contact section ends -->
  
  <!-- footer section starts  -->
  
  <section class="footer">
  
      <div class="box-container">
  
          <div class="box">
              <h3> À propos</h3>
              <a href="#">Acceuil</a>
              <a href="#">Marque</a>
              <a href="#">Homme</a>
              <a href="#">Femme</a>
              <a href="#">Enfant</a>
          </div>
  
          <div class="box">
              <h3>Mon profil</h3>
              <a href="#">Profil</a>
              <a href="#">Avis</a>
          </div>
  
          <div class="box">
              <h3>localisations</h3>
              <a href="#">Tunis</a>
              <a href="#">Manouba</a>
              <a href="#">Ariana</a>
              <a href="#">Jendouba</a>
          </div>
  
          <div class="box">
              <h3>contact info</h3>
              <a href="#">+216 71 458 245</a>
              <a href="#">Lesportif@gmail.com</a>
              <a href="#">Ariana 54200</a>
              <img src="images/payment.png" alt="">
          </div>
  
      </div>
  
      <div class="credit"> Créer par <span> Le Sportif </span> | all rights reserved </div>
  
  </section>
  
  <!-- footer section ends -->   
  </body>
  </html>