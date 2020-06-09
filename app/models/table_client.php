<?php

//----------------------------- functions for 'client' table -----------------------------

function countClient () // count client in database
{
    $local_table = 'client';
    $local_fieldsParams = ['COUNT(*)'];
    return select($local_table, $local_fieldsParams, [], '', 0, 0);

}

function showAllClientsProfile () { //show profile for all/searched client

    $local_table = 'client';
	$local_fieldsParams = ['idclient','nom','refniveau','refprefixetel','prenom','datenss','mail','tel','taille','poids','rue','numrue','ville','codepostal','pseudo'];
	$local_whereParams = [];
	$local_orderParams = 'nom ASC';
	if (!empty($_POST['search'])){ // check if a client is searched
		$local_whereParams = [['nom','=',ucwords(strtolower($_POST['search']))]];
	}

	return select($local_table, $local_fieldsParams, $local_whereParams, $local_orderParams, 0, 0);

}

function getClientProfile () // get client information profile (in database)
{

    $local_table = 'client';
    $local_fieldsParams = ['idclient','nom','prenom','refprefixetel','refniveau','mail','tel','taille','poids','rue','numrue','ville','codepostal','pseudo'];
    $local_whereParams = [['idclient','=',$_POST['iduser']]];

    return select($local_table, $local_fieldsParams, $local_whereParams, '', 0, 0);

}

function getModificationClientProfile () // get modified client information profile (on website)
{

    return $local_data = [
            'idclient' => $_POST['iduser'],
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'refprefixetel' => $_POST['refprefixetel'],
            'refniveau' => $_POST['refniveau'],
            'mail' => $_POST['mail'],
            'tel' => $_POST['tel'],
            'taille' => $_POST['taille'],
            'poids' => $_POST['poids'],
            'rue' => $_POST['rue'],
            'numrue' => $_POST['numrue'],
            'ville' => $_POST['ville'],
            'codepostal' => $_POST['codepostal'],
            'pseudo' => $_POST['pseudo'],
    ];

}

function updateClientProfile ($idclient, array $dataUpdate) // update client profile in the database (with client modification, on website) with $dataUpdate as an array
{

    $local_table = 'client';
    $local_fieldsParams = $dataUpdate;

    $local_whereParams = ['idclient','=',$idclient];

    update($local_table, $local_fieldsParams, $local_whereParams);

}

function verifyExistingClientMail ($mail) // verify in the database if the email address entered is already used or not
{

    $local_table = 'client';
    $local_fieldsParams = ['mail'];
    $local_whereParams = [['mail','=',$mail]];
    return select($local_table, $local_fieldsParams, $local_whereParams, '', 0, 0);

}

function verifyExistingClientPseudo ($pseudo) // verify in the database if the pseudo entered is already used or not
{

    $local_table = 'client';
    $local_fieldsParams = ['pseudo'];
    $local_whereParams = [['pseudo','=',$pseudo]];
    return select($local_table, $local_fieldsParams, $local_whereParams, '', 0, 0);

}

function deleteClientProfileProceed () // proceeds the client profile deletion in database
{

    $local_table = 'client';
    $local_whereParams = [['idclient','=', $_POST['iduser']]];

    delete($local_table, $local_whereParams);

}

function enregistreClient () // register a new client
{

    $local_table = 'client';
    $local_mdp = $_POST['motdepasse'];
    $mdp = password_hash($local_mdp, PASSWORD_DEFAULT); // password automaticaly hashed
    $mail = $_POST['mail'];

    $local_data = [
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'sexe' => $_POST['sexe'],
            'mail' => $mail,
            'datenss' => $_POST['datenss'],
            'pseudo' => $_POST['pseudo'],
            'ville' => $_POST['ville'],
            'rue' => $_POST['rue'],
            'numrue' => $_POST['numrue'],
            'codepostal' => $_POST['codepostal'],
            'poids' => $_POST['poids'],
            'taille' => $_POST['taille'],
            'tel' => $_POST['tel'],
            'motdepasse' => $mdp,
            'refprefixetel' => $_POST['refprefixetel'],
            'refniveau' => $_POST['refniveau'],

    ];

    return insert($local_table , $local_data);

}

function connexionTry() {

    $local_table = 'client';

    $local_mail = strtolower($_POST['P_email']);

    $local_leMDP =$_POST['P_password'];


    $result = select($local_table,['idclient','motdepasse','prenom','nom','refprefixetel','refniveau','reftypeabonnement'],[['mail','=',$local_mail]], '', 0, 0);

if (isset($result[0])) {

    $resultsql = $result[0];

        $isPasswordCorrect = password_verify($_POST['P_password'], $resultsql['motdepasse']);

$success = $isPasswordCorrect;
return [$resultsql,$success];

}




}

/*
function isConnected(string $view, array $local_data, $headfoot) {

if (isset($_COOKIE['is_connected'])) {

    if ($_COOKIE['is_connected'] == true) {

// $view      is a string which defines the view to set. EXAMPLE : "pagemembre/index"
// $local_    data is an array which represents $local_data of the display_view function
// $headfoot  is a boolean which represents the header / footer displays

   display_view($view, $local_data, $headfoot);

  } else {

   display_view('connexion/index', ['success_message' => 'Vous êtes déconnecté.'], false);

  }

} else {

  display_view('connexion/index', [], false);
  }

}
*/

function getRefAbo() {

    $local_table = 'client';
    $local_fieldsParams = ['idclient','reftypeabonnement'];
    $local_whereParams = [['idclient','=',$_POST['iduser']]];

    return select($local_table, $local_fieldsParams, $local_whereParams, '', 0, 0);

}

function cancelSub($idclient) {

// Cancel the subscription of the client, not regarding to the offer

    $local_table = 'client';
    $local_fieldsParams = ["reftypeabonnement" => null];

    $local_whereParams = ['idclient','=',$idclient];

    update($local_table, $local_fieldsParams, $local_whereParams);

}

function setSub($idclient, $sublevel) {

    $local_table = 'client';
    $local_fieldsParams = ["reftypeabonnement" => $sublevel];

    $local_whereParams = ['idclient','=',$idclient];

    update($local_table, $local_fieldsParams, $local_whereParams);




}



?>
