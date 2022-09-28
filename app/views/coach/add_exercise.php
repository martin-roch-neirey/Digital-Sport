 <!-- load style -->
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
		<!-- form to register new exercise -->
 		<form class='form_add_exercise' action='<?php echo get_url('coach','add_exercise_proceed') ?>' method='POST'>

			<table class="table-content">
				<tbody>
					<div>
						<tr>
		            <td>Nom</td>
		            <td><input minlength="1" maxlength="255" type="text" name="nomexo" required></td>
		        </tr>
		        <tr>
		            <td>Description</td>
		            <td><textarea minlength="1" type="" name="description" class="text-area-exercise" required></textarea></td>
		        </tr>
		        <tr>
		            <td>Lien Vidéo</td>
		            <td><input type="text" name="lienvideo" required></td>
		        </tr>
		        <tr>
		            <td>Lien Image</td>
		            <td><input type="text" name="lienimage" required></td>
		        </tr>
		        <tr>
		            <td>Lien Musique</td>
		            <td><input type="text" name="lienmusique"></td>
		        </tr>
		        <tr>
		            <td>Matériel</td>
		            <td>
									<!---- Drop-bow shown for select material ---->

							     <?php
							 			foreach ($data as $tab) {
							 				if (is_array($tab)){
							 					print('<select name="refmateriel">');
							 					print('<option value="">Aucun</option>');
							                	foreach ($tab as $ligne) {
							                        print( '<option value='.$ligne["idmateriel"].'>'. $ligne["nommateriel"] .'</option>');
							                	}
							                	print('</select>');
							 				}
							 			}
							     ?>

		       			</td>
		        </tr>






	        </div>

					</tbody>
				</table>



<button type="submit" class="button">Ajouter !</button>
        </form>

			<br>

		</menu>

		<br><br>

	</main>


