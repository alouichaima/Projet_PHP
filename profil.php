<?php
session_start();

function getAllPersonne($pdo)
{
    $requette = "SELECT * FROM Personne";
    $resultat = $pdo->query($requette);
    $personne = $resultat->fetchAll();
    return $personne;
}

$pdo = new PDO("mysql:host=localhost;dbname=sport", "root", "");
$data = getAllPersonne($pdo);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mon profil</title>
    <link rel="stylesheet" type="text/css" href="profil.css">
</head>
<body>
    <div style="margin-left: 10cm; "class="container">
        <h3 style="margin-left: 5cm;" >Bienvenue dans votre profil</h3>
        <?php foreach ($data as $personne) { ?>
        <div class="row">
            <div class="col-md-4">
                <img style="width: 8cm;margin-left: 5cm;" src="images/<?php echo $personne['image']; ?>" class="img-fluid rounded-circle">
            </div>
            <div class="col-md-8">
                <table style="width: 20cm;" class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td><strong>Nom</strong></td>
                            <td class="text-primary"><?php echo $personne['nom']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>prenom</strong></td>
                            <td class="text-primary"><?php echo $personne['prenom']; ?></td>
                        </tr>

                        <tr>
                            <td><strong>Email</strong></td>
                            <td class="text-primary"><?php echo $personne['email']; ?></td>
                        </tr>
                       
                    </tbody>
                </table>
                <form action="logout.php" method="post">
                    <input type="submit" value="Déconnexion">
                </form>
            </div>
        </div>
        <?php } ?>


        
    </div>
</body>
</html>
