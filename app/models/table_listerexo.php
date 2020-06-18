<?php

//----------------------------- functions for 'listerexo' table -----------------------------

function addListExercise (int $nbSeanceclient, int $nbExercise) // add exercices to the list
{
	$local_table = 'listerexo';
	$local_fieldsParams = ['idrefseanceclient' => $nbSeanceclient,'idrefchoixexo' => $nbExercise];

	insert($local_table,$local_fieldsParams);
}

?>