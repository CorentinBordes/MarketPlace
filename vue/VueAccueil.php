<!DOCTYPE html>
<html lang="fr">
      <head>
            <title>date.html</title>
            <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="styleAccueil.css">
      </head>

      <header>

        <!-- Titre/logo -->
            <h1>Amazonie</h1>

        <!-- barre de recherche -->
            <p>
              <label for="BR">Recherche : </label>
              <input type="text" id="BR" name="BarreRecherche">
            </p>
         <!-- boutons d'accueil -->
            <p>
              <a href="http://www-etu-info.iut2.upmf-grenoble.fr/~bordesc/ProgWeb/MarketPlace/vue/VueAccueil.php"> Accueil </a>
            </p>
         <!-- Identifiez-vous -->
            <p>
              <a href="http://www-etu-info.iut2.upmf-grenoble.fr/~bordesc/ProgWeb/MarketPlace/vue/VueIdentification.php"> Identifiez-vous ! </a>
            </p>
         <!-- Panier -->
             <p>
               <a href="http://www-etu-info.iut2.upmf-grenoble.fr/~bordesc/ProgWeb/MarketPlace/vue/VuePanier.php"> Votre Panier </a>
             </p>

      </header>

      <body>

          <!-- panel gauche avec les catégories -->
          <nav>
              <?php
                  foreach ($GLOBALS["categories"] as $value) {
                      echo'<a href="" >'.$value->nom.'</a> <br>';
                  }

               ?>
          </nav>


            <section>
                <!-- liste de tout les produits -->

                      <!-- afficher des produits "tendances" -->
                <?php

                    foreach ($GLOBALS["articlesEnReduction"] as $value) {
                        echo '<article>';
                        echo $value->afficherVueArticleSingulier();
                        echo'</article>';
                    }
                    // image/nom/prix toutes les contraintes


                 ?>
            </section>








    </body>
</html>
