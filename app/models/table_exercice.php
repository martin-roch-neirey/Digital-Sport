<?php

//----------------------------- functions for 'exercice' table -----------------------------

function countExercise () // count exercise in database
{

	$local_table = 'exercice';
    $local_fieldsParams = ['COUNT(*)'];
    return select($local_table, $local_fieldsParams, [], '', 0, 0);

}

function addExerciseProceed () // proceeds the exercice addition in database
{

	$local_table = 'exercice';
	$local_data = [
			'nomexo' => $_POST['nomexercice'],
			'lienvideo' => $_POST['lienvideo'],
			'lienimage' => $_POST['lienimage'],
			'lienmusique' => $_POST['lienmusique'],
			'description' => $_POST['description'],
	];
	if (!is_numeric($_POST['refmateriel'])){ //check if a material is specified, if not, the value in database is 'NULL'
		$local_data += ['refmateriel' => NULL];
	} else{
		$local_data += ['refmateriel' => $_POST['refmateriel']];
	}

	insert($local_table , $local_data);

}

function getExercise () // show all the registred exercise to delete
{

	$local_table = 'exercice';
	$local_fieldsParams = ['idexercice','nomexo','description', 'refmateriel'];
	$local_orderParams = 'nomexo ASC';

	return select($local_table, $local_fieldsParams, [], $local_orderParams, 0, 0);

}

function getNameExerciseMaterial () // get the material name for an exercise
{

	$local_table = ['exercice','materiel'];
	$local_fieldsParam = 'nommateriel';
	$local_compareParams = ['refexercice','idexercice'];
	$local_whereParams = ['idexercice','=',$_POST['idexerice']];

	return select_ij($local_table,$local_fieldsParam,$local_compareParams,$local_whereParams);

}

function deleteExerciseProceed () // proceeds the exercice deletion in database
{

	$local_table = 'exercice';
	$local_whereParams = [['idexercice','=', $_POST['idexercice']]];

	delete($local_table, $local_whereParams);

}

function getExerciseInformation () // get exercise information (in database)
{

	$local_table = 'exercice';
    $local_fieldsParams = ['idexercice','refmateriel','lienvideo','lienimage','lienmusique','nomexo','description'];
    $local_whereParams = [['idexercice','=',$_POST['idexercice']]];

    return select($local_table, $local_fieldsParams, $local_whereParams, '', 0, 0);

}

function getExerciseModification () // get modified exercise information (on website)
{

	$local_data = [
	            'idexercice' => $_POST['idexercice'],
	            'lienvideo' => $_POST['lienvideo'],
	            'lienimage' => $_POST['lienimage'],
	            'lienmusique' => $_POST['lienmusique'],
	            'nomexo' => $_POST['nomexo'],
	            'description' => $_POST['description'],
	    ];

	if (!is_numeric($_POST['refmateriel'])){ //check if a material is specified, if not, the value in database is 'NULL'
		$local_data += ['refmateriel' => NULL];
	} else{
		$local_data += ['refmateriel' => $_POST['refmateriel']];
	}

	return $local_data;

}

function updateExercise ($idexercice, $dataUpdate) // update exercise profile in the database (with exercise modification, on website)
{

    $local_table = 'exercice';
    $local_fieldsParams = $dataUpdate;
    
    $local_whereParams = ['idexercice','=',$idexercice];

    update($local_table, $local_fieldsParams, $local_whereParams);

}

?>