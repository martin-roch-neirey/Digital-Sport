<?php

//----------------------------- load needed functions from model -----------------------------

require_once(MODEL_PATH . '/table_contact.php');
require_once(MODEL_PATH . '/table_client.php');

//----------------------------- show website home page (presentation page) -----------------------------

function index ()
{
	display_view('home/index');
}

//----------------------------- submit contact message (from client) -----------------------------

function index_message_submit () // show idnex page with success message (message submited)
{
	display_view('home/index', ['success_message' => 'Message envoyé ! 💪']);
	echo "<script>goToCont()</script>";
}

function submit_contact_message() // submit message
{
	submitContactMessage();
	header('Location: '. get_url('home','index_message_submit')); // redirect on the view to show index home page
}

?>

