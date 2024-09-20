<?php
class Voiture {
    public $marque;
    public $modele;
    public $couleur;

    public function demarrer() {
        echo "La".$this->modle." voiture démarre.";
    }
}

// Création d'un objet Voiture
$maVoiture = new Voiture();
$maVoiture->marque = "Renault";
$maVoiture->modele = "Clio";
$maVoiture->couleur = "Bleu";

$maVoiture->demarrer();
?>