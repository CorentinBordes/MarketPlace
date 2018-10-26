<!DOCTYPE html>
<?php
require_once('../vue/function.vue.php');
 ?>
<html lang="fr">
      <head>
            <title>date.html</title>
            <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="StyleCatégorie.css">
      </head>

      <?php include_once('../vue/VueBandeauSite.php') ?>

      <body>
          <?php
            foreach ($GLOBALS["categorie"] as $value) {
                echo '<article>';
                if(isset($_SESSION['idClient'])){
                    echo afficherVueArticleSingulier($value,$_SESSION['idClient']);
                }else{
                    echo afficherVueArticleSingulier($value);
                }
                echo'</article>';
            }
           ?>
        <!-- affiche nom catégorie -->

        <!-- affiche la liste des produits selon la catégorie -->

    </body>
</html>
