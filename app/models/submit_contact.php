<?php

if (!isset($_POST['contact_mail']) || !isset($_POST['contact_message']) || empty($_POST['contact_message']) || empty($_POST['contact_mail'])) {
	$errors = ['champs manquant'];
	display_view('home/index', ['errors' => $errors]);
	return;	
}

$localTable = "CONTACT";

$localData = [
	'Message' => $_POST['contact_message'],
	'Mail' => $_POST['contact_mail'],
];

insert($localTable , $localData);

?>