<header>

<!-- Titre/logo -->
<div id=conteneur1>
    <h1>EasyShop</h1>

<!-- barre de recherche -->
    <h3>
      <form class="" action="resultatRecherche.ctrl.php" method="post">
          <label for="BR">Rechercher : </label>
          <input type="text" id="BR" name="BarreRecherche">
          <input type="submit" value="Search">
      </form>
    </h3>
</div>

 <!-- boutons d'accueil -->
 <div id=conteneur2>

      <a href="../controleur/afficherAccueil.ctrl.php">Accueil</a>

 <?php
    if(isset($_SESSION["idClient"])){
        echo '<a href="../controleur/afficherPanier.ctrl.php?"> Mon Panier</a>';
        echo '<a href="../controleur/afficherCommandes.ctrl.php?"> Mes Commandes</a>';
        echo '<a href="../controleur/seDeconnecter.ctrl.php">Se Deconnecter</a>';
        if($_SESSION['administrateur']=='true'){
            echo '<a href="../controleur/afficherParametreAdmin.ctrl.php">Parametres administrateur</a>';
        }
    }else{
        echo'<a href="../controleur/afficherSIndentifier.ctrl.php"> Identifiez-vous ! </a>';
        echo'<a href="../controleur/seCreerUnCompte.ctrl.php"> Se Creer Un Compte ! </a>';
    }
?>
</div>
</header>
