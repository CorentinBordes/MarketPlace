<!DOCTYPE html>
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
                echo $value->afficherVueArticleSingulier();
                echo'</article>';
            }
           ?>
        <!-- affiche nom catégorie -->

        <!-- affiche la liste des produits selon la catégorie -->

    </body>
</html>
