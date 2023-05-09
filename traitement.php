<?php 

// Mise en place de la page Traitement.php. Pour éviter qu'on ne puisse accéder à cette page et à y injecter des données, on va y ajouter une redirection. (voir header)

// 1 Démarrage d'une session : 
// Démarre une session sur le navigateur permettant de stocker les données de navigations pour les réutiliser durant la session. Initialise un Id unique stocké dans un cookie qui par défaut
// est supprimé à la fermeture du nav.

session_start(); 

// 2 - Vérification de l'existence d'une requête POST

if(isset($_POST['submit'])){

    //$_POST est un array donc on vérifie la présence de la clé "submit". 
    // Cette clé c'est "name" du bouton Ajouter le produit.
    // La condition sera vraie si la requête POST transmet une clé Submit au serveur.

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

    // Donc si il y a un input de la part de l'utilisateur, on va vérifier les entrées.
    // LIMITE LES FAILLES XSS ET INJECTION SQL
}

header("Location:index.php");

exit;

// Spécifie l'entête HTTP sous forme brute lors de l'envoi des fichiers HTML.
// Utiliser cette fct avant toute écriture de code sous peine de perturber la réponse à émettre au client.
?>