<?php

$_SESSION['SubChoose'] = $_POST['reftypeabonnement'];

?>


<link rel="stylesheet" type="text/css" href="css/pagemembre_style.css">

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
<br><br>


<h1>Confirmation</h1>

<section>

<h2><?php echo(($_SESSION['prenom'])." ".($_SESSION['nom'])); ?>, vous souhaitez soucrire à un abonnement mensuel <?php echo($_POST['nomabonnement']) ?>.</h2>

<h3>Récapitulatif de commande</h3>

<table>
    <thead>
        <tr>
            <th colspan="3">Commande Digital Sport </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Désignation</td>
            <td>Quantité</td>
            <td>Prix total</td>
        </tr>
        <tr>
            <td>Abonnement <?php echo($_POST['nomabonnement']) ?></td>
            <td>x1 (1 mois)</td>
            <td><?php echo($_POST['prix']) ?></td>
        </tr>
       <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Montant total</td>
            <td></td>
            <td><?php echo($_POST['prix']) ?></td>
        </tr>
    </tbody>
</table>

<a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=choose_sub_confirmed">Confirmer ma commande</a>












</section>

<style>


table,
td {
    border: 1px solid #333;
    width: 50vw;
    height: 5vh;
}

thead,
tfoot {
    background-color: #333;
    color: #fff;
}

</style>
