
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

<header>
<div id="menu-name">
  <h1>Mon Espace Virtuel</h1>
  <h2 id="bonjour"><?php echo $_SESSION['prenom']?> <?php echo $_SESSION['nom']?></h2>
  <h3>🔰 Informations 🔰</h3>
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

<?php if(isset($success_message)): ?>
 						<h3><?php echo $success_message?></h3> <br>
 					<?php endif; ?>
 					<?php if(isset($error_message)): ?>
 						<h3><?php echo $error_message?></h3> <br>
 					<?php endif; ?>
 					<?php if(isset($action_message)): ?>
 						<h3><?php echo $action_message?></h3> <br>
 					<?php endif;



 					?>


<main>
      <br><br><br>
<body>
<form id="RegisterUserForm" action="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=update_user_profile_proceed" method="post">

	<input hidden name="pseudo" type="text" value=<?php echo $sql['pseudo'] ?>>
	<input hidden name="nom" type="text" value=<?php echo $sql['nom'] ?>>
	<input hidden name="prenom" type="text" value=<?php echo $sql['prenom'] ?>>


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
<button type="submit">Enregistrer mes modifications</button>
<br><br><br>
</form>
</body>
</main>


<footer>

    <h2>&copy; DigitalSport, 2020</h2>

</footer>
