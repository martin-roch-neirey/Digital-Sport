<?php

//----------------------------- load needed functions from model -----------------------------

require_once(MODEL_PATH . '/table_client.php');
require_once(MODEL_PATH . '/table_prefixetel.php');
require_once(MODEL_PATH . '/table_niveau.php');
require_once(MODEL_PATH . '/table_materiel.php');
require_once(MODEL_PATH . '/table_muscle.php');
require_once(MODEL_PATH . '/table_typemuscu.php');
require_once(MODEL_PATH . '/table_choixexo.php');
require_once(MODEL_PATH . '/table_coach.php');
require_once(MODEL_PATH . '/table_exercice.php');
require_once(MODEL_PATH . '/table_contact.php');
require_once(MODEL_PATH . '/table_seanceclient.php');
require_once(MODEL_PATH . '/table_seancecoach.php');

//----------------------------- show coach index page -----------------------------

function index() // coach index page
{
  checkCoachConnexion();

  $local_data = ['presentation_message' => '📉 Statistiques DigitalSport 📉', // message de presentation
           ['Clients :',countClient()], // ['message',countFunction]
           ['Exercices enregistrés :',countExercise()],
           ['Matériels enregistrés :',countMaterial()],
           ['Messages de contact :',countContactMessage()],
             ['Séances client réalisées :',countSessionClient()],
           ['Séances coach réalisées :',countSessionCoach()]
          ];

  display_view('coach/index', $local_data);
}

//----------------------------- show exercise -----------------------------

function show_exercise () // show all exercise
{
  checkCoachConnexion();
  $local_data = getExercise(); // get all exercise to show

  display_view('coach/show_exercise', ['presentation_message' => '📋 Exercices existants 📋', 'success_message' => '', $local_data]);
}

//----------------------------- delete exercise -----------------------------

function delete_exercise() { // show exercise to delete exercise

  checkCoachConnexion();

  deleteExerciseProceed();

  header('Location: '. get_url('coach','show_exercise')); // redirect on the view to show exercise with success message
  setcookie('cookie_success_message', 'Exercice supprimé ! 💪', time() + 1, null, null, false, true); // cookie to set success message

}

function delete_exercise_proceed() {

  checkCoachConnexion();

  deleteExerciseProceed();

  header('Location: '. get_url('coach','show_exercise')); // redirect on the view to show exercise with success message
  setcookie('cookie_success_message', 'Exercice supprimé ! 💪', time() + 1, null, null, false, true); // cookie to set success message
}

//----------------------------- update exercise -----------------------------

function update_exercise () // show exercise to update
{
  checkCoachConnexion();

  $local_data = [getExerciseInformation(),getOrderedMaterial()]; // get all exercise to update

  display_view('coach/update_exercise', ['presentation_message' => '🔧 Exercice à modifier 🔧', $local_data]);
}

//----------------------------- update exercise -----------------------------

function update_exercise_proceed () // proceeds to the exercise update
{
  checkCoachConnexion();
  $oldInfo = getExerciseInformation(); // get old information from database
  $newInfo = getExerciseModification(); // get new information from website (with update)


  $array_diff = array_diff_assoc($newInfo,$oldInfo[0]); // get the information to update by comparing old and new information
  $local_data = [[[$newInfo],getOrderedMaterial()],'presentation_message'=>'🔧 Exercice à Modifier 🔧','success_message' => 'Exercice édité avec succès ! 💪'];

  if (!empty($array_diff)) // check whether the information has been changed
  {
    updateExercise($newInfo['idexercice'],$array_diff); // update information in the database with the new information of the exercise

    display_view('coach/update_exercise', $local_data);
  } else {
    $local_data = [[[$newInfo],getOrderedMaterial()],'presentation_message'=>'🔧 Exercice à Modifier 🔧', 'error_message' => "⚠️ Aucune information n'a été modifiée ⚠️"];
    display_view('coach/update_exercise', $local_data);
  }
}

//----------------------------- add exercise -----------------------------

function add_exercise () // show form to add exercise
{
  checkCoachConnexion();
  $local_data = getMaterial(); // get all material to choose

  display_view('coach/add_exercise', ['presentation_message' => '🏋️‍♀️ Ajout d\'un Exercice 🏋️‍♀️', $local_data]);
}

