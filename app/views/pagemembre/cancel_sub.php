<h2>Mon Espace Virtuel</h2>

<?php

?>



<nav>
  <ul>

    <a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=index"">Accueil Membre</a><br>
    <a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=deconnexion_member">Me déconnecter</a>
    <li>Mes statistiques</li>
    <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=informations">Mon compte</a></li>
    <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=abonnements">Mes abonnements</a></li>
    <li><a href="">Je veux m'entraîner</a></li>
    <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=home&action=index">Retour à l'accueil</a></li>

  </ul>
🔰 Bonjour <?php echo $_SESSION['prenom']?> ! Voici vos abonnements actuels :
<br><br>

<?php echo $success_message ?>


<h2>Vous pouvez choisir un nouvel abonnement <a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=choose_sub">ici</a> !</h2>
<style>

</style>



</nav>



