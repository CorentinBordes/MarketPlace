<!DOCTYPE html>
<?php
require_once('../vue/function.vue.php');
 ?>
<html lang="fr">
  <head>
      <title>EasyShop.fr</title>
      <meta charset="utf-8">
      <link rel="stylesheet" type="text/css" href="../vue/StylePanier.css">
      <link rel="shortcut icon" type="image/ico" href="../data/imageSite/favicon.ico"/>
    </head>

    <body>
        <?php include_once('../vue/VueBandeauSite.php') ?>

        <!-- Panier Utilisateur : Liste Articles (from BD) -->
        <section>
            <?php
            // var_dump($GLOBALS['CommandesClient']);

                foreach ($GLOBALS['CommandesClient'] as $value) {
                    echo'<article>';
                    echo'<a href="">'.$value->numCommande.'</a><p>'.$value->dateCommande.'</p>';
                       foreach ($GLOBALS['ArticleCommande'][$value->numCommande] as  $value2) {
                           foreach ($value2 as $key => $value3) {
                               echo afficherVueArticleSingulierPanier($value3);
                           }
                        }
                     echo'</article>';
                }
            ?>
      </section>
        <!-- Payer -->

        <!-- " Articles même catégories " -->

    </body>
</html>
