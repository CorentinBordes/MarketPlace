<!DOCTYPE html>

<html lang="fr" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>EasyShop.fr</title>
        <link rel="stylesheet" type="text/css" href="../vue/StyleResultatInscription.css">

        <!--Affichage petit icône en haut de page-->
        <link rel="shortcut icon" type="image/ico" href="../data/imageSite/favicon.ico"/>
    </head>
    <body>

        <!--Affichage du bandeau du site-->
        <?php include_once('../vue/VueBandeauSite.php') ?>

        <!--Affichage Résultat de l'inscription-->
        <h2><?php echo $GLOBALS['resultatInscription'];  ?></h2>

        <!--Affichage bouton retour au site-->
        <a href="../controleur/afficherAccueil.ctrl.php">Retour au site</a>
    </body>
</html>
