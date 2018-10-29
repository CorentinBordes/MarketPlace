<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once('../vue/function.vue.php');
        include_once('../model/DAO.class.php');
        $GLOBALS['categories']= $dao->getAllCat();
        foreach ($GLOBALS['categories'] as $value) {
            $GLOBALS['articlesParCate']= $dao->getArticle($value->id);
            foreach ( $GLOBALS['articlesParCate'] as $valuee) {
                //var_dump($valuee);
                echo '<article>';
                if(isset($_SESSION['idClient'])){
                    echo afficherVueArticleSingulier($valuee,$_SESSION['idClient']);
                }else{
                    echo afficherVueArticleSingulier($valuee);
                }
                echo'</article>';
            }
        }

         ?>
    </body>
</html>
