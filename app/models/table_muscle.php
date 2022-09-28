<?php

//----------------------------- functions for 'muscle' table -----------------------------

function getMuscle () // get different muscle
{
	$local_table = 'muscle';
	$local_fieldsParams = ['idmuscle','nommuscle'];
	$local_orderParams = 'nommuscle ASC';

	return select($local_table, $local_fieldsParams, [], $local_orderParams, 0, 0);
}

function getOrderedMuscle () // get/show different muscle with the target's one at the top
{ 

	$local_table = 'muscle';
	$local_fieldsParams = ['idmuscle','nommuscle'];
	$refMuscle = $_POST["refmuscle"];

	$local_ordered_muscle = [];
	$local_ordered_muscle_others = [];
	$result = select($local_table, $local_fieldsParams, [], '', 0, 0);

	foreach ($result as $array => $littleArray) { // loop to split the target value from others
		if ($littleArray["idmuscle"] == $refMuscle){
			array_push($local_ordered_muscle, $littleArray);
		} else{
			array_push($local_ordered_muscle_others, $littleArray);
		}
	}

	foreach ($local_ordered_muscle_others as $otherArray) { // loop to gather (successively) the other values by keeping the target's one at the top
		array_push($local_ordered_muscle, $otherArray);
	}

	return $local_ordered_muscle;
}

?>