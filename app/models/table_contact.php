<?php

//----------------------------- functions for 'contact' table -----------------------------

function countContactMessage () // count contact message in database
{
	$local_table = 'contact';
    $local_fieldsParams = ['COUNT(*)'];
    return select($local_table, $local_fieldsParams, [], '', 0, 0);
}

function showContactMessage () // show contact message (from client)
{

	$local_table = 'contact';;
	$local_fieldsParams = ['idcontact','date','mail','message'];
	$local_whereParams = [];
	$local_orderParams = 'date DESC';

	if (!empty($_POST['search'])){ // check if a date is searched
		$local_whereParams = [['date','=',$_POST['search']]];
	}
	$result = select($local_table, $local_fieldsParams, $local_whereParams, $local_orderParams, 0, 0);

	if (empty($result) and empty($_POST['search'])){ // show all contact message or for a specific date
		$local_data = ['presentation_message' => 'Liste des messages :','error_message' => "Il n'y a pas de messages !"];
	} elseif (empty($result)) {
		$local_data = ['presentation_message' => 'Liste des messages :','error_message' => 'Aucun message pour le : ' . $_POST['search']];
	} elseif (!empty($_POST['search'])) {
		$local_data = ['action_message' => 'delete_date', 'presentation_message' => 'Liste des messages :','success_message' => 'Pour le : ' . $_POST['search'], $result];
	} else{
		$local_data = ['presentation_message' => 'Liste des messages :', 'success_message' => '', $result];
	}

	return $local_data;

}

function submitContactMessage () // submit contact message in database (from client)
{

	$local_table = 'contact';
	$local_data = [
		'message' => $_POST['contact_message'],
		'mail' => $_POST['contact_mail'],
	];

	insert($local_table , $local_data);

}

function deleteContactMessageProceed () // proceeds the contact message deletion in database
{

    $local_table = 'contact';
    $local_whereParams = [['idcontact','=', $_POST['idcontact']]];

    delete($local_table, $local_whereParams);

}

function deleteDayContactMessageProceed () // proceeds the day contact message deletion in database
{

	$local_table = 'contact';
	$local_whereParams = [['date','=', $_POST['date']]];

	delete($local_table, $local_whereParams);
}

?>