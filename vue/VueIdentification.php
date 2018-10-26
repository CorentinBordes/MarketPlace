<!DOCTYPE html>
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
      <body>
          <fieldset>
              <form class="" action="../controleur/traitementIdentification.ctrl.php" method="post">
                  <label >identifiant : </label>
                  <input type="text" name="id" value="emile" required="required">
                  <label >mot de passe : </label>
                  <input type="password" name="password" value="emiliobe" required="required">
                  <input type="submit" value="valider">
              </form>
          </fieldset>

        <!-- login -->

        <!-- mdp -->

        <!-- valider -->

        <!-- "se rappeler de moi" -->

        <!-- créer un compte -->

    </body>
</html>
