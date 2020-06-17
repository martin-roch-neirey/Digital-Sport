<?php

//----------------------------- load needed functions from model -----------------------------

require_once(MODEL_PATH . '/table_client.php');

function index() // Home page
{

  display_view('connexion/index', [], false);

}


function connexion_try() { // trying to connect a new client : refers to function tentativeConnexion () and getConnexionProfile() in \mvc\app\models\table_client.php

  $success = connexionTry();

  //display_view('connexion/index', $success, false);

  $resultsql = $success[0];
  $success = $success[1];

  if ($success == true) {

    // Session values declaration

    $_SESSION['prenom'] = $resultsql['prenom'];
    $_SESSION['nom'] = $resultsql['nom'];
    $_SESSION['idclient'] = $resultsql['idclient'];
    $_SESSION['refprefixetel'] = $resultsql['refprefixetel'];
    $_SESSION['refniveau'] = $resultsql['refniveau'];
    $_SESSION['Sub'] = $resultsql['reftypeabonnement'];
    setcookie('is_connected', true, time() + 3600, null, null, false, true);

    display_view('pagemembre/index', [], true);

   // isConnected('pagemembre/index', ['success_message' => 'Bonjour '.$_SESSION['prenom'].' !'], false);

   // DEBUG : print_r($success);


  } else {
    display_view('connexion/index', ['error_message' => 'Echec de la connexion, identifiants incorrects.'], false);
  }


}

//----------------------------- reset client password -----------------------------

function reset_password() // reset client password when it is forgotten
{

  display_view('connexion/reset_password', [], false);

}

function reset_password_proceed() // proceed the reset client password
{
  $local_mail = strtolower($_POST['mail']);

  if (empty(verifyExistingClientMail($local_mail))){
    display_view('connexion/reset_password', ['error_message' => "Cette adresse mail n'existe pas."], false);
  }
  else {
    resetPassword();

    header('Location: '.get_url('connexion','reset_password')); // redirect on the view to reset password with success message
    setcookie('cookie_success_message', 'Un mail avec un nouveau mot de passe vous a été envoyé ! 💪', time() + 1, null, null, false, true); // cookie to set success message

  }

}

?>
