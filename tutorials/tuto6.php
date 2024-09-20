<?php
// Récupération des deux nombres
echo "Entrez le premier nombre : ";
$nombre1 = intval(fgets(STDIN));

echo "Entrez le deuxième nombre : ";
$nombre2 = intval(fgets(STDIN));

// Récupération de l'opération
echo "Choisissez l'opération (+, -, *, /) : ";
$operation = trim(fgets(STDIN)); // Trim removes any extra spaces or newlines

// Calcul en fonction de l'opération
switch ($operation) {
    case "+":
        $resultat = $nombre1 + $nombre2;
        break;
    case "-":
        $resultat = $nombre1 - $nombre2;
        break;
    case "*":
        $resultat = $nombre1 * $nombre2;
        break;
    case "/":
        if ($nombre2 == 0) {
            echo "Division par zéro impossible !\n";
            exit; // Exit the program if division by zero is attempted
        } else {
            $resultat = $nombre1 / $nombre2;
        }
        break;
    default:
        echo "Opération invalide.\n";
        exit; // Exit the program if an invalid operation is entered
}

// Affichage du résultat
if (isset($resultat)) {
    echo "Le résultat est : " . $resultat . "\n";
}
?>