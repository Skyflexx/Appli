<?php 

session_start(); // démarrage de la session

// foreach ($_POST as $key => $value){ // On parcourt le tableau $_POST qui contiendra les clés qui sont envoyées (dans notre cas le bouton supprimer)

//     if ($value == "Supprimer"){ // On s'occupe de la valeur, "Supprimer" correspond à la value du bouton tandis que la clé c'est l'index des produits.

//         foreach ($_SESSION['products'] as $index => $value){ // On parcourt notre tableau des produits et pour chaque index de produit, on va vérifier si il y a un Isset de l'index en question. Le name des boutons correspond à l'index des produits un peu comme un Id unique.

//             if (isset($_POST[$index])){
        
//                 unset($_SESSION['products'][$index]); 
        
//                 $_SESSION['nbProducts'] -= 1; // On retire 1 produit du nbProducts puisqu'on en supprime 1.

//                 var_dump($_POST);
        
//                 header("Location:recap.php"); // Redirection à la page récap.
//             }
//         }
//     }
// }

if (isset($_POST['deleteOne']) ){ // Si il y a la clé 'deleteOne' dans $_POST c'est qu'on a appuyé sur le bouton supprimer 1 produit.

  var_dump($_SESSION['products']); // Affiche tous les produits et leurs index respectifs.
  var_dump($_POST['productIndex']); // Contient l'ID du produit concerné. $_POST sera sous la forme 'productIndex' => 0, 1 ou 2... 

  unset($_SESSION['products'][$_POST['productIndex']]); // du tableau des produits, on supprime l'élément dont l'ID est $_POST['productIndex'] récupéré dans récap.

  $_SESSION['nbProducts'] -= 1; // On retire 1 produit du nbProducts puisqu'on en supprime 1.

  header("Location:recap.php"); 
  
  exit;

}

if (isset($_POST['deleteAll'])){

    unset($_SESSION['products']); 

    $_SESSION['nbProducts'] = 0; 

    header("Location:recap.php"); // Redirection à la page récap.    
}

?>