<?php

//----------------------------- functions for 'typeabonnement' table -----------------------------

function getSubscription () // get different subscribtion
{

	$local_table = 'typeabonnement';
	$local_fieldsParams = ['idtypeabonnement','nomtypeabonnement'];
	$local_orderParams = 'nomtypeabonnement ASC';

	return select($local_table, $local_fieldsParams, [], $local_orderParams, 0, 0);

}

function getOrderedSubsciption () { // get/show different subscriptions with the users one at the top

	$local_table = 'typeabonnement';
	$local_fieldsParams = ['idtypeabonnement','nomtypeabonnement'];
	$refTypeAbonnement = $_POST["reftypeabonnement"];

	$local_ordered_level = [];
	$local_ordered_level_others = [];
	$result = select($local_table, $local_fieldsParams, [], '', 0, 0);

	array_push($result, ['idtypeabonnement' => NULL, 'nomtypeabonnement' => 'Aucun']);


	foreach ($result as $array => $littleArray) { // loop to split the user's value from others
		if ($littleArray["idtypeabonnement"] == $refTypeAbonnement){
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