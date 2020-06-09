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
    $_SESSION['prenom'] = $resultsql['prenom'];
    $_SESSION['nom'] = $resultsql['nom'];
    $_SESSION['idclient'] = $resultsql['idclient'];
    $_SESSION['refprefixetel'] = $resultsql['refprefixetel'];
    $_SESSION['refniveau'] = $resultsql['refniveau'];
    $_SESSION['Sub'] = $resultsql['reftypeabonnement'];
    setcookie('is_connected', true, time() + 3600, null, null, false, true);

    display_view('pagemembre/index', ['success_message' => ''], false);

   // isConnected('pagemembre/index', ['success_message' => 'Bonjour '.$_SESSION['prenom'].' !'], false);





    //print_r($success);


  } else {
    display_view('connexion/index', ['success_message' => 'Echec de la connexion, identifiants incorrects.'], false);
  }


}























?>
