
<?php

// Getting the sql array in the array in the array $data

			$result = $data[0];
			$temp = $result[0];
			$sql = $temp[0];

// $dataPrefixetel = $result[1];
// $test = $dataPrefixetel[0];
// DEBUG : print_r($data);
// DEBUG : print_r($dataNiveau);

$_POST["refprefixetel"] = $sql['refprefixetel'];
$dataPrefixetel = getOrderedPrefixPhone();
$_POST["refniveau"] = $sql['refniveau'];
$dataNiveau = getOrderedLevel();

?>



<link rel="stylesheet" type="text/css" href="css/pagemembre_style.css">
<link rel="stylesheet" type="text/css" href="css/pagemembre_informations_style.css">

<?php

    if (isset($_COOKIE['cookie_success_message'])) {
      echo $_COOKIE['cookie_success_message'];
    } else if (isset($success_message)) {
      echo $success_message;
    } else if (isset($error_message)) {
      echo $error_message;
    } else if (isset($action_message)) {
      echo $action_message;
    }

?>


<main>
      <br><br><br>
<body>
<form id="RegisterUserForm" action='<?php echo get_url('pagemembre','update_user_profile_proceed') ?>' method="post">

	<input hidden name="pseudo" type="text" value=<?php echo $sql['pseudo'] ?>>
	<input hidden name="nom" type="text" value=<?php echo $sql['nom'] ?>>
	<input hidden name="prenom" type="text" value=<?php echo $sql['prenom'] ?>>
    <input hidden name="reftypeabonnement" type="text" value=<?php echo $sql['reftypeabonnement'] ?>>


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
            <td><?php echo $sql['pseudo'] ?> | Cette valeur n'est pas modifiable.</td>
        </tr>
        <tr>
            <td>Mail</td>
            <td><input type="email" name="mail" required value=<?php echo $sql['mail'] ?>></td>
        </tr>
        <tr>
            <td>Préfixe de téléphone</td>
            <td><?php
            print('<select name="refprefixetel">'); // show a drop-down box to select 'prefixetel'
					   	foreach ($dataPrefixetel as $ligne) {
					        print( '<option value='.$ligne["idprefixetel"].'>'. $ligne["designationprefixetel"] .'</option>');
					    }
					print('</select>'); ?></td>
        </tr>
        <tr>
            <td>Téléphone</td>
            <td><input type="number" name="tel" required value=<?php echo $sql['tel'] ?>></td>
        </tr>
        <tr>
            <td>Niveau</td>
            <td><?php
            print('<select name="refniveau">'); // show a drop-down box to select 'niveau'
					   	foreach ($dataNiveau as $ligne) {
					        print( '<option value='.$ligne["idniveau"].'>'. $ligne["nomniveau"] .'</option>');
					    }
					print('</select>'); ?></td>
        </tr>
        <tr>
            <td>Taille (cm)</td>
            <td><input type="number" name="taille" required value=<?php echo $sql['taille'] ?>></td>
        </tr>
        <tr>
            <td>Poids (kg)</td>
            <td><input type="number" name="poids" required value=<?php echo $sql['poids'] ?>></td>
        </tr>
        <tr>
            <td>Ville</td>
            <td><input type="text" name="ville" required value=<?php echo $sql['ville'] ?>></td>
        </tr>
        <tr>
            <td>Rue</td>
            <td><input type="text" name="rue" required value=<?php echo $sql['rue'] ?>></td>
        </tr>
        <tr>
            <td>N° d'habitation</td>
            <td><input type="number" name="numrue" required value=<?php echo $sql['numrue'] ?>></td>
        </tr>
        <tr>
            <td>Code Postal</td>
            <td><input type="number" name="codepostal" required value=<?php echo $sql['codepostal'] ?>></td>
        </tr>
    </tbody>
</table>
<br><br>
<button type="submit" class="button-informations">Enregistrer mes modifications</button>
<br><br><br>
</form>
</body>
</main>
