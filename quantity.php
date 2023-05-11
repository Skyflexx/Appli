<?php 

session_start(); // démarrage de la session

//////////////

foreach ($_POST as $valueOfBtn) // On parcourt le tableau $_POST qui contient les données envoyées en cliquant. C'est $value qui nous intéresse car c'est la value de notre bouton (+ ou -)
    {
        if ($valueOfBtn == "-" ){

            foreach ($_SESSION['products'] as $index => $product) // Si une telle value est présente dans le post (- dans ce cas), alors on parcourt le tableau des products pour en modifier le produit numéroté $index (voir recap le name du btn)
            {
                if (isset($_POST[$index])){
                    
                    if ($_SESSION['products'][$index]["qtt"] != 1){ // L'index correspond aux clés du tableau des produits. On s'en sert comme ID unique. Et dans l'affichage du tableau on notera que le nom du bouton prend le nom de l'index.
                    
                        $_SESSION['products'][$index]["qtt"] -= 1; // Multi dimensionnel array. A chaque strate on selectionne la clé pour accéder à notre variable !
                        $_SESSION['products'][$index]["total"]= ($_SESSION['products'][$index]["qtt"]) * ($_SESSION['products'][$index]["price"]); // Sans oublier de modifier le total du prix en fct de la qtt 
                    }        
                    
                    header("Location:recap.php");
                }
            }

        } else if($valueOfBtn == "+"){

            foreach ($_SESSION['products'] as $index => $product) 
            {
                if (isset($_POST[$index])){        

                    $_SESSION['products'][$index]["qtt"] += 1; // Multi dimensionnel array. A chaque strate on selectionne la clé pour accéder à notre variable !
                    $_SESSION['products'][$index]["total"]= ($_SESSION['products'][$index]["qtt"]) * ($_SESSION['products'][$index]["price"]); // Sans oublier de modifier le total du prix en fct de la qtt                                                   
                                        
                    header("Location:recap.php");       
                }
            }
        }
    }
?>