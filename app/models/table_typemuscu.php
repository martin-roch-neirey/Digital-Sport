<?php

//----------------------------- functions for 'typemuscu' table -----------------------------

function getTypeTraining () // get different training type
{
	$local_table = 'typemuscu';
	$local_fieldsParams = ['idtypemuscu','nomtypemuscu'];
	$local_orderParams = 'nomtypemuscu ASC';

	return select($local_table, $local_fieldsParams, [], $local_orderParams, 0, 0);
}

function getOrderedTypeTraining () // get/show different training type with the target's one at the top
{ 
	$local_table = 'typemuscu';
	$local_fieldsParams = ['idtypemuscu','nomtypemuscu'];
	$refTypeTraining = $_POST["reftypemuscu"];

	$local_ordered_type = [];
	$local_ordered_type_others = [];
	$result = select($local_table, $local_fieldsParams, [], '', 0, 0);

	foreach ($result as $array => $littleArray) { // loop to split the target value from others
		if ($littleArray["idtypemuscu"] == $refTypeTraining){
			array_push($local_ordered_type, $littleArray);
		} else{
			array_push($local_ordered_type_others, $littleArray);
		}
	}

	foreach ($local_ordered_type_others as $otherArray) { // loop to gather (successively) the other values by keeping the target's one at the top
		array_push($local_ordered_type, $otherArray);
	}

	return $local_ordered_type;
}

?>