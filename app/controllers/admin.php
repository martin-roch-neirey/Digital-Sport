<?php

function index ()
{
	require_once(MODEL_PATH . '/indexStats.php');
	
	display_view('admin/index', $local_data);

}

function showCoach ()
{
	require_once(MODEL_PATH . '/showCoach.php');

	if (empty($result)){
		$local_data = ['success_message' => 'Aucun coach correspondant'];
	} else{
		$local_data = ['success_message' => 'Liste des coachs :', $result];
	}

	display_view('admin/showProfile', $local_data);
}

function showClient ()
{
	require_once(MODEL_PATH . '/showClient.php');

	if (empty($result)){
		$local_data = ['success_message' => 'Aucun client correspondant'];
	} else{
		$local_data = ['success_message' => 'Liste des clients :', $result];
	}

	display_view('admin/showProfile', $local_data);

}

function showContact ()
{
	require_once(MODEL_PATH . '/showContact.php');

	display_view('admin/showContact', $local_data);

}

function addExo ()
{
	require_once(MODEL_PATH . '/addExo.php');

	display_view('admin/addExo', ['presentation_message' => 'Exercice à ajouter :', $result]);
}


function addExo_proceed ()
{
	require_once(MODEL_PATH . '/addExo_proceed.php');

	display_view('admin/addExo', ['success_message' => "Exercice ajouté ! 💪 "]);
}

function delExo ()
{
	require_once(MODEL_PATH . '/delExo.php');

	display_view('admin/delExo', ['presentation_message' => 'Exercice à supprimer :', $result]);
}

function delExo_proceed ()
{
	require_once(MODEL_PATH . '/delExo_proceed.php');

	display_view('admin/delExo', ['success_message' => 'Exercice supprimé ! 💪']);
}

function addMateriel ()
{
	display_view('admin/addMateriel', ['presentation_message' => 'Matériel à ajouter :']);
}


function addMateriel_proceed ()
{
	require_once(MODEL_PATH . '/addMateriel_proceed.php');

	display_view('admin/addMateriel', ['success_message' => "Matériel ajouté ! 💪 "]);
}

function delMateriel ()
{
	require_once(MODEL_PATH . '/delMateriel.php');

	display_view('admin/delMateriel', ['presentation_message' => 'Matériel à supprimer :', $result]);
}

function delMateriel_proceed ()
{
	require_once(MODEL_PATH . '/delMateriel_proceed.php');

	display_view('admin/delMateriel', ['success_message' => 'Matériel supprimé ! 💪']);
}



?>

