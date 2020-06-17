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
	$local_fieldsParams = ['idclient','nom','refniveau','refprefixetel','reftypeabonnement','prenom','datenss','mail','tel','taille','poids','rue','numrue','ville','codepostal','pseudo'];
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
    $local_fieldsParams = ['idclient','nom','prenom','reftypeabonnement','refprefixetel','refniveau','mail','tel','taille','poids','rue','numrue','ville','codepostal','pseudo'];
    $local_whereParams = [['idclient','=',$_POST['iduser']]];

    return select($local_table, $local_fieldsParams, $local_whereParams, '', 0, 0);

}

function getClientProfileMemberpage () // get client information profile for memberpage only (in database)
{

    $local_table = 'client';
    $local_fieldsParams = ['idclient','nom','prenom','reftypeabonnement','refprefixetel','nomniveau','mail','tel','taille','poids','rue','numrue','ville','codepostal','pseudo'];
    $local_innerJoinParams = [['niveau','refniveau','idniveau']];
    $local_whereParams = [['idclient','=',$_POST['iduser']]];

    return select_ij($local_table,$local_fieldsParams,$local_innerJoinParams,$local_whereParams);

}

function getModificationClientProfile () // get modified client information profile (on website)
{

    $local_data = [
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

        if (!is_numeric($_POST['reftypeabonnement'])){ //check if a material is specified, if not, the value in database is 'NULL'
        $local_data += ['reftypeabonnement' => NULL];
    } else{
        $local_data += ['reftypeabonnement' => $_POST['reftypeabonnement']];
    }

    return $local_data;

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
    $mail = strtolower($_POST['mail']);

    // Form : Xxxxx Yyyyy
    $local_nom = $_POST['nom'];
    $nom = ucfirst(strtolower($local_nom));

    $local_prenom = $_POST['prenom'];
    $prenom = ucfirst(strtolower($local_prenom));


    $local_data = [
            'nom' => $nom,
            'prenom' => $prenom,
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

    // pushing new client in BDD
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

function resetPassword() // reset client password with a random created one
{

    $mail = strtolower($_POST['mail']);

    $listeCar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; // caracter list to form a new random password

    // create the new random password
    $motdepasse = '';
    $max = mb_strlen($listeCar, '8bit') - 1;
    for ($i = 0; $i < 10; ++$i) {
    $motdepasse .= $listeCar[random_int(0, $max)];
    }

    // hash the new password before submiting it to the database
    $chaine_hash = password_hash($motdepasse, PASSWORD_DEFAULT);

    $local_table = 'client';
    $local_fieldsParams = ["motdepasse" => $chaine_hash];
    $local_whereParams = ['mail','=',$mail];

    // submit the new password to the database
    update($local_table, $local_fieldsParams, $local_whereParams);

    // send a mail to the client entered mail with the new password


    $sujet = 'DigitalSport - Reinitialisation mot de passe';

    $message = '
    <body>
      <main>

        <h2>Digital Sport - Réinitialisation mot de passe 💪</h2>

        <section>

          <h3>Bonjour,</h3> <br>

          Vous avez demandé à réinitialiser votre mot de passe. <br><br>

          Le mot de passe pour votre compte sur DigitalSport a bien été réinitialisé. Voici votre nouveau mot de passe provisoire à utiliser sur le site de DigitalSport : "'.$motdepasse.'".<br><br>

        Surtout, veillez à bien changer votre mot de passe dans votre espace membre pour ne pas garder celui que nous vous avons créé, tentez dès à présent de vous reconnecter avec ce nouveau mot de passe : <br><br>


        <a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=abonnements">Page de connexion Digital Sport</a> <br><br>

          Si vous rencontrez de nouveaux problèmes, recontactez nous !

          <br><br> Cordialement, la Team DigitalSport.


        </section>

      </main>
    </body>
    ';



    $headers = "From: \"DigitalSport Team\"<contact@digitalsport.com>\n";
    $headers .= "Reply-To: contact@digitalsport.com\n";
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";

    mail($mail,$sujet,$message,$headers);

}

function mailInscription () // send a mail to confirm the registering
{

    $mail = strtolower($_POST['mail']);
    $pseudo = $_POST['pseudo'];

    $sujet = 'DigitalSport - Nouvelle Inscription';

    // message is HTML iso-8859-1 encoded
    $message = '
    <body>
      <main>

        <h2>Digital Sport - Nouvelle Inscription 💪</h2>

        <section>

          <h3>Bonjour,</h3> <br>

          Votre compte sur DigitalSport a bien été créé. Pour rappel, vous avez choisi "'.$pseudo.'" comme pseudonyme. Vous aurez besoin de votre adresse mail et de votre mot de passe pour vous connecter.

        Commencez votre entraînement dès maintenant en souscrivant un abonnement : <br><br>

        <a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=pagemembre&action=abonnements">Page de connexion Digital Sport</a> <br><br>

          Nous sommes heureux de vous accueillir, et nous vous souhaitons la bienvenue dans votre nouvelle salle de sport préférée !

          <br><br> Cordialement, la Team DigitalSport.


        </section>

      </main>
    </body>
    ';


    // define the sender and the reply-to mail
    $headers = "From: \"DigitalSport Team\"<contact@digitalsport.com>\n";
    $headers .= "Reply-To: contact@digitalsport.com\n";
    $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";

    // send the mail
    mail($mail,$sujet,$message,$headers);

}

function tryChangePassword() {

    $local_table = 'client';

    $local_idclient = $_SESSION['idclient'];

    $local_leMDP = $_POST['actual_password'];

    $local_newMDP = $_POST['new_password'];


    $result = select($local_table,['motdepasse'],[['idclient','=',$local_idclient]], '', 0, 0);

if (isset($result[0])) {

        $resultsql = $result[0];

            $isPasswordCorrect = password_verify($local_leMDP, $resultsql['motdepasse']);

        $success = $isPasswordCorrect;


        if ($success == true) {

        $chaine_hash = password_hash($local_newMDP, PASSWORD_DEFAULT);

        $local_table = 'client';
        $local_fieldsParams = ["motdepasse" => $chaine_hash];
        $local_whereParams = ['idclient','=',$local_idclient];

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

function checkClientConnexion() {
    if (!isset($_COOKIE['is_connected']) or $_COOKIE['is_connected'] == false){
        header('Location: https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=connexion&action=index'); // redirect on connexion page
        exit;
    }
}


?>
