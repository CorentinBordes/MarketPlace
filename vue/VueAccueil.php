<!DOCTYPE html>
<html lang="fr">
      <head>
            <title>date.html</title>
            <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="../vue/styleAccueil.css">
      </head>

      <header>
        <!-- Titre/logo -->
        <div id=conteneur1>
            <h1>Amazonie</h1>

        <!-- barre de recherche -->
            <p id=recherche>
              <label for="BR">Recherche : </label>
              <input type="text" id="BR" name="BarreRecherche">
            </p>
        </div>

         <!-- boutons d'accueil -->
         <div id=conteneur2>
            <p>
              <a href="../controleur/afficherAccueil.ctrl.php">Accueil</a>
            </p>
         <?php
            if(isset($GLOBALS["identificateur"])){
                echo '<a href="afficherPanier.ctrl.php"> Panier</a>';
            }else{
                echo'<a href="../controleur/afficherSIndentifier.ctrl.php"> Identifiez-vous ! </a>';
            }
        ?>





      </header>

      <body>

          <!-- panel gauche avec les catégories -->
          <nav>
              <?php
                  foreach ($GLOBALS["categories"] as $value) {
                      echo'<a href="afficherCategorie.ctrl.php?id='.$value->id.'" >'.$value->nom.'</a> <br>';
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
