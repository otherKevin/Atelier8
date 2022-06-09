<?php

// ----------------------------------- IMPORTS -------------------------------------------

require_once __DIR__ . "/Product.class.php";


// ------------------ Création de la classe Book, fille de Product ------------------------

class Book extends Product
{


    protected string $auteur;
    protected string $format;


    /**
     * Constructeur
     */
    public function __construct(float $price, string $name, int $stock, string $category, string $description, string $auteur, string $format)
    {
        // Appel du constructeur du parent
        parent::__construct($price, 5.5, $name, $stock, $category, $description);

        $this->auteur = $auteur;
        $this->format = $format;
    }



    // Méthode d'affichage spécifique aux livres
    public function bookDisplay()
    {
?>
        <h2>Informations sur le livre : <?php $this->name ?> </h2>
        <p>Auteur : <?php $this->auteur ?> </p>
        <p>Description : <?php $this->description ?> </p>

    <?php }



    /**
     * Affichage des données du produit : Surcharge de la méthode appartenant à la classe mère
     */
    public function show()
    { ?>
        <ul>

            <li>Titre du livre : <?= $this->name; ?></li>
            <li>Format : <?= $this->format; ?> </li>
            <li>Auteur : <?= $this->auteur; ?> </li>
            <li>Categorie: <?= $this->category; ?></li>
            <li>Prix: <?= $this->getPrice(); ?> (<?= $this->vat_rate; ?> % de TVA) soit <?= $this->getPriceWithVAT(); ?></li>
            <li>Description: <?= $this->description ?></li>
            <li>Stock : <?= $this->stock ?> pièces</li>
            <li>Valorisation du stock: <?= $this->stockValue() ?> €</li>
        </ul>
<?php
    }
}
