<?php
session_start();
include '../../connexion.php';
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
    $sexe=$_POST['rad'];


    try{
        $query="UPDATE personne SET nom=:nom, prenom=:prenom,email=:email,sexe=:sexe WHERE  id=:user_id  LIMIT 1";
        $statment = $pdo -> prepare($query);
        $data=[
            ':nom'=>$nom,
            ':prenom'=>$prenom,
            ':email'=>$email,
            ':sexe'=>$sexe,
            ':user_id'=>$users_id    
    ];
    $query_execute= $statment->execute($data);
    if($query_execute)
    {
        $_SESSION['message']='Mise a jour avec succés';
        header('Location:user.php');
        exit(0);
    }
    else
    {
        $_SESSION['message']='Echec d ajout';
        header('Location:user.php');
        exit(0);

    }

    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}




?>