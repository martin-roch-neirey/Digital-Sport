	<link rel="stylesheet" type="text/css" href="css/coach_style.css"> <!-- load style -->
	<main>
		<br><br>
		<menu class="menu">
		<?php
			echo '<h3 class="presentation_message title-menu">'.$presentation_message.'</h3>'; // show several message (presentation/success/error)
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

			print("<form action=". get_url('coach', 'add_exercise_training_proceed') ." method='POST'>");
				print("<div>");

					print("<table class='table-content'>");
						print("<tbody>");
							print("<div>");
								print("<tr>");
									print("<td>Exercice</td>");
									print("<td>");
										print('<select name="refexercice">');
											foreach ($dataExercise as $ligne) {
								   		 print( '<option value='.$ligne["idexercice"].'>'. $ligne["nomexo"] .'</option>');
											}
										print('</select>');
									print("</td>");
								print("</tr>");

								print("<tr>");
									print("<td>Muscle</td>");
									print("<td>");
										print('<select name="refmuscle">');
											foreach ($dataMuscle as $ligne) {
					   					print( '<option value='.$ligne["idmuscle"].'>'. $ligne["nommuscle"] .'</option>');
											}
										print('</select>');
									print("</td>");
								print("</tr>");

								print("<tr>");
									print("<td>Type de Musculation</td>");
									print("<td>");
										print('<select name="reftypemuscu">');
											foreach ($dataTypeTraining as $ligne) {
					   					print( '<option value='.$ligne["idtypemuscu"].'>'. $ligne["nomtypemuscu"] .'</option>');
											}
										print('</select>');
									print("</td>");
								print("</tr>");

								print("<tr>");
									print("<td>Niveau</td>");
									print("<td>");
										print('<select name="refniveau">');
											foreach ($dataLevel as $ligne) {
										  print( '<option value='.$ligne["idniveau"].'>'. $ligne["nomniveau"] .'</option>');
											}
										print('</select>');
									print("</td>");
								print("</tr>");

								print("<tr>");
									print("<td>Répétitions</td>");
									print("<td>");
										echo "
												<input type='number' name='nbrepetition' minlength='1' maxlength='3' required>
										";
									print("</td>");
								print("</tr>");

								print("<tr>");
									print("<td>Temps (secondes)</td>");
									print("<td>");
										echo "
												<input type='number' name='vitesse' minlength='1' maxlength='3' required>
										";
									print("</td>");
								print("</tr>");
							print("</div>");
						print("</tbody>");
					print("</table>");

					echo '<button type="submit" class="button_add_exercice_training button">Enregistrer</button>';
				echo '</div>';
			echo '</form>';
		?>

	</menu>
	<br><br>
	</main>


