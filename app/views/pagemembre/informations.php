<?php

$result = $data[0];
$temp = $result[0];
$sql = $temp[0];

if ($sql['refniveau'] == 1) {
  $niveau = "Débutant";
} else if ($sql['refniveau'] == 2) {
  $niveau = "Intermédiaire";
} else if ($sql['refniveau'] == 3) {
  $niveau = "Expert";
} else $niveau = "Non renseigné";

?>

<link rel="stylesheet" type="text/css" href="css/pagemembre_style.css">

<header>
<div id="menu-name">
  <h1>Mon Espace Virtuel</h1>
  <h2 id="bonjour"><?php echo $_SESSION['prenom']?> <?php echo $_SESSION['nom']?></h2>
  <h3>🔰 Informations 🔰</h3>
</div>


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

    <br><br><br>




<body>
<div class="table-name">
    <h3>Vos Informations 💪</h3>
</div>
<table class="table-content">
    <thead>
        <tr>
            <th colspan="2"><?php echo(($_SESSION['prenom'])." ".($_SESSION['nom'])); ?> </th>
        </tr>
    </thead>
    <tbody>
      <tr>
            <td>Pseudonyme</td>
            <td><?php echo $sql['pseudo']; ?></td>
        </tr>
        <tr>
            <td>Mail</td>
            <td><?php echo $sql['mail']; ?></td>
        </tr>
        <tr>
            <td>Téléphone</td>
            <td><?php echo $sql['tel']; ?></td>
        </tr>
        <tr>
            <td>Niveau</td>
            <td><?php echo $niveau; ?></td>
        </tr>
        <tr>
            <td>Taille</td>
            <td><?php echo $sql['taille']; ?></td>
        </tr>
        <tr>
            <td>Poids</td>
            <td><?php echo $sql['poids']; ?></td>
        </tr>
        <tr>
            <td>Ville</td>
            <td><?php echo $sql['ville']; ?></td>
        </tr>
        <tr>
            <td>Rue</td>
            <td><?php echo $sql['rue']; ?></td>
        </tr>
        <tr>
            <td>N° d'habitation</td>
            <td><?php echo $sql['numrue']; ?></td>
        </tr>
        <tr>
            <td>Code Postal</td>
            <td><?php echo $sql['codepostal']; ?></td>
        </tr>
    </tbody>
</table>
<br><br>
<button type="button" class="button-informations"><a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=update_user_profile">Editer mes informations</a></button>
<br><br><br>
  </body>
</main>


<footer>

    <h2>&copy; DigitalSport</h2>

</footer>


