<?php
session_start();
include './connexion.php';

if (isset($_POST['enregistrer'])) {
  // Get the form data
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $mots_passe = $_POST['mots_passe'];
  $sexe = $_POST['sexe'];
  $role = $_POST['role'];

  // Handle file upload
  $image = $_FILES['image']['name'];
  $target = "./images/" .($image);
  move_uploaded_file($_FILES['image']['tmp_name'], $target);

  // Insert the data into the database
  $query = "INSERT INTO personne (nom, prenom, email, mots_passe, sexe, role, image) VALUES (:nom, :prenom, :email, :mots_passe, :sexe, :role, :image)";
  $query_run = $pdo->prepare($query);
  $data = [
    ':nom' => $nom,
    ':prenom' => $prenom,
    ':email' => $email,
    ':mots_passe' => $mots_passe,
    ':sexe' => $sexe,
    ':role' => $role,
    ':image' => $image
  ];
  $query_execute = $query_run->execute($data);
  if ($query_execute) {
    $_SESSION['message'] = "Inscription réussie";
    header('Location: login.php');
    exit(0);
  } else {
    $_SESSION['message'] = "Erreur d'inscription";
    header('Location: inscription.php');
    exit(0);
  }
}
?>
