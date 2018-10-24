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

        <header>
          <!-- Titre/logo -->
          <div id=conteneur1>
              <h1>EasyShop</h1>

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
           </div>
        </header>

        <!-- Panier Utilisateur : Liste Articles (from BD) -->
        <footer>
          <nav>
              <?php
                  foreach ($GLOBALS["panierClient"] as $value) {
                      echo'<div>';
                        $ref=$value->refArticle;
                        $article=$dao->getArticleSingulier($ref);/*l'article en cours avec toutes ses caractéristiques*/
                        echo afficherVueArticleSingulierPanier($article[0]);
                      echo'</div>';
                  }
               ?>
          </nav>
      </footer>
        <!-- Payer -->

        <!-- " Articles même catégories " -->

    </body>
</html>
