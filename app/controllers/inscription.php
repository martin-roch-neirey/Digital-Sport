<?php

//----------------------------- load needed functions from model -----------------------------

require_once(MODEL_PATH . '/table_client.php');
require_once(MODEL_PATH . '/table_prefixetel.php');

//----------------------------- defined functions about registering a new client in database -----------------------------

function index() // Home page
{

  $local_data = getPrefixPhone(); // refers to table_prefixetel.php in \mvc\app\models\

// $local_data in a table to fix tentative_inscription bug

  display_view('inscription/index', [$local_data], false);

}

function tentative_inscription() { // trying to register a new client : refers to function enregistreClient () in \mvc\app\models\table_client.php

// Checks
// Check if pseudo already exists

$mail = $_POST['mail'];
$pseudo = $_POST['pseudo'];

$checkMail = verifyExistingClientMail($mail);
$checkPseudo = verifyExistingClientPseudo($pseudo);

$local_data = getPrefixPhone();

if (!empty($checkMail)) {
  display_view('inscription/index', ['success_message' => "Cette adresse mail est déjà utilisée !", $local_data], false);
  exit;
} else if (!empty($checkPseudo)) {
  display_view('inscription/index', ['success_message' => "Ce pseudonyme est déjà utilisé !", $local_data], false);
  exit;
} else {

$success = enregistreClient();


// DEBUG on connexion page after inscription success :
// print_r($success);

if (!empty($success)) {
display_view('connexion/index', ['success_message' => 'Vous êtes inscris ! Connectez-vous pour accéder à votre espace membre.'], false);
} else {
  display_view('inscription/index', ['success_message' => "Echec de l'inscription."], false);
  }

}



  /*
  if ($success) {
    display_view('connexion/index', ['success_message' => 'Vous êtes inscris ! Connectez-vous pour accéder à votre espace membre.'], false);
  } else {
    display_view('inscription/index', ['success_message' => "Echec de l'inscription."], false);
  }
  */

}

?>