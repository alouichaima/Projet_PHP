<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Spica Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="admin/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="admin/images/favicon.png" />
</head>
<form method="post" enctype="multipart/form-data">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter un utilisateur</h4>
                  <p class="card-description">
                    Horizontal form layout
                  </p>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nom</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Nom" name="nom">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Prenom</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Prenom" name="prenom">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="exampleInputMobile" placeholder="Email" name="email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Mots de passe</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name="mots_passe">
                      </div>
                    </div>

                    Sexe <input type="radio" name="sexe"value="homme">  H  <input type="radio" name="sexe" value="femme">  F<br><br>


                
                    <input type="submit" value="enregistrer" name="bt"><br><br>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
</form>
<?php
        require 'Personne.php';
        $p=new personne(null,"","","","","");
        if(isset($_POST['bt']))
        {
         $p->nom=$_POST["nom"];
        //$x=$_POST["nom"];
        $p->prenom=$_POST["prenom"];
        $p->email=$_POST["email"];
        $p->mots_passe=$_POST["mots_passe"];
        $p->sexe=$_POST["sexe"];
        
  
        
        
       
        
        $p->affiche();
        $p->insertion($pdo);
        }
        $res=$p->selection($pdo);
        ?>