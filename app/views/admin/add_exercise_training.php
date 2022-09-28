	<link rel="stylesheet" type="text/css" href="css/admin_index.css"> <!-- load style -->
	<main>
		<h2>Panel Admin 
	 		<span>utilisateur : <?php echo $_SESSION['nomutilisateur'] ?> <br>
				<button>
					<a href=<?php echo get_url('connexion_admin','disconnect_admin') ?> >Déconnexion</a>
				</button>
			</span>
		</h2>
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

			print("<form action=". get_url('admin', 'add_exercise_training_proceed') ." method='POST'>");
				print("<div>");

					print('<label class="label_add_exercise_training" >Exercice &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ');
					print('<select name="refexercice">'); // show a drop-down box to select 'refexercice'
					foreach ($dataExercise as $ligne) {
					    print( '<option value='.$ligne["idexercice"].'>'. $ligne["nomexo"] .'</option>');
					}
					print('</select>');
					print('</label>');

					print('<label class="label_add_exercise_training" >Muscle &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ');
					print('<select name="refmuscle">'); // show a drop-down box to select 'refmuscle'
					foreach ($dataMuscle as $ligne) {
					    print( '<option value='.$ligne["idmuscle"].'>'. $ligne["nommuscle"] .'</option>');
					}
					print('</select>');
					print('</label>');

					print('<label class="label_add_exercise_training" >Type de musculation : ');
					print('<select name="reftypemuscu">'); // show a drop-down box to select 'reftypemuscu'
					foreach ($dataTypeTraining as $ligne) {
					    print( '<option value='.$ligne["idtypemuscu"].'>'. $ligne["nomtypemuscu"] .'</option>');
					}
					print('</select>');
					print('</label>');

					print('<label class="label_add_exercise_training" >Niveau &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ');
					print('<select name="refniveau">'); // show a drop-down box to select 'refniveau'
					foreach ($dataLevel as $ligne) {
					    print( '<option value='.$ligne["idniveau"].'>'. $ligne["nomniveau"] .'</option>');
					}
					print('</select>');
					print('</label>');

					echo "
						<label class='label_add_exercise_training' >Répétitions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
							<input type='number' name='nbrepetition' minlength='1' maxlength='3' required>
						</label>
						<label class='label_add_exercise_training' >Temps &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
							<input type='number' name='vitesse' minlength='1' maxlength='3' required>
						</label>
					";
						
					echo '<button type="submit" class="button_add_exercice_training">Enregistrer</button>';
				echo '</div>';
			echo '</form>';
		?>
	</main>
	
	
