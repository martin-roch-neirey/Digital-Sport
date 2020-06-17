<?php

// Array in an array in an array

$result = $data[0];
$temp = $result[0];
$sql = $temp[0];

?>

<link rel="stylesheet" type="text/css" href="css/pagemembre_style.css">
<link rel="stylesheet" type="text/css" href="css/pagemembre_informations_style.css">

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
            <td><?php echo $sql['nomniveau']; ?></td>
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
<button type="button" class="button-informations"><a href='<?php echo get_url('pagemembre','update_user_profile') ?>'>Editer mes informations</a></button>

<button type="button" class="button-informations"><a href='<?php echo get_url('pagemembre','change_password') ?>'>Modifier mon mot de passe</a></button>
<br><br><br>
  </body>
</main>
