<header>
<!-- <header>
<!-- Titre/logo -->
<div id=conteneur1>
    <h1>EasyShop</h1>

<!-- barre de recherche -->
    <p id=recherche>
      <form class="" action="resultatRecherche.ctrl.php" method="post">
          <label for="BR">Recherche : </label>
          <input type="text" id="BR" name="BarreRecherche">
          <input type="submit" value="Search">
      </form>

    </p>
</div>

 <!-- boutons d'accueil -->
 <div id=conteneur2>

        <a href="../controleur/afficherAccueil.ctrl.php">Accueil</a>

 <?php
    if(isset($_SESSION["idClient"])){
        echo '<a href="../controleur/afficherPanier.ctrl.php?"> Panier</a>';
        echo '<a href="../controleur/seDeconnecter.ctrl.php">Se Deconnecter</a>';
        if($_SESSION['administrateur']){
            echo '<a href="../controleur/afficherParametreAdmin.ctrl.php">Parametres administrateur</a>';
        }
    }else{
        echo'<a href="../controleur/afficherSIndentifier.ctrl.php"> Identifiez-vous ! </a>';
        echo'<a href="../controleur/seCreerUnCompte.ctrl.php"> Se Creer Un Compte ! </a>';
    }
?>
</div>
</header>