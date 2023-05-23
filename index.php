<?php

    // Définitions : 

    /*
    
    Requête HTTP : Requête envoyée sour forme d'URL au serveur. En précisant la méthode (get ou post). Dans le cas de Get, on demande au serveur de nous donner quelque
    chose. Si c'est ok le fichier nous est envoyé puis interpreté par le navigateur, pour finir par l'affichage sur l'écran. Dans le cas de PHP le fichier est interpreté côté 
    serveur.

    Requête HTTPS : Extension sécurité de HTTP. Via un protocole SSL (Secure sockets Layer). Actuellement on utilise TSL au lieu de SSL. (Transport Layer Security)

    Le client et le serveur communiquent entre eux, procèdent à des vérifications afin de vérifier si une discussion sécurisée peut avoir lieu. Si tel est le cas ils vont échanger
    des données de façon cryptée. Le décryptage se faisant grace à une clé. 

    Superglobales : Variables globales natives à Php et accessibles partout dans le script. Sous la forme de tableaux associatifs, elles permettent un stockage de données diverses.

    Session : Moyen de stocker des infos lors d'une session utilisateur à l'aide d'un identifiant unique. Ainsi les informations peuvent persister si on change de page
    par exemple.

    XSS (Cross-site scripting) : Faille côté navigateur qui permet d'injecter du code dans un input (du code lisible par le nav, html css js). Pouvant récupérer par ce biais des infos côté client donc depuis les cookies.
        
    */ 

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