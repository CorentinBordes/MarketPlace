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
        <section>
            <a href="../controleur/commander.ctrl.php"> Commander</a>
        </section>
        <!-- Panier Utilisateur : Liste Articles (from BD) -->
        <section>
            <?php
                foreach ($GLOBALS["panierClient"] as $value) {
                    echo'<article>';
                      $ref=$value->refArticle;
                      $article=$dao->getArticleSingulier($ref);/*l'article en cours avec toutes ses caractéristiques*/
                      echo afficherVueArticleSingulierPanier($article[0]);
                    echo'</article>';
                }
            ?>
      </section>
        <!-- Payer -->

        <!-- " Articles même catégories " -->

        <div id="hautPage">
          <a href="#top"><img src="../data/imageSite/hautPage.jpg"/></a>
        </div>
    </body>
</html>
