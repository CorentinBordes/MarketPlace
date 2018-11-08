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

        <!--Affichage du bandeau du site-->
        <?php include_once('../vue/VueBandeauSite.php') ?>

        <!-- Panier Utilisateur : Liste Articles (from BD) -->
        <section>
            <?php
                foreach ($GLOBALS['CommandesClient'] as $value) {
                    echo'<article>';
                    echo'<p>Ma commande N° '.$value->numCommande.'  Datant du : '.$value->dateCommande.' Est constitué de :</p>';
                       foreach ($GLOBALS['ArticleCommande'][$value->numCommande] as  $value2) {
                           foreach ($value2 as $key => $value3) {
                               echo afficherVueArticleSingulierPanier($value3);
                           }
                        }
                     echo'</article>';
                }
            ?>

      </section>

    </body>
</html>
