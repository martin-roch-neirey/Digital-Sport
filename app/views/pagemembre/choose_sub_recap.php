<?php

$_SESSION['SubChoose'] = $_POST['reftypeabonnement'];

?>


<link rel="stylesheet" type="text/css" href="css/pagemembre_style.css">
<link rel="stylesheet" type="text/css" href="css/pagemembre_choose_sub_recap_style.css">

<main>
<br><br><br><br>
<section>

<h1 class="text-confirm">Confirmation 💪</h1>
<br><br>

<h2 class="text-confirm"><?php echo(($_SESSION['prenom'])." ".($_SESSION['nom'])); ?>, vous souhaitez soucrire à un abonnement mensuel <?php echo($_POST['nomabonnement']) ?>.</h2>
<br>

<h3>Récapitulatif de commande</h3>
<br>

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

<br><br>

<button> <a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=choose_sub_confirmed">Confirmer ma commande</a> </button>

<br><br><br>


</section>
<br><br><br><br>
</main>
