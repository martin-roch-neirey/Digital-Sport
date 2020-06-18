 <!-- load style -->
	<main>

		<br><br>

		<menu class='menu'>

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
				$dataMaterial = $data[0][1];
				print("<form class='form_update_exercise' action=". get_url('coach', 'update_exercise_proceed') ." method='POST'>");
				foreach ($dataExercise as $ligne) { // show result: list user's caracteristic with a table
						$idexercice=$ligne["idexercice"];
						$nomexo=$ligne["nomexo"];
						$description=$ligne["description"];
						$lienvideo=$ligne["lienvideo"];
						$lienimage=$ligne["lienimage"];
						$lienmusique=$ligne["lienmusique"];

						echo "

						<input type='hidden' name='idexercice' value=".$idexercice.">

							<div>
								<table class='table-content'>
									<tbody>
										<div>
											<tr>
												<td>Nom</td>
												<td><input  minlength='1' maxlength='255' name='nomexo' value='".$nomexo."' required></td>
											</tr>
											<tr>
												<td>Description</td>
												<td><textarea minlength='1' class='text-area-exercise' maxlength='255' name='description' required>".$description."</textarea></td>
											</tr>
											<tr>
												<td>Lien Vidéo</td>
												<td><input minlength='1' name='lienvideo' value=".$lienvideo."></td>
											</tr>
											<tr>
												<td>Lien Image</td>
												<td><input minlength='1' name='lienimage' value=".$lienimage."></td>
											</tr>
											<tr>
												<td>Lien Musique</td>
												<td><input minlength='1' name='lienmusique' value=".$lienmusique."></td>
											</tr>
											<tr>
												<td>Matériel</td>
												<td>
						";

													print('<select name="refmateriel">'); // show a drop-down box to select 'refmateriel'
													foreach ($dataMaterial as $ligne) {
													    print( '<option value='.$ligne["idmateriel"].'>'. $ligne["nommateriel"] .'</option>');
													}
													print('</select>');
												echo "</td>
											</tr>
										</div>
									</tbody>
								</table>
												";

					}
					echo '<button type="submit" class="button_update_exercice button">Enregistrer</button>';
					echo '</div>';
				echo '</form>';
			?>

		</menu>

		<br><br>

	</main>