function add_exercise_proceed () // proceeds to the exercise addition
{
  checkCoachConnexion();
  addExerciseProceed();

  header('Location: '. get_url('coach','show_exercise')); // redirect on the view to show exercise with success message
  setcookie('cookie_success_message', 'Exercice ajouté ! 💪', time() + 1, null, null, false, true); // cookie to set success message
}

//----------------------------- show coach information/profile -----------------------------

function informations() // show coach information/profile
{
  checkCoachConnexion();

  $_POST['iduser'] = $_SESSION['idcoach'];

     $result = getCoachProfile();

    if (empty($result)){ // check if requested profile exists
      $local_data = ['success_message'=>"Nous n'avons pas trouvé votre profil."];
   } else{
      $local_data = ['success_message'=>'Il y a un resultat', $result];
   }

  display_view('coach/informations', [$local_data], true);
}

//----------------------------- update material -----------------------------

function update_material () // show form to update material
{
  checkCoachConnexion();
  $local_data = getMaterial();

  display_view('coach/update_material', ['presentation_message' => '🏈 Modification Matériel 🏈', 'success_message' => '', $local_data]);
}

//----------------------------- delete material -----------------------------

function delete_material_proceed () // proceeds to the material deletion
{
  checkCoachConnexion();
  deleteMaterialProceed();

  header('Location: '. get_url('coach','update_material')); // redirect on the view to show updated material with success message

  setcookie('cookie_success_message', 'Matériel supprimé ! 💪', time() + 1, null, null, false, true); // cookie to set success message
}

//----------------------------- add material -----------------------------

function add_material_proceed () // proceeds to the material addition
{
  checkCoachConnexion();
  addMaterialProceed();

  header('Location: '. get_url('coach','update_material')); // redirect on the view to show updated material with success message

  setcookie('cookie_success_message', 'Matériel ajouté ! 💪 ', time() + 1, null, null, false, true); // cookie to set success message
}

//----------------------------- show exercise training -----------------------------

function show_exercise_training () // show all exercise training
{
  checkCoachConnexion();

  $local_data = showExercisetraining();

  display_view('coach/show_exercise_training', ['presentation_message' => "⚾️ Exercices d'Entraînements ⚾️", $local_data]);
}

//----------------------------- add exercise training -----------------------------

function add_exercise_training () // show form to add exercise training
{
  checkCoachConnexion();

  $local_data = [getExercise(),getMuscle(),getTypeTraining(),getLevel()];

  display_view('coach/add_exercise_training', ['presentation_message' => "⚾️ Ajout d'un Exercice d'Entraînement ⚾️", $local_data]);
}

function add_exercise_training_proceed () // proceeds to the exercise training addition
{
  checkCoachConnexion();

  $result = checkExistingExerciceTraining();

  if (!empty($result)){ // check if the training exercise already exists or not
    $local_data = [getExercise(),getMuscle(),getTypeTraining(),getLevel()];
    display_view('coach/add_exercise_training', ['presentation_message' => "Exercices d'Entraînement :", 'error_message' => "⚠️ Cet exercice d'entraînement existe déjà ! ⚠️", $local_data]);
  } else{
    addExerciseTrainingProceed();

    header('Location: '. get_url('coach','show_exercise_training')); // redirect on the view to show  exercise training with success message

    setcookie('cookie_success_message', "Exercice d'entraînement ajouté ! 💪", time() + 1, null, null, false, true); // cookie to set success message
  }
}

//----------------------------- delete exercise training -----------------------------

function delete_exercise_training_proceed () // proceeds to the exercise training deletion
{
  checkCoachConnexion();
  deleteExerciseTrainingProceed();

  header('Location: '. get_url('coach','show_exercise_training')); // redirect on the view to show  exercise training with success message

  setcookie('cookie_success_message', "Exercice d'entraînement supprimé ! 💪", time() + 1, null, null, false, true); // cookie to set success message
}

//----------------------------- update exercise training -----------------------------

function update_exercise_training () // show form to update exercise training
{
  checkCoachConnexion();

  $local_data = [getOrderedExercise(),getOrderedMuscle(),getOrderedTypeTraining(),getOrderedLevel(),getExerciseTrainingInformation()];

  display_view('coach/update_exercise_training', ['presentation_message' => "🔧 Modification d'Exercice d'Entraînement 🔧", $local_data]);
}

