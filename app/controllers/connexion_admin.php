<?php

//----------------------------- load needed functions from model -----------------------------

require_once(MODEL_PATH . '/table_admin.php');

//----------------------------- show index, admin connexion page -----------------------------

function index() // connexion page
{

  display_view('connexion_admin/index', [], false);

}

//----------------------------- try connexion for admin -----------------------------

function connexion_try_admin() { // trying to connect a new admin : refers to function tentativeConnexion () and getConnexionProfile() in \mvc\app\models\table_client.php

  $result = ConnexionTryAdmin(); // try to connect admin (verify mail and password)

  $resultsql = $result[0];
  $success = $result[1];

  if ($success == true) {
    $_SESSION['nomutilisateur'] = $resultsql['nomutilisateur'];
    setcookie('is_admin_connected', true, time() + 3600, null, null, false, true);

    header('Location: https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=index'); // redirect on the view to show index admin page

  } else {
    display_view('connexion_admin/index', ['error_message' => 'Echec de la connexion, identifiants incorrects.'], false);
  }

}

function disconnect_admin() { // disconect admin by deleting his cookie session

  setcookie('is_admin_connected', false, time(), null, null, false, true);

  header('Location: https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=connexion_admin&action=index');
  setcookie('cookie_success_message', 'Vous avez été déconnecté', time() + 1, null, null, false, true);

}























?>
