<?php
session_start();
include '../connexion.php';
//supprimer
if (isset($_POST['suppr_user']))
{
    $users_id=$_POST['suppr_user'];

    try
    {

        $query="DELETE FROM personne WHERE id=:user_id";
        $statment=$pdo->prepare($query);
        $data=[':user_id'=>$users_id];
        $query_execute=$statment->execute($data);

        if($query_execute)
        {

            $_SESSION['message']='Supression avec succés';
            header('Location:user.php');
            exit(0);
        }
        else
        {
            $_SESSION['message']='Echec de suprission';
            header('Location:user.php');
            exit(0);

        }

    }
    catch(PDOException $e)
    {
        echo $e->getMessage();

    }
}


//mise a jour
if(isset($_POST['mettre_jour_btn']))
{
    $users_id=$_POST['users_id'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    // $sexe=$_POST['sexe'];
    if(isset($_POST['sexe'])) {
    $sexe = $_POST['sexe'];
} else {
    $sexe = $result->sexe; // récupère la valeur du sexe à partir de la base de données
}

    $role=$_POST['role'];
    $image=$_POST['image'];

    try{
        $query="UPDATE personne SET nom=:nom, prenom=:prenom,email=:email,sexe=:sexe , role=:role , image=:image WHERE id=:user_id LIMIT 1";
        $statment = $pdo->prepare($query);
        $data=[
            ':nom'=>$nom,
            ':prenom'=>$prenom,
            ':email'=>$email,
            ':sexe'=>$sexe,
            ':user_id'=>$users_id, 
            ':role'=>$role, 
            ':image'=>$image
       
              
        ];
        if (!empty($_FILES['image']['tmp_name'])) {
            // A file has been uploaded
            $image_path = '../images'  . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
        
            // Update the image path in the database
            $query = "UPDATE personne SET image=:image WHERE id=:user_id LIMIT 1";
            $statement = $pdo->prepare($query);
            $statement->execute([
                ':image' => $image_path,
                ':user_id' => $users_id
            ]);
        } else {
            // No file has been uploaded
            $image_path = null;
        }
        
        $query_execute= $statment->execute($data);
        if($query_execute)
        {
            $_SESSION['message']='Mise à jour avec succès';
            header('Location:user.php');
            exit(0);
        }
        else
        {
            $_SESSION['message']='Échec de la mise à jour';
            header('Location:user.php');
            exit(0);
        }
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}


// if (isset($_POST['enregistrer']))
// {
//     $nom=$_POST['nom'];
//     $prenom=$_POST['prenom'];
//     $email=$_POST['email'];
//     $mots_passe=$_POST['mots_passe'];
//     $sexe=$_POST['sexe'];
//     $query="INSERT INTO  personne(nom,prenom,email,mots_passe,sexe) VALUES (:nom,:prenom,:email,:mots_passe,:sexe)";
//     $query_run= $pdo->prepare($query);
//     $data = [
//         ':nom'=> $nom,
//         ':prenom'=> $prenom,
//         ':email'=> $email,
//         ':mots_passe'=> $mots_passe,
//         ':sexe'=> $sexe,

//     ];
//     $query_execute=$query_run ->execute($data);
//     if ($query_execute)
//     {
//         $_SESSION['message']="ajout avec succes";
//         header('Location:user.php');
//         exit(0);
//     }
//     else
//     {
//         $_SESSION['message']="Erreur d'ajout";
//         header('Location:user.php');
//         exit(0);
//     }


// }

if(isset($_POST['enregistrer'])){
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mots_passe = $_POST['mots_passe'];
    $sexe = $_POST['sexe'];
    $role = 'client'; // Valeur par défaut pour le rôle
    
    // Vérifier si l'utilisateur a sélectionné un rôle
    if(isset($_POST['role'])){
        $role = $_POST['role'];
    }
    
    // Vérifier si l'utilisateur a téléchargé une image
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        // Déplacer l'image téléchargée dans le dossier des images
        $image_path = '../images' . $_FILES['image']['name'];
        $image_path = $_FILES['image']['name'];

        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
    }else{
        $image_path = null;
    }
    

    // Préparer la requête SQL
    $sql = "INSERT INTO personne (nom, prenom, email, mots_passe, sexe, role, image) VALUES (:nom, :prenom, :email, :mots_passe, :sexe, :role, :image)";
    
    $query_run= $pdo->prepare($sql);
    $data = [
        ':nom'=> $nom,
        ':prenom'=> $prenom,
        ':email'=> $email,
        ':mots_passe'=> $mots_passe,
        ':sexe'=> $sexe,
        ':role'=> $role,
        ':image'=> $image_path,
    ];
    
    $query_execute=$query_run->execute($data);

    if ($query_execute)
    {
        $_SESSION['message']="ajout avec succes";
        header('Location:user.php');
        exit(0);
    }
    else
    {
        $_SESSION['message']="Erreur d'ajout";
        header('Location:user.php');
        exit(0);
    }
    
}

?>




