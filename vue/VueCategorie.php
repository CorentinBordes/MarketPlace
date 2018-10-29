<!DOCTYPE html>
<?php
  require_once('../vue/function.vue.php');
 ?>
<html lang="fr">

      <head>
            <title>EasyShop.fr</title>
            <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="../vue/StyleCatégorie.css">
            <link rel="shortcut icon" type="image/ico" href="../data/imageSite/favicon.ico"/>
      </head>

      <body>

          <?php include_once('../vue/VueBandeauSite.php') ?>

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
         </section>

           <div id="hautPage">
             <a href="#top"><img src="../data/imageSite/hautPage.jpg"/></a>
           </div>

    </body>
</html>
