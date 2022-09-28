<?php

//----------------------------- functions for 'prefixetel' table -----------------------------

function getPrefixPhone () // get/show different phone prefix
{
	$local_table = 'prefixetel';
	$local_fieldsParams = ['idprefixetel','designationprefixetel'];
	$local_orderParams = 'designationprefixetel ASC';

	return select($local_table, $local_fieldsParams, [], $local_orderParams, 0, 0);
}

function getOrderedPrefixPhone () // get/show different phone prefix with the users one at the top
{ 
	$local_table = 'prefixetel';
	$local_fieldsParams = ['idprefixetel','designationprefixetel'];
	$refPrefixPhone = $_POST["refprefixetel"];

	$local_ordered_prefix_phone = [];
	$local_ordered_prefix_phone_others = [];
	$result = select($local_table, $local_fieldsParams, [], '', 0, 0);

	foreach ($result as $array => $littleArray) { // loop to split the user's value from others
		if ($littleArray["idprefixetel"] == $refPrefixPhone){
			array_push($local_ordered_prefix_phone, $littleArray);
		} else{
			array_push($local_ordered_prefix_phone_others, $littleArray);
		}
	}

	foreach ($local_ordered_prefix_phone_others as $otherArray) { // loop to gather (successively) the other values by keeping the user's one at the top
		array_push($local_ordered_prefix_phone, $otherArray);
	}

	return $local_ordered_prefix_phone;
}

?>
