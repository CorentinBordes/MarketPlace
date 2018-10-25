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

      <header>

        <!-- Titre/logo -->
            <h1>Amazonie</h1>
        <!-- barre de recherche -->

         <!-- boutons d'accueil -->

         <!-- Identifiez-vous -->

         <!-- Panier -->


      </header>

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
