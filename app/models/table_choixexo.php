<?php

//----------------------------- functions for 'choixexo' table -----------------------------

function showExercisetraining () // show exercise training with all caracteristics
{ 
	$local_table = 'choixexo';
	$local_fieldsParams = ['idchoixexo','nomniveau','nomtypemuscu','nommuscle','nomexo','nbrepetition','vitesse','refniveau','reftypemuscu','refmuscle','refexercice'];
	$local_innerJoinParams = [['niveau','refniveau','idniveau'],['typemuscu','reftypemuscu','idtypemuscu'],['muscle','refmuscle','idmuscle'],['exercice','refexercice','idexercice']];
	$local_whereParams = [];

	return select_ij($local_table,$local_fieldsParams,$local_innerJoinParams,$local_whereParams);
}

function getExerciseTrainingInformation () // get exercise training information (in database)
{ 
	$local_table = 'choixexo';
	$local_fieldsParams = ['idchoixexo','refniveau','reftypemuscu','refmuscle','refexercice','nbrepetition','vitesse'];

    $local_whereParams = [['idchoixexo','=',$_POST['idchoixexo']]];

	return select($local_table, $local_fieldsParams, $local_whereParams, '', 0, 0);
}

function getExerciseTrainingModification () // get modified exercise training information (on website)
{
	return $local_data = [
				'idchoixexo' => $_POST['idchoixexo'],
	            'refniveau' => $_POST['refniveau'],
	            'reftypemuscu' => $_POST['reftypemuscu'],
	            'refmuscle' => $_POST['refmuscle'],
	            'refexercice' => $_POST['refexercice'],
	            'nbrepetition' => $_POST['nbrepetition'],
	            'vitesse' => $_POST['vitesse'],
	];
}

function deleteExerciseTrainingProceed () // proceeds the exercice training deletion in database
{
	$local_table = 'choixexo';
	$local_whereParams = [['idchoixexo','=', $_POST['idchoixexo']]];

	delete($local_table, $local_whereParams);
}

function addExerciseTrainingProceed () // proceeds the exercice training addition in database
{
	$local_table = 'choixexo'; 
	$local_data = [
	        'refniveau' => $_POST['refniveau'],
	        'reftypemuscu' => $_POST['reftypemuscu'],
            'refmuscle' => $_POST['refmuscle'],
            'refexercice' => $_POST['refexercice'],
            'nbrepetition' => $_POST['nbrepetition'],
            'vitesse' => $_POST['vitesse'],

    ];

    insert($local_table , $local_data);
}

function updateExerciseTraining ($idchoixexo, $dataUpdate) // update exercise training in the database (with exercise training modification, on website)
{
    $local_table = 'choixexo';
    $local_fieldsParams = $dataUpdate;
    
    $local_whereParams = ['idchoixexo','=',$idchoixexo];

    update($local_table, $local_fieldsParams, $local_whereParams);
}

function checkExistingExerciceTraining () // check if a same training exercice exists
{
	$local_table = 'choixexo';
	$local_fieldsParams = ['idchoixexo'];

    $local_whereParams = [['refmuscle','=',$_POST['refmuscle']], ['refexercice','=',$_POST['refexercice']], ['refniveau','=',$_POST['refniveau']], ['reftypemuscu','=',$_POST['reftypemuscu']]];

	return select($local_table, $local_fieldsParams, $local_whereParams, '', 0, 0);
}

function selectClientExerciseTraining () // select exercise training with specific caracteristic
{
	$local_table = 'choixexo';
	$local_fieldsParams = ['idchoixexo','nomexo','description','lienimage','lienvideo','lienmusique','nbrepetition','vitesse'];
	$local_innerJoinParams = [['exercice','refexercice','idexercice']];

	if (!is_numeric($_POST['refmateriel'])){ //check if a material is specified, if not, the value in database is 'NULL'
		$material_data = ['refmateriel','NULL'];
	} else{
		$material_data = ['refmateriel','=',$_POST['refmateriel']];
	}

	$local_whereParams = [['refmuscle','=',$_POST['refmuscle']],['reftypemuscu','=',$_POST['reftypemuscu']],['refniveau','=',$_SESSION['refniveau']],$material_data];

	return select_ij($local_table,$local_fieldsParams,$local_innerJoinParams,$local_whereParams);
}