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



<link rel="stylesheet" type="text/css" href="css/pagemembre_abonnements_style.css">

<main>
  <br><br><br><br>
    <menu class="menu">
<nav> <p class="title-menu">Voici vos abonnements actuels : </p>
<br><br>

<p class="article-menu-sub"><?php echo($typeabo) ?> <br><br><br></p>


<?php

if ($_SESSION['Sub'] != null) {
  echo('<p class="options-menu"> Options d\'abonnement : </p> <br>');
  echo('<p class="article-menu"> <a class="button-menu" href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=cancel_sub">Résilier mon abonnement</a> </p>');
} echo "<br><br>";
if ($_SESSION['Sub'] == 1) {
  echo('<p class="article-menu"> <a class="button-menu" href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=choose_sub">Changer mon type d\'abonnement</a> </p>');
}
?>


<br>

</nav>
  </menu>
  <br><br><br><br>

</main>



