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
            'prenom' => $_POST['prenom'],
            'refprefixetel' => $_POST['refprefixetel'],
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

function updateCoachProfile ($idcoach, $dataUpdate) // update coach profile in the database (with coach modification, on website)
{

    $local_table = 'coach';
    $local_fieldsParams = $dataUpdate;
    
    $local_whereParams = ['idcoach','=',$idcoach];

    update($local_table, $local_fieldsParams, $local_whereParams);

}

function verifyExistingCoachMail ($mail) // verify in the database if the email address entered is already used or not
{

    $local_table = 'coach';
    $local_fieldsParams = ['mail'];
    $local_whereParams = [['mail','=',$mail]];
    return select($local_table, $local_fieldsParams, $local_whereParams, '', 0, 0);

}

function verifyExistingCoachPseudo ($pseudo) // verify in the database if the pseudo entered is already used or not
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

?>