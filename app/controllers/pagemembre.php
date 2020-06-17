<?php

//----------------------------- load needed functions from model -----------------------------

require_once(MODEL_PATH . '/table_client.php');
require_once(MODEL_PATH . '/table_prefixetel.php');
require_once(MODEL_PATH . '/table_niveau.php');
require_once(MODEL_PATH . '/table_materiel.php');
require_once(MODEL_PATH . '/table_muscle.php');
require_once(MODEL_PATH . '/table_typemuscu.php');
require_once(MODEL_PATH . '/table_choixexo.php');

function index()
{

  checkClientConnexion();

  display_view('pagemembre/index', []);

}

function informations()
{

  checkClientConnexion();

  $_POST['iduser'] = $_SESSION['idclient'];

     $result = getClientProfileMemberpage();

    if (empty($result)){ // check if requested profile exists
      $local_data = ['success_message'=>"Nous n'avons pas trouvé votre profil."];
   } else{
      $local_data = ['success_message'=>'Il y a un resultat', $result];
   }

  display_view('pagemembre/informations', [$local_data], true);
}

function abonnements() {

  checkClientConnexion();

  $_POST['iduser'] = $_SESSION['idclient'];

      $result = getRefAbo();

     if (empty($result)){ // check if requested profile exists
        $local_data = ['success_message'=>"Nous n'avons pas trouvé votre profil d'abonnement."];
   } else{
        $local_data = ['success_message'=>'Il y a un resultat', $result];
   }

   display_view('pagemembre/abonnements', [$local_data], true);

}

function update_user_profile() {

  checkClientConnexion();

  $_POST['iduser'] = $_SESSION['idclient'];
      $_POST["refprefixetel"] = null;
      $_POST["refniveau"] = null;

      $result = getClientProfile();
     // $dataPrefixetel = getOrderedPrefixPhone();
    // $dataNiveau = getOrderedLevel();

    if (empty($result)){ // check if requested profile exists - DEBUG
      $local_data = ['success_message'=>"Nous n'avons pas trouvé votre profil."];
   } else{
      $local_data = ['success_message'=>'Il y a un resultat', $result, getOrderedPrefixPhone(), getOrderedLevel()];
   }

   display_view('pagemembre/update_user_profile', [$local_data], true);

}

function update_user_profile_proceed() {

  checkClientConnexion();

  $_POST['iduser'] = $_SESSION['idclient'];

      $result = getClientProfile();

    if (empty($result)){ // check if requested profile exists
      $local_data = ['success_message'=>"Nous n'avons pas trouvé votre profil."];
   } else{
      $local_data = ['success_message'=>'Il y a un resultat', $result];


$oldInfo = getClientProfile(); // get old information from database
  $newInfo = getModificationClientProfile(); // get new information from website (with update)


  $array_diff = array_diff_assoc($newInfo,$oldInfo[0]); // get the information to update by comparing old and new information

  $success_message = "Votre profil a été mis à jour ! 💪";

  if (!empty($array_diff)) // check whether the information has been changed
  {
    if (array_key_exists('mail', $array_diff)){ // check if the mail address is unique
      $existingEmail = verifyExistingClientMail($array_diff['mail']);
    }

    if (!empty($existingEmail)){

      $success_message = "Erreur : Cet email est déja utilisé par un autre client.";

      header('Location: '.get_url('pagemembre','index'));

      setcookie('cookie_success_message', $success_message, time() + 1, null, null, false, true); // cookie to set success message
      exit;
    }

    updateClientProfile($newInfo['idclient'],$array_diff); // update information in the database with the new information of the client

    // display_view('pagemembre/index', $local_data, true);

    header('Location: '.get_url('pagemembre','index'));

    setcookie('cookie_success_message', $success_message, time() + 1, null, null, false, true); // cookie to set success message
    exit;
  } else {
      $success_message = "Erreur : Aucune information n'a été modifiée.";

      header('Location: '.get_url('pagemembre','index'));

      setcookie('cookie_success_message', $success_message, time() + 1, null, null, false, true); // cookie to set success message
      exit;
  }

   }

   display_view('pagemembre/update_user_profile', [$local_data], true);

}

function deconnexion_member() {

setcookie('is_connected', false, time() + 10, null, null, false, true);
display_view('home/index', ['deconnexion_message' => "Vous êtes bien déconnecté."]);

}

function cancel_sub() {

  checkClientConnexion();

  $success = cancelSub($_SESSION['idclient']);

  $_SESSION['Sub'] = null;

  display_view('pagemembre/index', ['success_message' => 'Votre abonnement a été résilié.'], true);


}

function choose_sub() {

  checkClientConnexion();

  display_view('pagemembre/choose_sub', [], true);

}

function choose_sub_recap() {

  checkClientConnexion();

  display_view('pagemembre/choose_sub_recap', [], true);

}

function choose_sub_confirmed() {

  checkClientConnexion();

  $success = setSub($_SESSION['idclient'], $_SESSION['SubChoose']);

  $_SESSION['Sub'] = $_SESSION['SubChoose'];


header('Location: '.get_url('pagemembre','index'));

setcookie('cookie_success_message', 'Commande : Votre nouvel abonnement vous a été livré !', time() + 1, null, null, false, true); // cookie to set success message

}

function change_password() {

  checkClientConnexion();

  display_view('pagemembre/change_password', [], true);

}

function change_password_proceed() {

  checkClientConnexion();

  $proceed = tryChangePassword();


  if ($proceed == true) {

      $success_message = "Votre mot de passe a bien été modifié.";
  } else {

    $success_message = "Mot de passe actuel erroné. Annulation du changement de mot de passe.";
  }

  $local_data = $success_message;

  header('Location: '.get_url('pagemembre','index'));

  setcookie('cookie_success_message', $success_message, time() + 1, null, null, false, true); // cookie to set success message

}

function exercise_training ()
{
  checkClientConnexion();

  $local_data = [getMaterial(),getMuscle(),getTypeTraining()];
  display_view('pagemembre/exercise_training', $local_data);

}

function exercise_training_proceed ()
{

  checkClientConnexion();
  $local_data = selectClientExerciseTraining();

  if (empty($local_data)){
    $local_data = [getMaterial(),getMuscle(),getTypeTraining(),'error_message' => "Aucun exercice n'existe avec ces caractéristiques !"];
    display_view('pagemembre/exercise_training', $local_data);
  } elseif (count($local_data) <= 3) {
    display_view('pagemembre/exercise_training_proceed', $local_data, false);
  } else {
    
  }



}

?>

