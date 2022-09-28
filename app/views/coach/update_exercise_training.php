	<link rel="stylesheet" type="text/css" href="css/coach_style.css"> <!-- load style -->
	<main>

		<br><br>

		<menu class="menu">
			<?php
				echo '<h3 class="presentation_messag title-menu">'.$presentation_message.'</h3>'; // show several message (presentation/success/error)
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
						echo "<table class='table-content'>
							<tbody>
								<div>
									<tr>
										<td>Exercice</td>
										<td>
						";

					foreach ($dataTraining as $ligne) { // show result: list user's caracteristic with a table
						$idchoixexo=$ligne['idchoixexo'];
						$nbrepetition=$ligne["nbrepetition"];
						$vitesse=$ligne["vitesse"];

						print('<select name="refexercice">'); // show a drop-down box to select 'refmateriel'
						foreach ($dataExercise as $ligne) {
						    print( '<option value='.$ligne["idexercice"].'>'. $ligne["nomexo"] .'</option>');
						}
						print('</select>');
						echo "</td>
								</tr>
								<tr>
									<td>Muscle</td>
									<td>
						";
						print('<select name="refmuscle">'); // show a drop-down box to select 'refmateriel'
						foreach ($dataMuscle as $ligne) {
						    print( '<option value='.$ligne["idmuscle"].'>'. $ligne["nommuscle"] .'</option>');
						}
						print('</select>');
						echo "</td>
								</tr>
								<tr>
									<td>Type de Musculation</td>
									<td>
						";
						print('<select name="reftypemuscu">'); // show a drop-down box to select 'refmateriel'
						foreach ($dataTypeTraining as $ligne) {
						    print( '<option value='.$ligne["idtypemuscu"].'>'. $ligne["nomtypemuscu"] .'</option>');
						}
						print('</select>');
						echo "</td>
								</tr>
								<tr>
									<td>Niveau</td>
									<td>
						";
						print('<select name="refniveau">'); // show a drop-down box to select 'refmateriel'
						foreach ($dataLevel as $ligne) {
						    print( '<option value='.$ligne["idniveau"].'>'. $ligne["nomniveau"] .'</option>');
						}
						print('</select>');
						echo "</td>
								</tr>
								<tr>
									<td>Répétitions</td>
									<td>
						";

						echo "
											<input type='number' name='nbrepetition' value=".$nbrepetition." minlength='1' maxlength='3' required>
									</td>
								</tr>
								<tr>
									<td>Temps (secondes)</td>
									<td>
											<input type='number' name='vitesse' value=".$vitesse." minlength='1' maxlength='3' required>
									</td>
								</tr>
							</div>
						</tbody>
					</table>

							<input type='hidden' name='idchoixexo' value=".$idchoixexo.">
						";

						echo '<button type="submit" class="button_update_exercice_training button" >Enregistrer</button>';
					}
					echo '</div>';
				echo '</form>';
			?>


		</menu>
		<br><br>
	</main>


