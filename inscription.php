

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=devices-width , initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="inscription.css">


  </head>

  <header>
  
    <label for="toggler" class="fas fa-bars"></label>
    <a href="acceuil.html" class="logo"><img style="width: 4.5cm; height: 4cm; margin-left: -1.5cm; margin-top: 0.5cm;" src="images/logo.png"></a>
    <nav class="navbar">
        <a href="acceuil.html">Acceuil</a>
        <a href="homme.php">Homme</a>
        <a href="femme.php">Femme</a>
        <a href="enfant.php">Enfant</a>
        <a href="accesoire.php">Matériel & Accessoire</a>
  
    </nav>
    <div class="icons">
        <a href="#review" class="fas fa-heart"></a>
        <a href="panier.html" class="fas fa-shopping-cart"></a>
        <a href="profil.php" class="fas fa-user"></a>
        <a class="fa fa-search" aria-hidden="true"></a>
    </div>
  </header> 
  
  <div class="container">
    <form action="inscr.php" method="POST" enctype="multipart/form-data">
      <h2>Créer votre compte</h2>
      <label>Nom</label>
      <input type="text" name="nom" required>
      <label>Prenom</label>
      <input type="text" name="prenom" required><br>
  
      <label>Email</label>
      <input type="email" name="email" required>
      <label>Mot de passe</label>
      <input type="password" name="mots_passe" required minlength="6"><br>
  
      <div class="sexe">
        <select name="sexe" id="sexe" class="form-control">
          <option value="" disabled selected>Sexe</option>
          <option value="homme">Homme</option>
          <option value="femme">Femme</option>
        </select>
      </div>
  
      <div class="image">
        <label>Image de profil</label>
        <input type="file" name="image">
      </div>
  
      <div class="role">
        <label>Rôle</label>
        <input type="radio" name="role" value="admin" required>Admin
        <input type="radio" name="role" value="client" required>Client
      </div>
  
      <input type="submit" name="enregistrer" value="S'inscrire">&nbsp&nbsp
      <input type="reset" value="Effacer">
    </form>
  </div>
  
 