<?php

//----------------------------- load needed functions from model -----------------------------

require_once(MODEL_PATH . '/table_coach.php');

//----------------------------- show index, coach connexion page -----------------------------

function index() // connexion page
{
  display_view('connexion_coach/index', [], false);
}

//----------------------------- try connexion for coach -----------------------------

function connexion_try_coach() { // trying to connect a new coach

  $result = ConnexionTryCoach(); // try to connect coach (verify mail and password)

  $resultsql = $result[0];
  $success = $result[1];

  if ($success == true) {
    $_SESSION['prenomcoach'] = $resultsql['prenom'];
    $_SESSION['idcoach'] = $resultsql['idcoach'];
    setcookie('is_coach_connected', true, time() + 3600, null, null, false, true);

    header('Location: '. get_url('coach','index')); // redirect on the view to show index coach page

  } else {
    display_view('connexion_coach/index', ['error_message' => 'Echec de la connexion, identifiants incorrects.'], false);
  }

}

//----------------------------- disconnect coach -----------------------------

function disconnect_coach() { // disconect coach by setting his cookie session to 'false'

  setcookie('is_coach_connected', false, time(), null, null, false, true);

  header('Location: '. get_url('connexion_coach','index')); // redirect on the view to show index connexion_coach page
  setcookie('cookie_success_message', 'Vous avez été déconnecté', time() + 1, null, null, false, true);

}


?>
