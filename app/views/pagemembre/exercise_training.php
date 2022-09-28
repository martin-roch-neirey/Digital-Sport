<link rel="stylesheet" type="text/css" href="css/pagemembre_style.css"> <!-- load style -->
<link rel="stylesheet" type="text/css" href="css/pagemembre_exercise_training_style.css">
<main>



<?php

	print("<menu class='menu'>");
	print("<br>");
	print("<h3>Vous vous apprêtez à commencer une séance d'entraînement. 💪</h3>");
	print("<br>");

	print("<p>La DigitalSport Team vous invite à réaliser la séance dans un endroit où vous êtes en sécurité. Prenez le temps de vous préparer un espace pour vos exercices. Surtout, ne négligez pas l'échauffement qui doit être un réflexe pour tout bon sportif. Parole de Coach !</p>");
	print("<br>");

	print("<p>Nous vous invitons à choisir les caractéristiques de votre séance. Pour le bien de votre corps, il est important de cibler l'entraînement. Cependant attention : au fil de vos séances, veillez à ne négliger aucune partie musculaire ! Un corps entretenu en tout point est un corps sain. N'oubliez pas le point fondamental lors d'une séance de sport : la bouteille d'eau !</p>");
	print("<br><br>");

	print("<h3>Alors, prêt pour l'entraînement ?</h3>");
	print("<br>");

	$dataMaterial = $data[0]; // affect $data parts to var
	$dataMuscle = $data[1];
	$dataTypeTraining = $data[2];

	print("<form action=". get_url('pagemembre', 'exercise_training_proceed') ." method='POST'>");

	print("<table class='table-content'>");
		print("<thead>");
			print("<tr>");
				print("<th colspan='2'>CONFIGURATION SEANCE ⚙️</th>");
			print("</tr>");
		print("</thead>");
		print("<tbody>");
			print("<tr>");
				print("<td>Matériel</td>");
				print("<td>");

					print('<label>');
					print('<select name="refmateriel">'); // show a drop-down box to select 'refexercice'
					print( '<option value="">Aucun</option>');
					foreach ($dataMaterial as $ligne) {
					    print( '<option value='.$ligne["idmateriel"].'>'. $ligne["nommateriel"] .'</option>');
					}
					print('</select>');
					print('</label>');

				print("</td>");
			print("</tr>");
			print("<tr>");
				print("<td>Muscle</td>");
				print("<td>");

					print('<label>');
					print('<select name="refmuscle">'); // show a drop-down box to select 'refexercice'
					foreach ($dataMuscle as $ligne) {
					    print( '<option value='.$ligne["idmuscle"].'>'. $ligne["nommuscle"] .'</option>');
					}
					print('</select>');
					print('</label>');

				print("</td>");
			print("</tr>");
			print("<tr>");
				print("<td>Type de Musculation</td>");
				print("<td>");

					print('<label>');
					print('<select name="reftypemuscu">'); // show a drop-down box to select 'refexercice'
					foreach ($dataTypeTraining as $ligne) {
					    print( '<option value='.$ligne["idtypemuscu"].'>'. $ligne["nomtypemuscu"] .'</option>');
					}
					print('</select>');
					print('</label>');

				print("</td>");
			print("</tr>");
		print("</tbody>");
	print("</table>");



		print("<br><br>");
		print('<p>Chaque exercice a été pensé en fonction du niveau que vous avez renseigné. Vous allez suivre un entraînement constitué de 3 exercices choisis aléatoirement, pour chacun d\'entre eux vous aurez accès à une image et une vidéo explicative. Vous aurez à votre disposition un chronomètre personnel. Lorsque vous serez prêt, cliquez sur le bouton "Commencer"</p>');

// Error message if no exercise found

	if (isset($error_message)){
		print("<br><h3>");
		print($error_message);

		// DEBUG :
		// print_r($data);
		print("</h3>");
	}
		print("<br>");
		print('<button type="submit" class="button">Commencer</button>');

		print('</form>');



	print("</menu>");

	print("<br><br>");
?>

</main>

