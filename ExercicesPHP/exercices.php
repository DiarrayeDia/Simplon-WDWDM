// Exercice 1 : afficher le plus petit nombre $a = 10; $b = 20;
<br>
<?php

$a = 10;
$b = 20;

if ($a < $b) {
    echo "Le plus petit nombre est :  $a";
} else {
    echo "Le plus petit nombre est :  $b";
} ?>
<hr>
<br>
// Exercice 2 : afficher la table de 9 (opération + résultat)
<br>
<?php

for ($i = 1; $i < 11; $i++) {

    $j = $i * 9;
    echo " 9 x " . $i . " est égal à " . $j;
?>
    <br>
<?php
}
?>
<hr>

// Exercice 3 : compter à rebours

// Ecrire le code ici

echo "
<hr>";

// Exercice 4 : Ecrire une boucle qui produit une ligne horizontale de 8 étoiles

// Ecrire le code ici

echo "
<hr>";

// Exercice 5 : Afficher un figure de 8 étoiles sur 8.

// Ecrire le code ici

echo "
<hr>";

// Exercice 6 : Ecrire une fonction (utilisant une boucle) qui remplace tout les espaces d'une phrase par un underscore
// indice : si $mot = "jouet" alors $mot[0] = "j", $mot[1] = "o", ...
// indice : chercher sur google une fonction qui renvoie la longueur d'une chaine de caractères

// Ecrire le code ici

// trouver sur google son équivalant clef en main.
echo "
<hr>";

// Exercice 7 : Ecrire une fonction (utilisant une boucle) qui inverse et affiche l'ordre des lettres d'un mot

// Ecrire le code ici

// trouver sur google son équivalant clef en main.
echo "
<hr>";




// Exercice 8: Ecrire une fonction qui supprime les espaces et met la phrase en camelCase
// Interdit d'utiliser les fonctions suivantes : ucwords() et str_replace().
$sentence = "le chat est mort"; //devient : leChatEstMort

// Ecrire le code ici

// Réécrire la fonction en utilisant les fonctions interdites