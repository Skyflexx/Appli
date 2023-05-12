<?php 

session_start(); // démarrage de la session

//////////////

// foreach ($_POST as $valueOfBtn) // On parcourt le tableau $_POST qui contient les données envoyées en cliquant. C'est $value qui nous intéresse car c'est la value de notre bouton (+ ou -)
//     {
//         if ($valueOfBtn == "-" ){

//             foreach ($_SESSION['products'] as $index => $product) // Si une telle value est présente dans le post (- dans ce cas), alors on parcourt le tableau des products pour en modifier le produit numéroté $index (voir recap le name du btn)
//             {
//                 if (isset($_POST[$index])){
                    
//                     if ($_SESSION['products'][$index]["qtt"] != 1){ // L'index correspond aux clés du tableau des produits. On s'en sert comme ID unique. Et dans l'affichage du tableau on notera que le nom du bouton prend le nom de l'index.
                    
//                         $_SESSION['products'][$index]["qtt"] -= 1; // Multi dimensionnel array. A chaque strate on selectionne la clé pour accéder à notre variable !
//                         $_SESSION['products'][$index]["total"]= ($_SESSION['products'][$index]["qtt"]) * ($_SESSION['products'][$index]["price"]); // Sans oublier de modifier le total du prix en fct de la qtt 
//                     }   
                                     
//                     header("Location:recap.php");
//                 }
//             }

//         } else if($valueOfBtn == "+"){

//             foreach ($_SESSION['products'] as $index => $product) 
//             {
//                 if (isset($_POST[$index])){        

//                     $_SESSION['products'][$index]["qtt"] += 1; // Multi dimensionnel array. A chaque strate on selectionne la clé pour accéder à notre variable !
//                     $_SESSION['products'][$index]["total"]= ($_SESSION['products'][$index]["qtt"]) * ($_SESSION['products'][$index]["price"]); // Sans oublier de modifier le total du prix en fct de la qtt                                                   
                                        
//                     header("Location:recap.php");       
//                 }
//             }
//         }
//     }

// clic -> puis SHIFT clic => crée une sélection entre les 2 endroits
// F2 = renommer = renommer un fichier, une balise HTML (avec sa balise fermante)
// CTRL + F = Find = trouver un élément et surligner toutes les occurrences de cet enchaînement de caractères
// CTRL + D = placer un curseur supplémentaire à l'endroit de l'occurrence de cet enchaînement de caractères suivante
// ALT + W = Word-only = CTRL+F et CTRL+D ne prendront en compte que les mots entiers
// ALT + C = Case-sensitive = CTRL+F et CTRL+D ne prendront en compte que les occurrences correspondants à la casse de la sélection
// SHIFT + ALT + Flèche H/B = dupliquer une ou plusieurs lignes (la sélection) vers le haut ou le bas
// CTRL + SHIFT + K = supprimer sélection (lignes entières)

if (isset($_POST['addOne'])){

    
    $_SESSION['products'][$_POST['productIndex']]["qtt"] += 1; // Multi dimensionnel array. A chaque strate on selectionne la clé pour accéder à notre variable !
    $_SESSION['products'][$_POST['productIndex']]["total"]= ($_SESSION['products'][$_POST['productIndex']]["qtt"]) * ($_SESSION['products'][$_POST['productIndex']]["price"]); // Sans oublier de modifier le total du prix en fct de la qtt                                                   
    
    header("Location:recap.php");    
}

if (isset($_POST['removeOne'])){

    
    if ($_SESSION['products'][$_POST['productIndex']]["qtt"] != 1){ // L'index correspond aux clés du tableau des produits. On s'en sert comme ID unique. Et dans l'affichage du tableau on notera que le nom du bouton prend le nom de l'index.
                    
        $_SESSION['products'][$_POST['productIndex']]["qtt"] -= 1; // Multi dimensionnel array. A chaque strate on selectionne la clé pour accéder à notre variable !
        $_SESSION['products'][$_POST['productIndex']]["total"]= ($_SESSION['products'][$_POST['productIndex']]["qtt"]) * ($_SESSION['products'][$_POST['productIndex']]["price"]); // Sans oublier de modifier le total du prix en fct de la qtt 
    }   
                     
    header("Location:recap.php");
}

?>