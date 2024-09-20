<?php
// ONE TO ONE
class Personne {
    private $id;
    private $nom;
    private $passeport; // Un objet Passeport

    // ... getters et setters ...

    public function setPasseport(Passeport $passeport): void {
        $this->passeport = $passeport;
        $passeport->setPersonne($this); // Lien bidirectionnel
    }
}

class Passeport {
    private $numero;
    private $dateExpiration;
    private $personne; // Un objet Personne

    // ... getters et setters ...

    public function setPersonne(Personne $personne): void {
        $this->personne = $personne;
    }
}

// ONe to many
class Auteur {
    private $id;
    private $nom;
    /** @var Livre[] */
    private $livres = [];

    // ... getters et setters ...

    public function addLivre(Livre $livre): void {
        $this->livres[] = $livre;
        $livre->setAuteur($this);
    }
}

class Livre {
    private $id;
    private $titre;
    private $auteur; // Un objet Auteur

    // ... getters et setters ...
}
// Many to many
class Etudiant {
    private $id;
    private $nom;
    /** @var Cours[] */
    private $cours = [];

    // ... getters et setters ...

    public function ajouterCours(Cours $cours): void {
        $this->cours[] = $cours;
        $cours->ajouterEtudiant($this);
    }
}

class Cours {
    private $id;
    private $nom;
    /** @var Etudiant[] */
    private $etudiants = [];

    // ... getters et setters ...

    public function ajouterEtudiant(Etudiant $etudiant): void {
        $this->etudiants[] = $etudiant;
    }
}
?>