function update_exercise_training_proceed () // proceeds to the exercise training update
{
  checkCoachConnexion();
  $oldInfo = getExerciseTrainingInformation(); // get old information from database
  $newInfo = getExerciseTrainingModification(); // get new information from website (with update)

  $array_diff = array_diff_assoc($newInfo,$oldInfo[0]); // get the information to update by comparing old and new information
  $local_data = [[getOrderedExercise(),getOrderedMuscle(),getOrderedTypeTraining(),getOrderedLevel(),[$newInfo]],'presentation_message'=>"🔧 Modification d'Exercice d'Entraînement 🔧",'success_message' => "Exercice d'entraînement édité avec succès ! 💪"];

  if (!empty($array_diff)) // check whether the information has been changed
  {
    updateExerciseTraining($newInfo['idchoixexo'],$array_diff); // update information in the database with the new information of the training exercise

    display_view('coach/update_exercise_training', $local_data);
  } else {
    $local_data = [[getOrderedExercise(),getOrderedMuscle(),getOrderedTypeTraining(),getOrderedLevel(),[$newInfo]],'presentation_message'=>"🔧 Modification d'Exercice d'Entraînement 🔧", 'error_message' => "⚠️ Aucune information n'a été modifiée ⚠️"];
    display_view('coach/update_exercise_training', $local_data);
  }
}

//----------------------------- show form to change password -----------------------------

function change_password() // show form to change password
{
  checkCoachConnexion();

  display_view('coach/change_password', [], true);
}

function change_password_proceed() { // proceeds the password changement

  checkCoachConnexion();

  $proceed = tryChangeCoachPassword();

  if ($proceed == true) {
      $success_message = "Votre mot de passe a bien été modifié. 💪";
  } else {
    $success_message = "⚠️ Mot de passe actuel erroné. Annulation du changement de mot de passe. ⚠️";
  }

  $local_data = $success_message;

  header('Location: '.get_url('coach','change_password'));
  setcookie('cookie_success_message', $success_message, time() + 1, null, null, false, true); // cookie to set success message
}

//----------------------------- update coach profile -----------------------------

function update_user_profile()  // show form to update coach profile
{
  checkCoachConnexion();

  $_POST['iduser'] = $_SESSION['idcoach'];
  $_POST["refprefixetel"] = null;
  $_POST["refniveau"] = null;

  $result = getCoachProfile();

  if (empty($result)){ // check if requested profile exists - DEBUG
    $local_data = ['success_message'=>"Nous n'avons pas trouvé votre profil."];
  } else{
    $local_data = ['success_message'=>'Il y a un resultat', $result, getOrderedPrefixPhone(), getOrderedLevel()];
  }

  display_view('coach/update_user_profile', [$local_data], true);
}

function update_user_profile_proceed() { // proceeds coach profile update

  checkCoachConnexion();
  $_POST['iduser'] = $_SESSION['idcoach'];

  $result = getCoachProfile();

  if (empty($result)){ // check if requested profile exists
    $local_data = ['success_message'=>"Nous n'avons pas trouvé votre profil."];
  } else{
    $local_data = ['success_message'=>'Il y a un resultat', $result];

    $oldInfo = getCoachProfile(); // get old information from database
    $newInfo = getModificationCoachProfile(); // get new information from website (with update)


    $array_diff = array_diff_assoc($newInfo,$oldInfo[0]); // get the information to update by comparing old and new information

    $success_message = "Votre profil a été mis à jour ! 💪";

    if (!empty($array_diff)) { // check whether the information has been changed
      if (array_key_exists('mail', $array_diff)){ // check if the mail address is unique

        $existingEmail = verifyExistingCoachMail($array_diff['mail']);
      }
      if (!empty($existingEmail)){

        $success_message = "Erreur : Cet email est déja utilisé par un autre coach.";
        header('Location: '.get_url('coach','index'));
        setcookie('cookie_success_message', $success_message, time() + 1, null, null, false, true); // cookie to set success message
        exit;

      }

      updateCoachProfile($newInfo['idcoach'],$array_diff); // update information in the database with the new information of the coach
      // display_view('pagemembre/index', $local_data, true);
      header('Location: '.get_url('coach','index'));
      setcookie('cookie_success_message', $success_message, time() + 1, null, null, false, true); // cookie to set success message
      exit;

    } else {

      $success_message = "Erreur : Aucune information n'a été modifiée.";
      header('Location: '.get_url('coach','index'));
      setcookie('cookie_success_message', $success_message, time() + 1, null, null, false, true); // cookie to set success message
      exit;

    }
  }
  display_view('coach/update_user_profile', [$local_data], true);
}

?>
