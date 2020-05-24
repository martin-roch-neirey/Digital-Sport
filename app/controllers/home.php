<?php
function index ()
{
	display_view('home/index');
}

function submit_contact()
{
	require_once(MODEL_PATH . '/submit_contact.php');

	display_view('home/index', ['success_message' => 'Message envoyé ! 💪']);
	echo "<script>goToCont()</script>";
}

?>

