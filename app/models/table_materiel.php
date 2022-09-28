<?php

//----------------------------- functions for 'materiel' table -----------------------------

function countMaterial () // count material in database
{
	$local_table = 'materiel';
    $local_fieldsParams = ['COUNT(*)'];
    return select($local_table, $local_fieldsParams, [], '', 0, 0);
}

function getMaterial () // get registered materials
{
	$local_table = 'materiel';
	$local_fieldsParams = ['idmateriel','nommateriel'];
	$local_orderParams = 'nommateriel ASC';

	$result = select($local_table, $local_fieldsParams, [], $local_orderParams, 0, 0);

	return $result;
}

function addMaterialProceed () // proceeds the material addition in database
{
	$local_table = 'materiel';
	$local_data = [
		'nommateriel' => ucfirst(strtolower($_POST['nommateriel'])),
	];

	insert($local_table , $local_data);
}

function deleteMaterialProceed () // proceeds the material deletion
{
	$local_table = 'materiel';
	$local_whereParams = [['idmateriel','=', $_POST['idmateriel']]];

	delete($local_table, $local_whereParams);	
}

function getOrderedMaterial () // get/show different material with the exercise one at the top
{ 
	$local_table = 'materiel';
	$local_fieldsParams = ['idmateriel','nommateriel'];
	$refmateriel = $_POST["refmateriel"];

	$local_ordered_level = [];
	$local_ordered_level_others = [];
	$result = select($local_table, $local_fieldsParams, [], '', 0, 0);

	array_push($result, ['idmateriel' => NULL, 'nommateriel' => 'Aucun']);

	foreach ($result as $array => $littleArray) { // loop to split the user's value from others
		if ($littleArray["idmateriel"] == $refmateriel){
			array_push($local_ordered_level, $littleArray);
		} else{
			array_push($local_ordered_level_others, $littleArray);
		}
	}

	foreach ($local_ordered_level_others as $otherArray) { // loop to gather (successively) the other values by keeping the user's one at the top
		array_push($local_ordered_level, $otherArray);
	}

	return $local_ordered_level;
}

?>