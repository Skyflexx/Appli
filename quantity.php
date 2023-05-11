<?php 

session_start(); // démarrage de la session

//////////////

foreach ($_POST as $key => $value) 
    {
        if ($value == "-" ){

            foreach ($_SESSION['products'] as $index => $product) 
            {
                if (isset($_POST[$index])){
                    
                    if ($_SESSION['products'][$index]["qtt"] != 1){
                    
                        $_SESSION['products'][$index]["qtt"] -= 1; // Multi dimensionnel array. A chaque strate on selectionne la clé pour accéder à notre variable !
                        $_SESSION['products'][$index]["total"]= ($_SESSION['products'][$index]["qtt"]) * ($_SESSION['products'][$index]["price"]);  
                    }        
                    
                    header("Location:recap.php");
                }
            }

        } else if($value == "+"){

            foreach ($_SESSION['products'] as $index => $product) 
            {
                if (isset($_POST[$index])){        

                    $_SESSION['products'][$index]["qtt"] += 1; // Multi dimensionnel array. A chaque strate on selectionne la clé pour accéder à notre variable !
                    $_SESSION['products'][$index]["total"]= ($_SESSION['products'][$index]["qtt"]) * ($_SESSION['products'][$index]["price"]);                                                    
                                        
                    header("Location:recap.php");       
                }
            }
        }
    }




?>