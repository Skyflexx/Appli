<?php 

session_start(); // démarrage de la session

if (isset($_POST['deleteAll'])){

    unset($_SESSION['products']); 

    $_SESSION['nbProducts'] = 0; 

    header("Location:recap.php"); // Redirection à la page récap.

    exit;
}

foreach ($_SESSION['products'] as $index => $value){ 

    if (isset($_POST[$index])){

        unset($_SESSION['products'][$index]); 

        $_SESSION['nbProducts'] -= 1; // On retire 1 produit du nbProducts puisqu'on en supprime 1.

        header("Location:recap.php"); // Redirection à la page récap.
    }
}


?>