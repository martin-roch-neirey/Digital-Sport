<?php

//----------------------------- functions for 'admin' table -----------------------------

function ConnexionTryAdmin() {

    $local_table = 'admin';
    $local_mail = strtolower($_POST['mail']);

    $local_password =$_POST['password'];


    $result = select($local_table,['motdepasse','nomutilisateur'],[['mail','=',$local_mail]], '', 0, 0);

	if (isset($result[0])) {

	    $isPasswordCorrect = password_verify($_POST['password'], $result[0]['motdepasse']);
		return [$result[0],$isPasswordCorrect];

	}

}

function checkAdminConnexion() {
	if (!isset($_COOKIE['is_admin_connected']) or $_COOKIE['is_admin_connected'] == false){
		header('Location: https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=connexion_admin&action=index'); // redirect on admin connexion page
		exit;
	}
}

?>