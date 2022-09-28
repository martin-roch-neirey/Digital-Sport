<?php

//----------------------------- functions for 'coach' table -----------------------------

function countCoach () // count coach in database
{
	$local_table = 'coach';
    $local_fieldsParams = ['COUNT(*)'];
    return select($local_table, $local_fieldsParams, [], '', 0, 0);
}

function showAllCoachsProfile () //show profile for all/searched coach
{
	$local_table = 'coach';
	$local_fieldsParams = ['idcoach','nom','refprefixetel','prenom','datenss','mail','tel','taille','poids','rue','numrue','ville','codepostal','pseudo'];
	$local_whereParams = [];
	$local_orderParams = 'nom ASC';
	if (!empty($_POST['search'])){ // check if a coach is searched
		$local_whereParams = [['nom','=',ucwords(strtolower($_POST['search']))]];
	}

	return select($local_table, $local_fieldsParams, $local_whereParams, $local_orderParams, 0, 0);
}

function getCoachProfile () // get coach information profile (in database)
{
    $local_table = 'coach';
    $local_fieldsParams = ['idcoach','nom','prenom','refprefixetel','mail','tel','taille','poids','rue','numrue','ville','codepostal','pseudo'];
    $local_whereParams = [['idcoach','=',$_POST['iduser']]];

    return select($local_table, $local_fieldsParams, $local_whereParams, '', 0, 0);
}

function getModificationCoachProfile () // get modified coach information profile (on website)
{
    return $local_data = [
            'idcoach' => $_POST['iduser'],
            'nom' => $_POST['nom'],
            'mail' => $_POST['mail'],
            'prenom' => $_POST['prenom'],
            'refprefixetel' => $_POST['refprefixetel'],
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

function getAddCoachInfo () // get coach info from coach form
{
    return $local_data = [
            'sexe' => $_POST['sexe'],
            'nom' => $_POST['nom'],
            'datenss' => $_POST['datenss'],
            'prenom' => $_POST['prenom'],
            'refprefixetel' => $_POST['refprefixetel'],
            'mail' => $_POST['mail'],
            'tel' => $_POST['tel'],
            'rue' => $_POST['rue'],
            'numrue' => $_POST['numrue'],
            'ville' => $_POST['ville'],
            'codepostal' => $_POST['codepostal'],
            'pseudo' => $_POST['pseudo'],
            'motdepassse' => $_POST['motdepasse'],
            'poids' => $_POST['poids'],
            'taille' => $_POST['taille'],
    ];
}

function addCoachProceed () // proceeds the coach addition
{
    $local_table = 'coach';
    $local_mdp = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT); // password automaticaly hashed

    $local_data = [
            'nom' => ucwords(strtolower($_POST['nom'])),
            'prenom' => ucwords(strtolower($_POST['prenom'])),
            'sexe' => $_POST['sexe'],
            'mail' => strtolower($_POST['mail']),
            'datenss' => $_POST['datenss'],
            'pseudo' => $_POST['pseudo'],
            'ville' => $_POST['ville'],
            'rue' => $_POST['rue'],
            'numrue' => $_POST['numrue'],
            'codepostal' => $_POST['codepostal'],
            'tel' => $_POST['tel'],
            'motdepasse' => $local_mdp,
            'refprefixetel' => $_POST['refprefixetel'],
            'poids' => $_POST['poids'],
            'taille' => $_POST['taille'],
    ];

    insert($local_table , $local_data);
}

function updateCoachProfile (int $idcoach,array $dataUpdate) // update coach profile in the database (with coach modification, on website)
{
    $local_table = 'coach';
    $local_fieldsParams = $dataUpdate;
    $local_whereParams = ['idcoach','=',$idcoach];

    update($local_table, $local_fieldsParams, $local_whereParams);
}

function verifyExistingCoachMail (string $mail) // verify in the database if the email address entered is already used or not
{
    $local_table = 'coach';
    $local_fieldsParams = ['mail'];
    $local_whereParams = [['mail','=',$mail]];
    return select($local_table, $local_fieldsParams, $local_whereParams, '', 0, 0);
}

function verifyExistingCoachPseudo (string $pseudo) // verify in the database if the pseudo entered is already used or not
{
    $local_table = 'coach';
    $local_fieldsParams = ['pseudo'];
    $local_whereParams = [['pseudo','=',$pseudo]];

    return select($local_table, $local_fieldsParams, $local_whereParams, '', 0, 0);
}

function deleteCoachProfileProceed () // proceeds the coach profile deletion in database
{
    $local_table = 'coach';
    $local_whereParams = [['idcoach','=', $_POST['iduser']]];

    delete($local_table, $local_whereParams);
}

function ConnexionTryCoach() // try to connect a coach
{
    $local_table = 'coach';
    $local_mail = strtolower($_POST['mail']);
    $local_password = $_POST['password'];

    $result = select($local_table,['motdepasse','prenom','nom','idcoach'],[['mail','=',$local_mail]], '', 0, 0);

    if (isset($result[0])) {
        $isPasswordCorrect = password_verify($_POST['password'], $result[0]['motdepasse']);
        return [$result[0],$isPasswordCorrect];
    }
}

function checkCoachConnexion() // check if the coach is connected
{
    if (!isset($_COOKIE['is_coach_connected']) or $_COOKIE['is_coach_connected'] == false){
        header('Location: '. get_url('connexion_coach','index')); // redirect on the view to connexion index (expect a coach connexion)
        exit;
    } else {
        setcookie('is_coach_connected', true, time()+3600, null, null, false, true);
    }
}

function tryChangeCoachPassword() // try to change coach password
{
    $local_table = 'coach';
    $local_idcoach = $_SESSION['idcoach'];
    $local_leMDP = $_POST['actual_password'];
    $local_newMDP = $_POST['new_password'];

    $result = select($local_table,['motdepasse'],[['idcoach','=',$local_idcoach]], '', 0, 0);

    if (isset($result[0])) {

        $resultsql = $result[0];
        $isPasswordCorrect = password_verify($local_leMDP, $resultsql['motdepasse']);
        $success = $isPasswordCorrect;

        if ($success == true) {
            $chaine_hash = password_hash($local_newMDP, PASSWORD_DEFAULT);

            $local_table = 'coach';
            $local_fieldsParams = ["motdepasse" => $chaine_hash];
            $local_whereParams = ['idcoach','=',$local_idcoach];

            // submit the new password to the database
            update($local_table, $local_fieldsParams, $local_whereParams);
            $success = true;
        } else {
            $success = false;
        }
    } else {
        $success = false;
    }
    return $success;
}

?>
