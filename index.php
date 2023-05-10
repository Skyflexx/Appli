<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Ajout Produit</title>  
</head>

<body>

<header>
    <h1>SHOP</h1>
</header>

<section>

    <nav> 
        <p id="menu"> Menu </p>

        <form action ="traitement.php" method="post">
            <p>
                <input class ="btn_submit" type="submit" name="recap" value="Voir le récapitulatif">
            </p>
        </form>
    </nav>

    <div class="container">
    
        <form action ="traitement.php" method="post">
            <p>
                <label>
                    Nom du produit :
                    <input type="text" name="name">
                </label>
            </p>
            <p>
                <label>
                    Prix du produit :
                    <input type="number" step="any" name="price">
                </label>
            </p>
            <p>
                <label>
                    Quantité désirée :
                    <input type="number" name="qtt" value="1">
                </label>
            </p>
            <p>
                <input class ="btn_submit" type="submit" name="submit" value="Ajouter le produit">
            </p>       
        </form>
    </div>
</section>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>    
</body>
</html>