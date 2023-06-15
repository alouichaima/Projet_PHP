<?php

function getAllEnfant($pdo)
{
    $requette = "SELECT * FROM produitenfant";
    $resultat = $pdo->query($requette);
    $produitenfant = $resultat->fetchAll();
    return $produitenfant;
}

// Usage example
$pdo = new PDO("mysql:host=localhost;dbname=sport", "root", "");
$data = getAllEnfant($pdo);

?>

<head>
    <link rel="stylesheet" href="accesoire.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<header>

    <label for="toggler" class="fas fa-bars"></label>
    <a href="acceuil.html" class="logo"><img style="width: 4.5cm; height: 4cm; margin-left: -1.5cm; margin-top: 0.5cm;"
            src="images/logo.png"></a>
    <nav class="navbar">
        <a href="acceuil.html">Acceuil</a>
        <a href="homme.php">Homme</a>
        <a href="femme.php">Femme</a>
        <a href="enfant.php">Enfant</a>
        <a href="accesoire.php">Matériel & Accessoire</a>

    </nav>

</header>

<div class="about-section">
    <h3>LE SPORTIF vous propose une large gamme d'équipements sportifs. </h3>
</div><br><br><br><br><br><br><br>


<section class="products" id="products">
    <div class="box-container">
        <?php foreach ($data as $produitenfant) { ?>
            <div class="box">
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                </div>
                <img src="images/<?php echo $produitenfant['image']; ?>" alt="<?php echo $produitenfant['nom']; ?>">
                <div class="content">
                    <h3>
                        <?php echo $produitenfant['nom']; ?>
                    </h3>
                    <div class="price">
                        <p>
                            <?php echo $produitenfant['prix']; ?>
                        </p>
                        <a style="color:black; background-color:rgb(214, 175, 127); ;" href="panier.html"
                            class="btn">Acheter</a>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
</body>

</html>