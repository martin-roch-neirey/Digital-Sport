<?php

$result = $data[0];
$temp = $result[0];
$sql = $temp[0];

if ($sql['reftypeabonnement'] == 1) {
  $typeabo = "START";
} else if ($sql['reftypeabonnement'] == 2) {
  $typeabo = "SPORT+";
} else {
  $typeabo = 'Vous n\'avez pas d\'abonnement ! Profitez d\'avantages exclusifs, de vidéos de coaching, d\'astuces et bien plus encore en cliquant <a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=choose_sub">ici</a>.';
}

?>



<link rel="stylesheet" type="text/css" href="css/pagemembre_style.css">
<link rel="stylesheet" type="text/css" href="css/pagemembre_abonnements_style.css">

<header>
<div id="menu-name">
  <h1>Mon Espace Virtuel</h1>
  <h2 id="bonjour"><?php echo $_SESSION['prenom']?> <?php echo $_SESSION['nom']?></h2>
  <h3>🔰 Abonnements 🔰</h3>
</div>
</nav>

<ul id="menu-header">
  <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=index">Accueil Membre</a>
    <ul>
      <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=home&action=index">Retour à l'accueil</a></li>
    </ul>
  </li>
  <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=index">Training</a>
    <ul>
      <li><a href="#">Je veux m'entraîner</a></li>
      <li><a href="#">Mes statistiques</a></li>
    </ul>
  </li>
  <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=index">Mon Profil</a>
    <ul>
      <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=informations">Mes informations</a></li>
      <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=abonnements">Mes abonnements</a></li>
      <li><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=deconnexion_member">Me déconnecter</a></li>
    </ul>
  </li>
</ul>

</header>


<main>
  <br><br><br><br>
    <menu class="menu">
<nav> <p class="title-menu">Voici vos abonnements actuels : </p>
<br><br>

<p class="article-menu-sub"><?php echo($typeabo) ?> <br><br></p>


<?php

if ($_SESSION['Sub'] != null) {
  echo('<p class="options-menu"> Options d\'abonnement : </p> <br>');
  echo('<p class="article-menu"> <a class="button-menu" href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=cancel_sub">Résilier mon abonnement</a> </p>');
} echo "<br><br>";
if ($_SESSION['Sub'] == 1) {
  echo('<p class="article-menu"> <a class="button-menu" href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=choose_sub">Changer mon type d\'abonnement</a> </p>');
}
?>


<br><br>



<style>

</style>



</nav>
  </menu>
  <br><br><br><br>

</main>

<footer>

    <h2>&copy; DigitalSport, 2020</h2>

</footer>



