<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- meta référencement -->
    <meta name="description" content="Web Dev PHP : Conditions, requêtes GET">
    <meta name="author" content="Camile Ghastine">

    <title>Questionnaire de satisfaction du service client Amazin</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://bootswatch.com/4/lumen/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

    <?php

    function calculRate(string $score): string
    {
        $rate = '';

        if ($score === '-1') $score = 0;

        for ($i = 1; $i <= $score; $i++) {
            $rate .= '⭐';
        }
        for ($i = $score + 1; $i <= 5; $i++) {
            $rate .= '⚫';
        }

        return $rate;
    }
    ?>

    <div class="container">

        <h1 class="mb-5">AMAZIN</h1>

        <h2>Questionnaire de satisfaction</h2>

        <?php
        $_GET['step'] = isset($_GET['step']) ? $_GET['step'] : '0'; // ici j'utilise un if ternaire. Cette ligne permet de ne pas avoir à vérifier l'existence de $_GET dans les if suivants

        if ($_GET['step'] === '0') {
        ?>
            <!-- step 0 : A afficher uniquement au chargement de la page -->
            <p>Vous avez contacté notre service client et nous aimerions avoir votre avis sur la qualité de ce service</p>
            <p>Commencez le questionnaire : <a href="?step=1" role="button" class="btn btn-success">Commencer</a></p>
        <?php
        }

        if ($_GET['step'] === '1') {
        ?>
            <!-- Etape 1 : A afficher uniquement une fois que le boutton "Commencer" a été pressé -->
            <h2>Question 1</h2>
            <p>L'agent a-t-il été agréable ?</p>

            <a href="?step=2&result=2" role="button" class="btn btn-success">oui</a> <!-- rapporte 2 point -->
            <a href="?step=2&result=0" role="button" class="btn btn-danger">non</a> <!-- rapporte 0 point -->
            <a href="?step=2&result=1" role="button" class="btn btn-secondary">sans avis</a> <!-- rapporte 1 point -->
        <?php
        }

        if ($_GET['step'] === '2') {
        ?>
            <!-- Etape 2 : A afficher uniquement une fois que l'étape 1 a été résolue -->
            <h2>Question 2</h2>
            <p>L'agent a-t-il compris votre problème ?</p>
            <a href="?step=3&result=<?= $_GET['result'] + 2 ?>" role="button" class="btn btn-success">oui</a> <!-- rapporte 2 point -->
            <a href="?step=3&result=<?= $_GET['result'] + 0 ?>" role="button" class="btn btn-danger">non</a> <!-- rapporte 1 point -->
            <a href="?step=3&result=<?= $_GET['result'] + 1 ?>" role="button" class="btn btn-secondary">sans avis</a> <!-- rapporte 0 point -->
        <?php
        }

        if ($_GET['step'] === '3') {
        ?>
            <!-- Etape 3 : A afficher uniquement une fois que l'étape 2 a été résolue -->
            <h2>Question 3</h2>
            <p>L'agent a-t-il résolu votre problème ?</p>
            <a href="?step=final&result=<?= $_GET['result'] + 1 ?>" role="button" class="btn btn-success">oui</a> <!-- rapporte 1 point -->
            <a href="?step=4&result=<?= $_GET['result'] - 1 ?>" role="button" class="btn btn-danger">non</a> <!-- rapporte -1 point -->
        <?php
        }

        if ($_GET['step'] === '4') {

            $_GET['tel'] = isset($_GET['tel']) ? $_GET['step'] : '';  // if ternaire
        ?>
            <!-- Etape 4 : A afficher uniquement si "non" a été répondu à l'étape 3 -->
            <p>Votre problème n'a pas été résolu.</p>
            <p>Pour être rappelé, entrez votre numéro de téléphone dans le clavier virtuel et validez :</p>

            <!-- Coder ici un clavier numérique permettant de saisir le numéro de téléphone avec un bouton "ne pas être rappelé" -->
            <!-- Afficher ici le numéro de téléphone qui s'affiche au fur et à mesure de la saisie-->

            <!--éviter les répétitions comme ci-dessous :
            <p>
                <a href="?step=4&result=<?= $_GET['result'] ?>&tel=<?= $_GET['tel'] . '0' ?>" role="button" class="btn btn-secondary">0</a>
                <a href="?step=4&result=<?= $_GET['result'] ?>&tel=<?= $_GET['tel'] . '1' ?>" role="button" class="btn btn-secondary">1</a>
                <a href="?step=4&result=<?= $_GET['result'] ?>&tel=<?= $_GET['tel'] . '2' ?>" role="button" class="btn btn-secondary">2</a>
                <a href="?step=4&result=<?= $_GET['result'] ?>&tel=<?= $_GET['tel'] . '3' ?>" role="button" class="btn btn-secondary">3</a>
                <a href="?step=4&result=<?= $_GET['result'] ?>&tel=<?= $_GET['tel'] . '4' ?>" role="button" class="btn btn-secondary">4</a>
                <a href="?step=4&result=<?= $_GET['result'] ?>&tel=<?= $_GET['tel'] . '5' ?>" role="button" class="btn btn-secondary">5</a>
                <a href="?step=4&result=<?= $_GET['result'] ?>&tel=<?= $_GET['tel'] . '6' ?>" role="button" class="btn btn-secondary">6</a>
                <a href="?step=4&result=<?= $_GET['result'] ?>&tel=<?= $_GET['tel'] . '7' ?>" role="button" class="btn btn-secondary">7</a>
                <a href="?step=4&result=<?= $_GET['result'] ?>&tel=<?= $_GET['tel'] . '8' ?>" role="button" class="btn btn-secondary">8</a>
                <a href="?step=4&result=<?= $_GET['result'] ?>&tel=<?= $_GET['tel'] . '9' ?>" role="button" class="btn btn-secondary">9</a>
                <a href="?step=final&result=<?= $_GET['result'] ?>" role="button" class="btn btn-danger btn-sm">Ne pas être rappelé</a>
            </p> 
            Préférez une boucle comme ci-dessous : -->
            <p>
                <?php
                for ($i = 0; $i <= 9; $i++) {
                ?>
                    <a href="?step=4&result=<?= $_GET['result'] ?>&tel=<?= $_GET['tel'] . $i ?>" role="button" class="btn btn-secondary"><?= $i ?></a>
                <?php
                }
                ?>
            </p>
            <p>Votre numéro : <?= $_GET['tel'] ?></p>
            <a href="?step=final&result=<?= $_GET['result'] ?>&tel=<?= $_GET['tel'] . '9' ?>" role="button" class="btn btn-success">Valider</a> <!-- Validation du numéro de téléphone -->
        <?php
        }

        if ($_GET['step'] === 'final') {
            $rate = calculRate($_GET['result']);
        ?>
            <!-- Etape finale : A afficher si "oui" a été répondu à la question 3 ou si l'étape 4 a été résolue -->
            <p class="mt-5">Merci pour votre notation : <?= $rate ?> </p> <!-- le nombre d'étoiles représente le nombre de points cumulés -->
            <?php
            if (isset($_GET['tel'])) {
            ?>
                <p>Vous serez rappelé très prochainement au <?= $_GET['tel'] ?></p>
            <?php
            }
            ?>
            <!-- Si un téléphone à été saisi afficher "Vous serez rappelé très prochainement au #numéro de téléphone#" -->
            <p class="mt-5">
                <a href="?step=0" role="button" class="btn btn-danger">Recommencer</a>
            </p>
        <?php
        }
        ?>
    </div>
</body>

</html>