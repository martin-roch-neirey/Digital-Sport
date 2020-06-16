<?php

//----------------------------- load needed functions from model -----------------------------

require_once(MODEL_PATH . '/table_client.php');
require_once(MODEL_PATH . '/table_prefixetel.php');
require_once(MODEL_PATH . '/table_niveau.php');

function index()
{
if (isset($_COOKIE['is_connected'])) {

    if ($_COOKIE['is_connected'] == true) {

   display_view('pagemembre/index', []);

  } else {

   display_view('connexion/index', ['success_message' => 'Vous êtes déconnecté.'], false);

  }

} else {

  display_view('connexion/index', [], false);
}
}

function informations()
{
if (isset($_COOKIE['is_connected'])) {

    if ($_COOKIE['is_connected'] == true) {

     $_POST['iduser'] = $_SESSION['idclient'];

     $result = getClientProfile();

    if (empty($result)){ // check if requested profile exists
      $local_data = ['success_message'=>"Nous n'avons pas trouvé votre profil."];
   } else{
      $local_data = ['success_message'=>'Il y a un resultat', $result];
   }

  display_view('pagemembre/informations', [$local_data], true);


  } else {

   display_view('connexion/index', ['success_message' => 'Vous êtes déconnecté.'], false);

  }

} else {

  display_view('connexion/index', [], false);
}
}

function abonnements() {
if (isset($_COOKIE['is_connected'])) {

    if ($_COOKIE['is_connected'] == true) {

      $_POST['iduser'] = $_SESSION['idclient'];

      $result = getRefAbo();

     if (empty($result)){ // check if requested profile exists
        $local_data = ['success_message'=>"Nous n'avons pas trouvé votre profil d'abonnement."];
   } else{
        $local_data = ['success_message'=>'Il y a un resultat', $result];
   }


   display_view('pagemembre/abonnements', [$local_data], true);

  } else {

   display_view('connexion/index', ['success_message' => 'Vous êtes déconnecté.'], false);

  }

} else {

  display_view('connexion/index', [], false);
}



}

function update_user_profile() {
if (isset($_COOKIE['is_connected'])) {

    if ($_COOKIE['is_connected'] == true) {

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

  } else {

   display_view('connexion/index', ['success_message' => 'Vous êtes déconnecté.'], false);

  }

} else {

  display_view('connexion/index', [], false);
}
}

function update_user_profile_proceed() {
if (isset($_COOKIE['is_connected'])) {

    if ($_COOKIE['is_connected'] == true) {

      $_POST['iduser'] = $_SESSION['idclient'];

      $result = getClientProfile();

    if (empty($result)){ // check if requested profile exists
      $local_data = ['success_message'=>"Nous n'avons pas trouvé votre profil."];
   } else{
      $local_data = ['success_message'=>'Il y a un resultat', $result];






$oldInfo = getClientProfile(); // get old information from database
  $newInfo = getModificationClientProfile(); // get new information from website (with update)


  $array_diff = array_diff_assoc($newInfo,$oldInfo[0]); // get the information to update by comparing old and new information
  $local_data = [[$newInfo],getOrderedPrefixPhone(),getOrderedLevel(), 'action_message'=>'client','presentation_message'=>'Modification profil client :','success_message' => 'Votre profil a été mis à jour ! 💪'];

  if (!empty($array_diff)) // check whether the information has been changed
  {
    if (array_key_exists('mail', $array_diff)){ // check if the mail address is unique
      $existingEmail = verifyExistingClientMail($array_diff['mail']);
    }

    if (!empty($existingEmail)){
      $local_data = [[$newInfo],getOrderedPrefixPhone(),getOrderedLevel(),'action_message'=>'client', 'presentation_message'=>'Modification profil client :', 'error_message' => 'Cet email est déja utilisé par un autre client.'];
      display_view('pagemembre/index', $local_data, true);
      exit;
    }

    updateClientProfile($newInfo['idclient'],$array_diff); // update information in the database with the new information of the client

    display_view('pagemembre/index', $local_data, true);
    exit;
  } else {
    $local_data = [[$newInfo],getOrderedPrefixPhone(),getOrderedLevel(),'action_message'=>'client', 'presentation_message'=>'Modification profil client :', 'error_message' => "Aucune information n'a été modifiée !"];
    display_view('pagemembre/index', $local_data, true);
    exit;
  }

   }

   display_view('pagemembre/update_user_profile', [$local_data], true);

  } else {

   display_view('connexion/index', ['success_message' => 'Vous êtes déconnecté.'], false);

  }

} else {

  display_view('connexion/index', [], false);
}
}




function deconnexion_member() {

setcookie('is_connected', false, time() + 10, null, null, false, true);
display_view('home/index', ['deconnexion_message' => "Vous êtes bien déconnecté."]);

}

function cancel_sub() {

if (isset($_COOKIE['is_connected'])) {

    if ($_COOKIE['is_connected'] == true) {

      // HERE

   $success = cancelSub($_SESSION['idclient']);

   $_SESSION['Sub'] = null;

    display_view('pagemembre/cancel_sub', ['success_message' => 'Abonnement résilié !'], true);

  } else {

   display_view('connexion/index', ['success_message' => 'Vous êtes déconnecté.'], false);

  }

} else {

  display_view('connexion/index', [], false);
}


}

function choose_sub() {

if (isset($_COOKIE['is_connected'])) {

    if ($_COOKIE['is_connected'] == true) {

      // HERE

  display_view('pagemembre/choose_sub', [], true);

  } else {

   display_view('connexion/index', ['success_message' => 'Vous êtes déconnecté.'], false);

  }

} else {

  display_view('connexion/index', [], false);
}

}

function choose_sub_recap() {

  if (isset($_COOKIE['is_connected'])) {

    if ($_COOKIE['is_connected'] == true) {

      // HERE

  display_view('pagemembre/choose_sub_recap', [], true);

  } else {

   display_view('connexion/index', ['success_message' => 'Vous êtes déconnecté.'], false);

  }

} else {

  display_view('connexion/index', [], false);
}
}

function choose_sub_confirmed() {

  if (isset($_COOKIE['is_connected'])) {

    if ($_COOKIE['is_connected'] == true) {

      // HERE

  $success = setSub($_SESSION['idclient'], $_SESSION['SubChoose']);

  $_SESSION['Sub'] = $_SESSION['SubChoose'];

  display_view('pagemembre/index', ['success_message' => 'Commande : Votre nouvel abonnement vous a été livré !'], true);

  } else {

   display_view('connexion/index', ['success_message' => 'Vous êtes déconnecté.'], false);

  }

} else {

  display_view('connexion/index', [], false);
}

}

?>

