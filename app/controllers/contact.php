<?php



function index()
{
	display_view('contact/index');
}

function submit_contact()
{

	if (!isset($_POST['email']) || !isset($_POST['message']) || empty($_POST['message'])) {
		$errors = ['champs manquant'];
		display_view('contact/index', ['errors' => $errors]);
		return;	
	}

	$sql = "INSERT INTO CONTACT (Message, Mail) VALUES (:message, :mail);";

	$params = [
		':email' => $_POST['email'],
		':message' => $_POST['message'],
	];

	pdo_query($sql, $params);

	display_view('contact/index', ['success_message' => 'contact ajoute']);
}