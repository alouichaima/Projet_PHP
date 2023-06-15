<?php
session_start();
session_unset();
session_destroy();
header("location: login.php"); // Rediriger vers la page de connexion après la déconnexion
exit();
?>

