<!DOCTYPE html>
<?php
require_once('../vue/function.vue.php');
 ?>
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
          <table>
              <tr>
                  <th>Nom</th><th>Prenom</th><th>Adresse</th><th>id</th><th>Administrateur</th><th>Suppression ?</th>
              </tr>
              <?php foreach ($GLOBALS['clients'] as $value) {
                  echo '<tr>';
                  echo '<td>'.$value->nom.'</td>'.'<td>'.$value->prenom.'</td>'.'<td>'.$value->adresse.'</td>'.'<td>'.$value->id.'</td>'.'<td>'.$value->administrateur.'</td>';
                  echo'<td>';
                  echo '<form action="suppresionClientParAdministrateur.ctrl.php" method="post">
                      <input type="hidden" name="id" value="'.$value->id.'">
                      <input type="submit" value="Supprimer">
                      </form>';
                  echo'</td>';
                  echo '</tr>';

              } ?>
          </table>

      </footer>
          <!-- panel gauche avec les catégories -->







    </body>
</html>
