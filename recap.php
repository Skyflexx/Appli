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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Récapitulatif</title>  
</head>
<body>

<header>
    <h1>SHOP</h1>
</header>

    <section>

        <nav> 
            <p id="menu"> Menu </p>        
            <form action ="traitement.php" method="post">
                <ul>
                    <li><input class ="btn_submit" type="submit" name="return" value="Accueil"></li>  
                </ul>                                
            </form>          
        </nav>

        <div class="container">

        <?php 

        // !isset  vérifie si dans le tableau associatif $_SESSION, il y a des données enregistrées (en occurence 'products' qu'on a créé dans traitement et qu'on a push)
        // empty() 'products' est bien présent mais il n'y a aucune valeur à l'intérieur.

            if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                echo "<p> aucun produit en session...</p>";
            } else {

                // Si une clé existe et qu'il y a des produits qui ont été add, alors on peut afficher ce que l'utilisateur a ajouté :            

                echo "<table class='table table-striped'>",
                                "<thead>", // Thead c'est la ligne entête du tableau.
                                    "<tr>",
                                        "<th>#</th>",
                                        "<th>Nom</th>",
                                        "<th>Prix</th>",
                                        "<th>Quantité</th>",
                                        "<th>Total</th>",
                                    "</tr>",
                                "</thead>",
                                "<tbody>";

                        $totalGeneral = 0; // initialisation du total qu'on calcule au fur et à mesure du foreach.

                foreach($_SESSION['products'] as $index => $product){

                    // On parcourt ici le tableau products et on ressort $index et $product pour en manipuler facilement les données.
                    
                        echo "<tr>",
                            "<td>".$index."</td>", // On ressort l'index qui est la clé du produit (0, 1, 2 ...)
                            "<td>".$product['name']."</td>", // name étant la clé qui permet de sortir le nom du produit. Ca aurait pu être 0, 1 ou 2 mais c'est plus facile de rename la clé.
                            "<td>".number_format($product['price'], 2, ",")."&nbsp;€</td>",
                            "<td>"."<form class ='qtt' action ='quantity.php' method='post'><input class ='btn btn-warning' type='submit' name='lessQtt' value='-'></form>&nbsp;".$product['qtt']."&nbsp;<form class ='qtt' action ='quantity.php' method='post'><input class ='btn btn-warning' type='submit' name='plusQtt' value='+'></form></td>",
                            "<td>".$product['total']."</td>",
                            "<td><form action ='delete.php' method='post'><input class ='btn btn-danger' type='submit' name='$index' value='Supprimer'></form></td>",
                        "</tr>";

                        $totalGeneral += $product['total'];

                    // tr pour nouvelle ligne (table Row). On affichera à chaque fois le $product[item]. product étant un tableau qu'on a initialisé à chaque input contenant un name, un price, une qtt et un total.
                    // number_format permet de formatter un nombre.
                    // number_format(float $nombre (ici le price), int decimale (2chiffre après virgule ici), le séparateur sous forme de string "," ou "." mais aussi "<br>" par ex)
                }                 

                // Fermeture du tableau
                            
                echo "<tr>",
                            "<td colspan='4'>Total Général : </td>",
                            "<td><strong>".number_format($totalGeneral, 2, ",")."&nbsp;€</strong></td>",
                            "</tr>",
                        "</tbody>", 
                    "</table>";                  

                //colspan = '4' permet de fusionner 4 cellules dont le contenu sera "Total général:". Voir resultat car j'ai créé une border pour voir la diff.           

            }  
         

            if(!isset($_SESSION['nbProducts']) || empty($_SESSION['nbProducts'])) {
                echo "<p> Nombre de produits : 0 </p>";
            } else {

            $nbProducts = $_SESSION['nbProducts'];
                echo "Nombre de produits : ".$nbProducts.
                "<form action ='delete.php' method='post'><input class ='btn btn-danger' type='submit' name='deleteAll' value='Tout supprimer'></form>";        
            }
        
        ?>

        

    </div>  

    </section>

    
</body>
</html>