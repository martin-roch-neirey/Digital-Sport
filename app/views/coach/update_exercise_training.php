	<link rel="stylesheet" type="text/css" href="css/coach_style.css"> <!-- load style -->
	<main>
		<?php
			echo '<h3 class="presentation_message">'.$presentation_message.'</h3>'; // show several message (presentation/success/error)
			if (isset($error_message)){
				echo '<h4 class="error_message">'.$error_message.'</h4>' ;
			}
			if (isset($success_message)){
				echo '<h4 class="success_message">'.$success_message.'</h4>' ;
			}

		?>

		<?php
			$dataExercise = $data[0][0]; // affect $data parts to var
			$dataMuscle = $data[0][1];
			$dataTypeTraining = $data[0][2];
			$dataLevel = $data[0][3];
			$dataTraining = $data[0][4];

			print("<form action=". get_url('coach', 'update_exercise_training_proceed') ." method='POST'>");
				print("<div>");

				foreach ($dataTraining as $ligne) { // show result: list user's caracteristic with a table
					$idchoixexo=$ligne['idchoixexo'];
					$nbrepetition=$ligne["nbrepetition"];
					$vitesse=$ligne["vitesse"];

					print('<label class="label_update_exercise_training" >Exercice &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ');
					print('<select name="refexercice">'); // show a drop-down box to select 'refmateriel'
					foreach ($dataExercise as $ligne) {
					    print( '<option value='.$ligne["idexercice"].'>'. $ligne["nomexo"] .'</option>');
					}
					print('</select>');
					print('</label>');

					print('<label class="label_update_exercise_training" >Muscle &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ');
					print('<select name="refmuscle">'); // show a drop-down box to select 'refmateriel'
					foreach ($dataMuscle as $ligne) {
					    print( '<option value='.$ligne["idmuscle"].'>'. $ligne["nommuscle"] .'</option>');
					}
					print('</select>');
					print('</label>');

					print('<label class="label_update_exercise_training" >Type de musculation : ');
					print('<select name="reftypemuscu">'); // show a drop-down box to select 'refmateriel'
					foreach ($dataTypeTraining as $ligne) {
					    print( '<option value='.$ligne["idtypemuscu"].'>'. $ligne["nomtypemuscu"] .'</option>');
					}
					print('</select>');
					print('</label>');

					print('<label class="label_update_exercise_training" >Niveau &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ');
					print('<select name="refniveau">'); // show a drop-down box to select 'refmateriel'
					foreach ($dataLevel as $ligne) {
					    print( '<option value='.$ligne["idniveau"].'>'. $ligne["nomniveau"] .'</option>');
					}
					print('</select>');
					print('</label>');

					echo "
						<label class='label_update_exercise_training' >Répétitions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
							<input type='number' name='nbrepetition' value=".$nbrepetition." minlength='1' maxlength='3' required>
						</label>
						<label class='label_update_exercise_training' >Temps &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
							<input type='number' name='vitesse' value=".$vitesse." minlength='1' maxlength='3' required>
						</label>
						<input type='hidden' name='idchoixexo' value=".$idchoixexo.">
					";

					echo '<button type="submit" class="button_update_exercice_training" >Enregistrer</button>';
				}
				echo '</div>';
			echo '</form>';
		?>
	</main>


