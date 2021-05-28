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
    function rating()
    {
        $rate = '';
        for ($points = 0; $points < $_GET['result']; $points++) {
            $rate .= '⭐️';
        }

        if ($_GET['result'] === "-1") {
            $_GET['result'] === "0";
        }
        while ($points < 5) {
            $rate .= '⚫️';
        }
        return $rate;
    }

    ?>

    <div class="container">

        <h1 class="mb-5">AMAZIN</h1>

        <h2>Questionnaire de satisfaction</h2>


        <?php
        // step 0 : A afficher uniquement au chargement de la page 
        if ($_GET == null) {
        ?>
            <p>Vous avez contacté notre service client et nous aimerions avoir votre avis sur la qualité de ce service</p>
            <p>Commencez le questionnaire : <a href="?step=1" role="button" class="btn btn-success">Commencer</a></p>

        <?php
            // Etape 1 : A afficher uniquement une fois que le boutton "Commencer" a été pressé
        } elseif ($_GET['step'] === '1') {

        ?>
            <h2>Question 1</h2>
            <p>L'agent a-t-il été agréable ?</p>


            <a href="?step=2&result=<?= $_GET['result'] + 2 ?>" role="button" class="btn btn-success">oui</a> <!-- rapporte 2 point -->
            <a href="?step=2&result=<?= $_GET['result'] ?>" role="button" class="btn btn-danger">non</a> <!-- rapporte 0 point -->
            <a href="?step=2&result=<?= $_GET['result'] + 1 ?>" role="button" class="btn btn-secondary">sans avis</a> <!-- rapporte 1 point -->

        <?php
            // Etape 2 : A afficher uniquement une fois que l'étape 1 a été résolue
        } elseif ($_GET['step'] === '2') {

        ?>
            <h2>Question 2</h2>
            <p>L'agent a-t-il compris votre problème ?</p>
            <a href="?step=3&result=<?= $_GET['result'] + 2 ?>" role="button" class="btn btn-success">oui</a> <!-- rapporte 2 point -->
            <a href="?step=3&result=<?= $_GET['result'] ?>" role="button" class="btn btn-danger">non</a> <!-- rapporte 0 point -->
            <a href="?step=3&result=<?= $_GET['result'] + 1 ?>" role="button" class="btn btn-secondary">sans avis</a> <!-- rapporte 1 point -->


        <?php
            // Etape 3 : A afficher uniquement une fois que l'étape 2 a été résolue 
        } elseif ($_GET['step'] === '3') {

        ?>
            <h2>Question 3</h2>
            <p>L'agent a-t-il résolu votre problème ?</p>
            <a href="?step=4&result=<?= $_GET['result'] + 1 ?>" role="button" class="btn btn-success">oui</a> <!-- rapporte 1 point -->
            <a href="?step=4n&result=<?= $_GET['result'] - 1 ?>&choice=no&phone" role="button" class="btn btn-danger">non</a> <!-- rapporte -1 point -->

        <?php
            // Etape 4 : A afficher uniquement si "non" a été répondu à l'étape 3 
        } elseif ($_GET['step'] === '4') {

        ?>
            <p>Votre problème n'a pas été résolu.</p>

            <!--Afficher ici le numéro de téléphone qui s'affiche au fur et à mesure de la saisie -->

            <label for="phone">Pour être rappelé, entrez votre numéro de téléphone dans le clavier virtuel et validez : <br> </label>

            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>

            <medium> Format: 0124567890 <br></medium>
            <a href="?" role="button" class="btn btn-success">Valider</a>

        <?php
            // Etape finale : A afficher si "oui" a été répondu à la question 3 ou si l'étape 4 a été résolue 
        } elseif ($_GET['step'] === '4') {

        ?>
            <p class="mt-5">Merci pour votre notation :
                <?= rating(); ?>
            </p> <!-- le nombre d\'étoiles représente le nombre de points cumulés -->

            <!--Si un téléphone à été saisi, afficher "Vous serez rappelé très prochainement au #numéro de téléphone#"  -->
            <p class="mt-5">
                <a href="?" role="button" class="btn btn-danger">Recommencer</a></p>

        <?php
        }
        ?>

    </div>
</body>


</html>