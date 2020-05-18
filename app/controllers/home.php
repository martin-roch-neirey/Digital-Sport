<?php
function index ()
{

	// $test = pdo_query('SELECT * from users where name=:name', [':name' => 'erwan']);
	//$users = pdo_query('SELECT * from users');
	
	//$username = 'Sporax';
	//display_view('home/index', [ 'username' => $username, 'userlist' => $users]);
	display_view('home/index');
}

function submit_contact()
{

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

	display_view('home/index', ['success_message' => 'Message envoyé ! 💪']);
	echo "<script>goToCont()</script>";
}

?>

