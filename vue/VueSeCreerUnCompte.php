<!DOCTYPE html>

<!--On récupère les fonctions à utilisés-->
<?php require_once('../vue/function.vue.php');?>

<html lang="fr">
  <head>
      <title>EasyShop.fr</title>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../vue/StylePanier.css">

      <!--Affichage petit icône en haut de page-->
      <link rel="shortcut icon" type="image/ico" href="../data/imageSite/favicon.ico"/>
    </head>

    <body>

        <!-- Bouton haut de page script -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
        <script>
          jQuery(function(){
            $(function () {
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 200 ) {
                        $('#hautPage').css('right','10px');
                        } else {
                            $('#hautPage').removeAttr( 'style' );
                          }

                });
            });
          });
        </script>

        <!--Affichage du bandeau du site-->
        <?php include_once('../vue/VueBandeauSite.php') ?>

        <!-- Panier Utilisateur : Liste Articles (from BD) -->
        <footer>
            <fieldset>
                <form action="traitementInscription.ctrl.php" method="post">
                    <p>Nom:</p>
                    <input type="text" name="nom" required="required">
                    <p>Prenom:</p>
                    <input type="text" name="prenom" required="required">
                    <p>adresse:</p>
                    <input type="text" name="adresse" required="required">
                    <p>identifiant:</p>
                    <input type="text" name="id" required="required">
                    <p>mot de passe:</p>
                    <input type="password" name="password" required="required">
                    <input type="submit" value="valider">
                </form>
            </fieldset>
      </footer>

    </body>
</html>
