<?php

//----------------------------- load needed functions from model -----------------------------

require_once(MODEL_PATH . '/table_client.php');
require_once(MODEL_PATH . '/table_prefixetel.php');
require_once(MODEL_PATH . '/table_niveau.php');

//----------------------------- defined functions about registering a new client in database -----------------------------

function index() // Home page
{

  $local_data = [getPrefixPhone(), getLevel()]; // refers to table_prefixetel.php in \mvc\app\models\

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

$local_data = [getPrefixPhone(), getLevel()];

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
header('Location: '.get_url('connexion','index'));

setcookie('cookie_success_message', 'Vous êtes bien inscris ! 💪', time() + 1, null, null, false, true); // cookie to set success message

// Success Mail
mailInscription();



} else {
  display_view('inscription/index', ['success_message' => "Echec de l'inscription."], false);
  }

}


}

?>
