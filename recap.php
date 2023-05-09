<?php

    session_start(); // Avant toute chose on lance la session pour récup les données actuelles.

    // session start permet non seulement de démarrer une session mais aussi 
    // de récupérer les données d'une session en cours pour un utilisateur (un navigateur du coup) via l'ID unique

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recapitulatif des produits</title>
</head>
<body>

    <?php var_dump($_SESSION); 

    // !isset = la clé products n'existe pas càd que la personne n'a pas cliqué sur submit.
    // empty() la clé existe mais le tableau products ne contient aucune données

        if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {
            echo "<p> aucun produit en session...</p>";
        } else {

            // Si une clé existe et qu'il y a des produits qui ont été add, alors on peut afficher ce que l'utilisateur a ajouté :

            echo "<table>",
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                        "</tr>",
                    "</thead>",
                    "<tbody>";

            foreach($_SESSION['products'] as $index =>$product){
                echo "</tbody>", 
                    "</table>";
            }                            

        }
    
    ?>

    
</body>
</html>