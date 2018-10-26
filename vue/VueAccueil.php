<!DOCTYPE html>
<?php require_once('../vue/function.vue.php');?>
<html lang="fr">
      <head>
            <title>EasyShop.fr</title>
            <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="../vue/styleAccueil.css">
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
        <?php include_once('../vue/VueBandeauSite.php') ?>
      <footer>
          <nav>
              <?php
                  foreach ($GLOBALS["categories"] as $value) {
                      echo'<div>';
                        echo'<a href="afficherCategorie.ctrl.php?idCate='.$value->id.'" >'.$value->nom.'</a> <br>';
                      echo'</div>';
                  }
               ?>
          </nav>
            <section>
                <!-- liste de tout les produits -->
                      <!-- afficher des produits "tendances" -->
                <?php

                  foreach ($GLOBALS["articlesEnReduction"] as $value) {
                      echo '<article>';
                      if(isset($_SESSION['idClient'])){
                          echo afficherVueArticleSingulier($value,$_SESSION['idClient']);
                      }else{
                          echo afficherVueArticleSingulier($value);
                      }
                      echo'</article>';
                  }
                    // image/nom/prix toutes les contraintes
                 ?>
            </section>
            <div id="hautPage">
              <a href="#top"><img src="../data/imageSite/hautPage.jpg"/></a>
            </div>
      </footer>
          <!-- panel gauche avec les catégories -->
    </body>
</html>
