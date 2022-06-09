<?php

// ----------------------------------- IMPORTS -------------------------------------------

require_once __DIR__ . "/Product.class.php";


// ------------------ Création de la classe Book, fille de Product ------------------------

class VideoGame extends Product
{


    protected string $type;
    protected int $minAge;
    protected float $averageRating;


    /**
     * Constructeur
     */
    public function __construct(float $price, string $name, int $stock, string $category, string $description, string $type, int $minAge, float $averageRating)
    {
        // Appel du constructeur du parent
        parent::__construct($price, 20, $name, $stock, $category, $description);

        $this->type = $type;
        $this->minAge = $minAge;
        $this->averageRating = $averageRating;
    }


    // Méthode d'affichage spécifique aux livres
    public function ageCheck($age)
    {
        if ($age >= $this->minAge) {
            return "Vous avez l'âge minimum requis.";
        } else {
            return "Vous n'avez pas l'âge minimum requis.";
        }
    }



    /**
     * Affichage des données du produit : Surcharge de la méthode appartenant à la classe mère
     */
    public function show()
    { ?>
        <ul>

            <li>Titre du jeu vidéo : <?= $this->name; ?></li>
            <li>Type de jeu : <?= $this->type; ?> </li>
            <li>Age minimu requis pour ce jeu : <?= $this->minAge; ?> </li>
            <li>Categorie: <?= $this->category; ?></li>
            <li>Note moyenne des critiques : <?= $this->averageRating; ?></li>
            <li>Prix: <?= $this->getPrice(); ?> (<?= $this->vat_rate; ?> % de TVA) soit <?= $this->getPriceWithVAT(); ?></li>
            <li>Description: <?= $this->description ?></li>
            <li>Stock : <?= $this->stock ?> pièces</li>
            <li>Valorisation du stock: <?= $this->stockValue() ?> €</li>
        </ul>
<?php
    }
}
