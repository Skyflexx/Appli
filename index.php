<?php

    session_start(); // Avant toute chose on lance la session pour récup les données actuelles.
    

    // session start permet non seulement de démarrer une session mais aussi 
    // de récupérer les données d'une session en cours pour un utilisateur (un navigateur du coup) via l'ID unique

    if(!isset($_SESSION['checkSuccess'])|| empty(['checkSuccess'])){

        $_SESSION['checkSuccess'] = "Veuillez ajouter un produit";

    }
    
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
    <title>Ajout Produit</title>  
</head>

<body>

<header>
    <h1>Shop</h1>
</header>

<section>
    <nav> 
        <p id="menu"> Menu </p>

        <form action ="traitement.php" method="post">
            <ul>
                <li>
                    <input class ="btn_submit" type="submit" name="recap" value="Voir le récapitulatif">
                </li>
            </ul>   
        </form>
    </nav>

    <div class="container">
    
        <form action ="traitement.php" method="post">

            <?php                   
                if(!isset($_SESSION['nbProducts']) || empty($_SESSION['nbProducts'])) {
                echo "<p> Nombre de produits : 0 </p>";
                
                } else {
                    $nbProducts = $_SESSION['nbProducts'];
                    echo "<p>nombre de produits : ".$nbProducts."</p>";        
                }
            ?>
        
            <p>
                <label>
                    Nom du produit :
                    <input type="text" name="name">
                </label>
            </p>
            <p>
                <label>
                    Prix du produit :
                    <input type="number" step="any" name="price" min="0">
                </label>
            </p>
            <p>
                <label>
                    Quantité désirée :
                    <input type="number" name="qtt" value="1" min="1">
                </label>
            </p>
            
            <input class ="btn_submit" type="submit" name="submit" value="Ajouter le produit">             
            
           <?php   
                echo "<p>".$_SESSION['checkSuccess']."<p>"; 
                    //  if(isset($_SESSION['nbProducts']) || !empty($_SESSION['nbProducts'])) { // Si il y a une clé product dans Isset ou si le tableau product n'est pas vide, alors on peut utiliser $_session checksuccess.
                        
                    //     echo "<p>".$_SESSION['checkSuccess']."<p>"; 

                    //  } else echo "Veuillez ajouter un produit !"
            ?>

        </form>
    </div>
</section>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>    
</body>
</html>