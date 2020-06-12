<?php

//----------------------------- load needed functions from model -----------------------------

require_once(MODEL_PATH . '/table_coach.php');
require_once(MODEL_PATH . '/table_client.php');
require_once(MODEL_PATH . '/table_contact.php');
require_once(MODEL_PATH . '/table_exercice.php');
require_once(MODEL_PATH . '/table_materiel.php');
require_once(MODEL_PATH . '/table_niveau.php');
require_once(MODEL_PATH . '/table_prefixetel.php');
require_once(MODEL_PATH . '/table_seanceclient.php');
require_once(MODEL_PATH . '/table_seancecoach.php');

//----------------------------- show statistics from database (about clients and coachs) -----------------------------

function index () // admin home page, get statistics from database
{
	$local_data = ['presentation_message' => 'Statistiques DigitalSport', // message de presentation
				   ['Clients :',countClient()], // ['message',countFunction]
				   ['Coachs :',countCoach()],
				   ['Exercices enregistrés :',countExercise()],
				   ['Matériels enregistrés :',countMaterial()],
				   ['Messages de contact :',countContactMessage()],
			       ['Séances client réalisées :',countSessionClient()],
				   ['Séances coach réalisées :',countSessionCoach()]
				  ];

	display_view('admin/index', $local_data);

}

//----------------------------- show all client and coach profiles -----------------------------

function show_all_coachs_profile () // show all coach profile
{
	$result = showAllCoachsProfile();

	if (empty($result)){ // check if requested coach exists
		$local_data = ['action_message'=>'coach','presentation_message'=>'Liste des coachs :','error_message' => 'Aucun coach correspondant'];
	} else{
		$local_data = ['action_message'=>'coach','presentation_message'=>'Liste des coachs :','success_message' => '', $result];
	}

	display_view('admin/show_user_profile', $local_data);
}

function show_all_clients_profile () // show all client profile
{
	$result = showAllClientsProfile();

	if (empty($result)){ // check if requested client exists
		$local_data = ['action_message'=>'client','presentation_message'=>'Liste des clients :','error_message' => 'Aucun client correspondant'];
	} else{
		$local_data = ['action_message'=>'client','presentation_message'=>'Liste des clients :','success_message' => '', $result];
	}

	display_view('admin/show_user_profile', $local_data);

}

//----------------------------- show contact message -----------------------------

function show_contact_message () // show contact message (from client)
{
	$local_data = showContactMessage();

	display_view('admin/show_contact_message', $local_data); // array format needed

}

//----------------------------- delete contact message -----------------------------

function delete_contact_message () // delete contact message (from database)
{
	deleteContactMessageProceed();

	header('Location: https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=show_contact_message'); // redirect on the view to show contact message with success message

	setcookie('cookie_success_message', 'Le message a été supprimé ! 💪', time() + 1, null, null, false, true); // cookie to set success message

}

function delete_day_contact_message () // delete contact message for a specific day (from database)
{
	deleteDayContactMessageProceed();

	header('Location: https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=show_contact_message'); // redirect on the view to show contact message with success message

	setcookie('cookie_success_message', 'Les messages ont été supprimés ! 💪', time() + 1, null, null, false, true); // cookie to set success message
}

//----------------------------- add exercise -----------------------------

function add_exercise () // show form to add exercises
{
	$local_data = getMaterial(); // get all material to choose

	display_view('admin/add_exercise', ['presentation_message' => 'Exercice à ajouter :', $local_data]);
}

function add_exercise_proceed () // proceeds to the exercise addition
{
	addExerciseProceed();

	header('Location: https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=show_exercise');

	setcookie('cookie_success_message', 'Exercice ajouté ! 💪', time() + 1, null, null, false, true); // cookie to set success message
}

//----------------------------- show exercise -----------------------------

function show_exercise () // show exercise
{
	$local_data = getExercise(); // get all exercise to show

	display_view('admin/show_exercise', ['presentation_message' => 'Liste des exercices :', 'success_message' => '', $local_data]);
}

//----------------------------- update exercise -----------------------------

function update_exercise () // show exercise to delete
{
	$local_data = [getExerciseInformation(),getOrderedMaterial()]; // get all exercise to update

	display_view('admin/update_exercise', ['presentation_message' => 'Exercice à modifier :', $local_data]);
}

