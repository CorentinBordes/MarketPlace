<?php

function afficherVueArticleSingulier($article,$idClient= NULL): string {
    $result='<img src="../data/img/'.$article->image.'" alt="image correspondant a l\'objet">';
    $result .= '<p><b>'.$article->intitulé.'</b></p>';
    $result .=  '<p>'.$article->info.'</p>';
    if($article->reduction==0){
        $result .=  '<p>Prix : '.$article->prix.'</p>';
        if($idClient==NULL){
            $idClient=0;
            $result .=  '<form action="../controleur/afficherSIndentifier.ctrl.php" method="post">
                        Nombre :<br>
                        <input type="text" name="nombreDArticle" value="1"><br>
                        <input type="hidden" name="refArticle" value="'.$article->ref.'">

                        <input type="submit" value="Ajouter au panier">
                        </form>';
        }else{
            $result .=  '<form action="../controleur/ajouterAuPanier.php" method="post">
                        Nombre :<br>
                        <input type="text" name="nombreDArticle" value="1"><br>
                        <input type="hidden" name="refArticle" value="'.$article->ref.'">
                        <input type="hidden" name="idClient" value="'.$idClient.'">
                        <input type="submit" value="Ajouter au panier">
                        </form>';
        }
    }else{
        $prixCal = $article->prix * (1-($article->reduction/100));
        $result .=  '<p>Prix : '.$prixCal.'</p>';
        if($idClient==NULL){
            $result .=  '<form action="../controleur/afficherSIndentifier.ctrl.php" method="post">
                        Nombre :<br>
                        <input type="text" name="nombreDArticle" value="1"><br>
                        <input type="hidden" name="refArticle" value="'.$article->ref.'">
                        <input type="hidden" name="idClient" value="'.$idClient.'">
                        <input type="submit" value="Ajouter au panier">
                        </form>';
        }else{
            $result .=  '<form action="../controleur/ajouterAuPanier.php" method="post">
                        Nombre :<br>
                        <input type="text" name="nombreDArticle" value="1"><br>
                        <input type="hidden" name="refArticle" value="'.$article->ref.'">
                        <input type="hidden" name="idClient" value="'.$idClient.'">
                        <input type="submit" value="Ajouter au panier">
                        </form>';
        }

    }
    return $result;
}

function formulaireAjouterAuPanier($RefArticle,$idClient=NULL): string {

    return $result;
}

function afficherVueArticleSingulierPanier($article): string {
    $result='<img src="../data/img/'.$article->image.'" alt="image correspondant a l\'objet">';
    $result .= '<p><b>'.$article->intitulé.'</b></p>';
    $result .=  '<p>'.$article->info.'</p>';
    if($article->reduction==0){
        $result .=  '<p>Prix : '.$article->prix.'</p>';
    }else{
        $prixCal = $article->prix * (1-($article->reduction/100));
        $result .=  '<p>Prix : '.$prixCal.'</p>';
    }
    return $result;
}

 ?>
