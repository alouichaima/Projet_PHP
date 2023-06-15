<!DOCTYPE html>
<html lang="en">

<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Insertion</title>
</head>

<body>
    <div class="Container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                    <h3>Ajouter
                        <a href="user.php" class="btn btn-danger float-end">Retour</a>


                    </h3>


                    </div>
                    <div class='card-body'>
                        <form action="code.php" method="POST">
                            <div class="mb-3">
                                <label>Nom</label>
                                <input type="text" class='form-control' name='nom'>
                            </div>
                            <div class="mb-3">
                                <label>Prenom</label>
                                <input type="text" class='form-control' name='prenom'>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" class='form-control' name='email'>
                            </div>
                            <div class="mb-3">
                                <label>Mots passe</label>
                                <input type="password" class='form-control' name='mots_passe'>
                            </div>
                            <div class="mb-3">
                                <label>Sexe</label>
                                <input type="radio" name="sexe"value="homme">  H  <input type="radio" name="sexe" value="femme">  F                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary" name='enregistrer' type='submit'> Enregistrer</button>

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