function update_exercise_proceed () // proceeds to the exercise update
{

	$oldInfo = getExerciseInformation(); // get old information from database
	$newInfo = getExerciseModification(); // get new information from website (with update)
	

	$array_diff = array_diff_assoc($newInfo,$oldInfo[0]); // get the information to update by comparing old and new information
	$local_data = [[[$newInfo],getOrderedMaterial()],'presentation_message'=>'Exercice à modifier :','success_message' => 'Exercice édité avec succès ! 💪'];

	if (!empty($array_diff)) // check whether the information has been changed
	{
		updateExercise($newInfo['idexercice'],$array_diff); // update information in the database with the new information of the exercise

		display_view('admin/update_exercise', $local_data);
	} else {
		$local_data = [[[$newInfo],getOrderedMaterial()],'presentation_message'=>'Exercice à modifier :', 'error_message' => "Aucune information n'a été modifiée"];
		display_view('admin/update_exercise', $local_data);
	}

}

//----------------------------- delete exercise -----------------------------

function delete_exercise_proceed () // proceeds to the exercise deletion
{
	deleteExerciseProceed();

	header('Location: https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=show_exercise');

	setcookie('cookie_success_message', 'Exercice supprimé ! 💪', time() + 1, null, null, false, true); // cookie to set success message
}

//----------------------------- update material -----------------------------

function update_material (){ // show form to update material

	$local_data = getMaterial();

	display_view('admin/update_material', ['presentation_message' => 'Modification matériel :', 'success_message' => '', $local_data]);

}

//----------------------------- add material -----------------------------

function add_material_proceed () // proceeds to the material addition
{
	addMaterialProceed();

	header('Location: https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=update_material');

	setcookie('cookie_success_message', 'Matériel ajouté ! 💪 ', time() + 1, null, null, false, true); // cookie to set success message
}

//----------------------------- delete material -----------------------------

function delete_material_proceed () // proceeds to the material deletion
{
	deleteMaterialProceed();

	header('Location: https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=update_material');

	setcookie('cookie_success_message', 'Matériel supprimé ! 💪', time() + 1, null, null, false, true); // cookie to set success message
}

//----------------------------- update client profile -----------------------------

function update_client_profile () // show all the informations about a client to update them
{
	$local_data = [getClientProfile(),getOrderedPrefixPhone(),getOrderedLevel(), 'action_message' => 'client', 'presentation_message' => 'Modification profil client :' ];

	display_view('admin/update_user_profile', $local_data);
}

function update_client_profile_proceed () // proceeds to the update of a client profile
{
	$oldInfo = getClientProfile(); // get old information from database
	$newInfo = getModificationClientProfile(); // get new information from website (with update)
	

	$array_diff = array_diff_assoc($newInfo,$oldInfo[0]); // get the information to update by comparing old and new information
	$local_data = [[$newInfo],getOrderedPrefixPhone(),getOrderedLevel(), 'action_message'=>'client','presentation_message'=>'Modification profil client :','success_message' => 'Le profil du client à été édité avec succès ! 💪'];

	if (!empty($array_diff)) // check whether the information has been changed
	{
		if (array_key_exists('mail', $array_diff)){ // check if the mail address is unique
			$existingEmail = verifyExistingClientMail($array_diff['mail']);
		}

		if (!empty($existingEmail)){
			$local_data = [[$newInfo],getOrderedPrefixPhone(),getOrderedLevel(),'action_message'=>'client', 'presentation_message'=>'Modification profil client :', 'error_message' => 'Cet email est déja utilisé par un autre client.'];
			display_view('admin/update_user_profile', $local_data);
			exit;
		}

		if (array_key_exists('pseudo', $array_diff)){ // check if the pseudo is unique
			$existingPseudo = verifyExistingClientPseudo($array_diff['pseudo']);
		}

		if (!empty($existingPseudo)){
			$local_data = [[$newInfo],getOrderedPrefixPhone(),getOrderedLevel(),'action_message'=>'client', 'presentation_message'=>'Modification profil client :', 'error_message' => 'Ce pseudo est déja utilisé par un autre client.'];
			display_view('admin/update_user_profile', $local_data);
			exit;
		}

		updateClientProfile($newInfo['idclient'],$array_diff); // update information in the database with the new information of the client

		display_view('admin/update_user_profile', $local_data);
	} else {
		$local_data = [[$newInfo],getOrderedPrefixPhone(),getOrderedLevel(),'action_message'=>'client', 'presentation_message'=>'Modification profil client :', 'error_message' => "Aucune information n'a été modifiée"];
		display_view('admin/update_user_profile', $local_data);
	}

}

