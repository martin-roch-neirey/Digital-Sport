<?php

//----------------------------- functions for 'niveau' table -----------------------------

function getLevel () // get different level
{

	$local_table = 'niveau';
	$local_fieldsParams = ['idniveau','nomniveau'];
	$local_orderParams = 'nomniveau ASC';

	return select($local_table, $local_fieldsParams, [], $local_orderParams, 0, 0);

}

function getOrderedLevel () { // get/show different level with the users one at the top

	$local_table = 'niveau';
	$local_fieldsParams = ['idniveau','nomniveau'];
	$refPrefixPhone = $_POST["refniveau"];

	$local_ordered_level = [];
	$local_ordered_level_others = [];
	$result = select($local_table, $local_fieldsParams, [], '', 0, 0);


	foreach ($result as $array => $littleArray) { // loop to split the user's value from others
		if ($littleArray["idniveau"] == $refPrefixPhone){
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