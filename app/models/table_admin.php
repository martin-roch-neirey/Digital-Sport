<?php

//----------------------------- functions for 'admin' table -----------------------------

function ConnexionTryAdmin() // try to connect an admin
{
    $local_table = 'admin';
    $local_mail = strtolower($_POST['mail']);

    $local_password =$_POST['password'];

    $result = select($local_table,['motdepasse','nomutilisateur'],[['mail','=',$local_mail]], '', 0, 0);

	if (isset($result[0])) {

	    $isPasswordCorrect = password_verify($_POST['password'], $result[0]['motdepasse']);
		return [$result[0],$isPasswordCorrect];
	}
}

function checkAdminConnexion() // check if the admin is connected
{
	if (!isset($_COOKIE['is_admin_connected']) or $_COOKIE['is_admin_connected'] == false){
		header('Location: '. get_url('connexion_admin','index')); // redirect on the connexion_admin view (index page)
		exit;
	} else {
		setcookie('is_admin_connected', true, time()+3600, null, null, false, true);
	}
}

?>