//----------------------------- delete client profile -----------------------------

function delete_client_profile_proceed () // proceeds the client profile deletion
{
	deleteClientProfileProceed();

	header('Location: https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=show_all_clients_profile'); // redirect on the view to show client profile with success message

	setcookie('cookie_success_message', 'Le client à bien été supprimé ! 💪', time() + 1, null, null, false, true); // cookie to set success message
}

//----------------------------- update coach profile -----------------------------

function update_coach_profile () // show all the informations about a coach to update them
{
	$local_data = [getCoachProfile(),getOrderedPrefixPhone(), 'action_message' => 'coach', 'presentation_message' => 'Modification profil coach :' ];

	display_view('admin/update_user_profile', $local_data);
}

function update_coach_profile_proceed () // proceeds to the update of a coach profile
{
	$oldInfo = getCoachProfile(); // get old information from database
	$newInfo = getModificationCoachProfile(); // get new information from website (with update)
	

	$array_diff = array_diff_assoc($newInfo,$oldInfo[0]); // get the information to update by comparing old and new information
	$local_data = [[$newInfo],getOrderedPrefixPhone(), 'action_message'=>'coach', 'presentation_message'=>'Modification profil coach :', 'success_message' => 'Le profil du coach à été édité avec succès ! 💪'];

	if (!empty($array_diff)) // check whether the information has been changed
	{
		if (array_key_exists('mail', $array_diff)){ // check if the mail address is unique
			$existingEmail = verifyExistingCoachMail($array_diff['mail']);
		}

		if (!empty($existingEmail)){
			$local_data = [[$newInfo],getOrderedPrefixPhone(), 'action_message'=>'coach', 'presentation_message'=>'Modification profil coach :', 'error_message' => 'Cet email est déja utilisé par un autre coach.'];
			display_view('admin/update_user_profile', $local_data);
			exit;
		}

		if (array_key_exists('pseudo', $array_diff)){ // check if the pseudo is unique
			$existingPseudo = verifyExistingCoachPseudo($array_diff['pseudo']);
		}

		if (!empty($existingPseudo)){
			$local_data = [[$newInfo],getOrderedPrefixPhone(), 'action_message'=>'coach', 'presentation_message'=>'Modification profil coach :', 'error_message' => 'Ce pseudo est déja utilisé par un autre coach.'];
			display_view('admin/update_user_profile', $local_data);
			exit;
		}

		updateCoachProfile($newInfo['idcoach'],$array_diff); // update information in the database with the new information of the coach

		display_view('admin/update_user_profile', $local_data);
	} else {
		$local_data = [[$newInfo],getOrderedPrefixPhone(), 'action_message'=>'coach', 'presentation_message'=>'Modification profil coach :', 'error_message' => "Aucune information n'a été modifiée"];
		display_view('admin/update_user_profile', $local_data);
	}

}

//----------------------------- delete coach profile -----------------------------

function delete_coach_profile_proceed () // proceeds the coach profile deletion
{
	deleteCoachProfileProceed();

	header('Location: https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=show_all_coachs_profile'); // redirect on the view to show coach profile with success message

	setcookie('cookie_success_message', 'Le coach à bien été supprimé ! 💪', time() + 1, null, null, false, true); // cookie to set success message
}

//----------------------------- show resources -----------------------------

function show_resource_graph () // show graph
{
	display_view('admin/show_resources', ['action_message'=>'graph', 'presentation_message' => 'Graphe des dépendances fonctionnelles']);
}

function show_resource_mcd () // show mcd
{
	display_view('admin/show_resources', ['action_message'=>'mcd', 'presentation_message' => 'Modèle conceptuel de données']);
}

function show_resource_mld () // show mld
{
	display_view('admin/show_resources', ['action_message'=>'mld', 'presentation_message' => 'Modèle logique de données']);
}

//----------------------------- show changelog -----------------------------

function show_changelog ()
{
	display_view('admin/show_changelog', ['presentation_message' => 'Changelog DigitalSport :']);
}

?>

