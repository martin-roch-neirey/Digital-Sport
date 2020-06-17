<link rel="stylesheet" type="text/css" href="css/pagemembre_style.css"> <!-- load style -->
<main>

<h3>Choisissez ce que vous voulez travailler :</h3>

<?php

	if (isset($error_message)){
		print($error_message);
	}

	$dataMaterial = $data[0]; // affect $data parts to var
	$dataMuscle = $data[1];
	$dataTypeTraining = $data[2];

	print("<form action=". get_url('pagemembre', 'exercise_training_proceed') ." method='POST'>");

		print('<label> Matériel : ');
		print('<select name="refmateriel">'); // show a drop-down box to select 'refexercice'
		foreach ($dataMaterial as $ligne) {
		    print( '<option value='.$ligne["idmateriel"].'>'. $ligne["nommateriel"] .'</option>');
		}
		print('</select>');
		print('</label>');

		print('<label> Muscle : ');
		print('<select name="refmuscle">'); // show a drop-down box to select 'refexercice'
		foreach ($dataMuscle as $ligne) {
		    print( '<option value='.$ligne["idmuscle"].'>'. $ligne["nommuscle"] .'</option>');
		}
		print('</select>');
		print('</label>');

		print('<label> Type de musculation : ');
		print('<select name="reftypemuscu">'); // show a drop-down box to select 'refexercice'
		foreach ($dataTypeTraining as $ligne) {
		    print( '<option value='.$ligne["idtypemuscu"].'>'. $ligne["nomtypemuscu"] .'</option>');
		}
		print('</select>');
		print('</label>');

		print('<button type="submit">Rechecrher !</button>');
	print('</form>');
?>

</main>
	
