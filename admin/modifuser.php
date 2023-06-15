<?php
include '../connexion.php';
require './Personne.php';
include('includes/header.php'); 
include('includes/navbar.php'); 
$p=new personne(null,"","","","");
?>
<!DOCTYPE html>
<html lang="en">

<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Modifier</title>
</head>

<body>
    <div class="Container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                    <h3>Modifier utilisateur
                        <a href="user.php" class="btn btn-danger float-end">Retour</a>


                    </h3>


                    </div>
                    <div class='card-body'>

                    <?php
                    if(isset($_GET['id']))
                    {
                        $users_id=$_GET['id'];

                        $query='SELECT * FROM personne WHERE id=:user_id LIMIT 1';
                        $statment= $pdo->prepare($query);
                        $data=[':user_id' => $users_id];
                        $statment ->execute($data);
                       $result = $statment->fetch(PDO::FETCH_OBJ);

                    }

                    ?>
                        <form action="code.php" method="POST" enctype="multipart/form-data">

                            <input type='hidden' name='users_id'  value="<?= $result -> id; ?>">
                            <div class="mb-3">
                                <label>Nom</label>
                                <input type="text"  class="form-control" name="nom"  value="<?= $result -> nom; ?>" />
                            </div>
                            <div class="mb-3">
                                <label>Prenom</label>
                                <input type="text" class='form-control' name='prenom' value='<?= $result -> prenom ; ?>'>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" class='form-control' name='email' value="<?= $result -> email; ?>">
                            </div>

                        <div class="mb-3">
                           <label>Rôle</label>
                             <select name="role" class="form-select">
                            <option value="admin" <?php if($result->role=="admin"){echo 'selected';}?> >Admin</option>
                            <option value="user" <?php if($result->role=="user"){echo 'selected';}?> >Utilisateur</option>
                           </select>
                          </div>

                       <div class="mb-3">
                           <!-- <input type="file" class='form-control' name='image' >
                           Image: <img src="../images/<?php echo $result->image ?>"  width="50" height="50"> -->
                           Image: <img src="../images/<?php echo $result->image ?>"  width="200" 
height="200">
        <input type="file" name="image"><br><br>
                      </div>
                            
                            
                        
                            <div class="mb-3">
                            <!-- <input type="radio" name="sexe" value="Homme" <?php if($result->sexe=="Homme"){echo 'checked';}?> > Homme
                            <input type="radio" name="sexe" value="Femme" <?php if($result->sexe=="Femme"){echo 'checked';}?> > Femme -->

                            <input type="radio" name="sexe" value="Homme" <?php if($result->sexe=="Homme"){echo 'checked';}?> id="homme_radio"> Homme
                           <input type="radio" name="sexe" value="Femme" <?php if($result->sexe=="Femme"){echo 'checked';}?> id="femme_radio"> Femme


                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary" name='mettre_jour_btn' type='submit'> Metrre a jour</button>

                        </div>
                           
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>