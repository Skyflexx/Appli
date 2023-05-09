<?php 

// Mise en place de la page Traitement.php. Pour éviter qu'on ne puisse accéder à cette page et à y injecter des données, on va y ajouter une redirection. (voir header)

// 1 Démarrage d'une session : 
// Démarre une session sur le navigateur permettant de stocker les données de navigations pour les réutiliser durant la session. Initialise un Id unique stocké dans un cookie qui par défaut
// est supprimé à la fermeture du nav.

session_start(); 

// 2 - Vérification de l'existence d'une requête POST (GET par défaut)

// isset de façon générale determine si une var déclarée est DIFFERENTE de null. Ressort false si null. True si les parametres sont définis.

// Dans ce cas, isset($_POST['submit']) permet de vérifier si il y a eu un input ayant pour nom 'submit' (si le bouton a été appuyé). Si tel est le cas alors 
// des données seront stockées dans $_POST['submit']. 'submit' étant le nom du bouton, il est stocké sous forme de clé pour en récupérer les données plus facilement.

if(isset($_POST['submit'])){ 

    // IMPORTANT :

    // var_dump($_POST);
    // die('hello');

    // Die permet de stopper tout le scrip. là on affiche hello avant la fin du script. Ca permet de tester l'avancée du script si tout est ok en faisant un var dump.

    // /IMPORTANT

    //$_POST est un array associatif donc on vérifie la présence de la clé "submit". 
    // Cette clé c'est "name" du bouton Ajouter le produit.
    // La condition sera vraie si la requête POST transmet une clé Submit au serveur.

    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

    // Donc si il y a un input de la part de l'utilisateur, on va vérifier les entrées.
    // LIMITE LES FAILLES XSS ET INJECTION SQL

    // Les var $name etc ressortent nettoyées (théoriquement) Il faut vérifier si la filtration s'est bien déroulée.

    if($name && $price && $qtt){

        // Les filtres renvoient True si OK. Sinon ça renvoie false ou null. Donc pas besoin de comparer à quoi que ce soit.
        // Si tout est ok on peut passer au stockage des données en session dans un array

        // $product = [
        //     "name" => $name, "price"=> $price, "qtt" => $qtt, "total" => $price*$qtt
        // ];

        // Affichage en row de l'array product qui contient donc toutes nos données.

        $product = [
            "name" => $name, 
            "price"=> $price, 
            "qtt" => $qtt, 
            "total" => $price*$qtt
        ];

        // Ensuite on enregistre ces données dans $_SESSION qui est un tableau qui contient toutes les données de la Session et stockées côté serveur.
        $_SESSION['products'][] = $product; // On push l'array $_SESSION ayant pour clé 'products' et on met notre array product dedans.
    }

}

header("Location:index.php");

exit;

// Spécifie l'entête HTTP sous forme brute lors de l'envoi des fichiers HTML.
// Utiliser cette fct avant toute écriture de code sous peine de perturber la réponse à émettre au client.
?>