<?php

/* Imports */
require_once __DIR__ . "/class/Product.class.php";
require_once __DIR__ . "/class/Book.class.php";
require_once __DIR__ . "/class/VideoGame.class.php";


/* Traitement de la requête si le verbe HTTP est POST */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* Récupération des valeurs du body de la requête */
    $price = $_POST["price"];
    $vat_rate = $_POST["vat_rate"];
    $name = $_POST["name"];
    $stock = $_POST["stock"];
    $category = $_POST["category"];
    $description = $_POST["description"];

    /* Création de l'instance de Product */
    $new_product = new Product($price, $vat_rate, $name, $stock, $category, $description);
    $tomate = new Product(1, 5.5, "Tomate", 10, "Legume", "Lorem");
    $kinder_bueno = new Product(5, 20, "Kinder bueno", 10, "Bonbon", "Lorem");
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Atelier 8 : E-commerce partie 4</title>
</head>

<body>
    <form action="index.php" method="POST">
        <input type="number" name="price" placeholder="Prix HT" step="0.01" required />
        <input type="number" name="vat_rate" placeholder="Taux de TVA" step="0.1" required />
        <input type="text" name="name" placeholder="Nom" required />
        <input type="number" name="stock" placeholder="Stock" required />

        <select name="category">
            <option value="fruit">Fruit</option>
            <option value="vegetable">Legume</option>
            <option value="drink">Boisson</option>
        </select>

        <textarea name="description"></textarea>

        <input type="submit" value="valider" />

    </form>

    <?php if (isset($new_product)) { ?>
        <h2>Nouveau produit créé</h2>
        <p> Détails: </p>
    <?php
        $new_product->show();
        $tomate->show();
        $kinder_bueno->show();
    }

    /* Création d'un clone de produit */

    //$supertomate = Product::cloning($tomate, "Super Tomate");


    ?>

    <section id="cloningArea">
        <h2>Zone de clonage de produits :
        </h2>
    </section>

    <?php
    //$supertomate->show();

    /* Création d'un livre */
    ?>
    <h3>Nouveau livre :</h3>
    <?php
    $livre1 = new Book(10, "Vingt Mille Vieux Sous Les Mères", 10, "Livres", "Un livre vraiment trop bien !", "Vules Jerne", "poche");

    $livre1->show();
    ?>
    <h3>Nouveau jeu vidéo :</h3>
    <?php
    $jeu1 = new VideoGame(10, "Le jeu de la folyyyyyy", 50, "Jeu-vidéo", "Un jeu de ouf malade :o", "MMO-single move ultra zbire powaa", 18, 15);

    $jeu1->show();

    ?>
</body>

</html>