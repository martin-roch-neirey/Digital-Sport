<?php

$local_table = 'exercice';

$local_data = [
		'nomexo' => $_POST['nomExercice'],
		'lienvideo' => $_POST['lienVideo'],
		'lienimage' => $_POST['lienImage'],
		'lienmusique' => $_POST['lienMusique'],
		'description' => $_POST['description'],
];
if (!is_numeric($_POST['refMateriel'])){
	$local_data += ['refmateriel' => NULL];
} else{
	$local_data += ['refmateriel' => $_POST['refMateriel']];
}

insert($local_table , $local_data);

header("Location: https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=addExo");

?>