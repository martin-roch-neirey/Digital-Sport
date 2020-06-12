	<link rel="stylesheet" type="text/css" href="css/admin_index.css"> <!-- load style -->
	<main>
		<h2>Panel Admin</h2>
		<?php
			echo '<h3 class="presentation_message">'.$presentation_message.'</h3>'; // show several message (presentation/success/error)
			if (isset($error_message)){
				echo '<h4 class="error_message">'.$error_message.'</h4>' ;
			}
			if (isset($success_message)){
				echo '<h4 class="success_message">'.$success_message.'</h4>' ;
			}

		?>
		<!-- form to register new exercise -->
 		<form class='form_add_exercise' action="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=add_exercise_proceed" method="POST">
 			<div>
	 			<label>Nom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
	 				<input minlength="1" maxlength="255" type="text" name="nomexercice" required>
	 			</label>
		 		
		 		<label>Description &nbsp;&nbsp;&nbsp;&nbsp; :
		 			<input minlength="1" maxlength="255" type="" name="description" required>	
		 		</label>
		 		
		 		<label>Lien vidéo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
		 			<input type="text" name="lienvideo">	
		 		</label>
		 		
		 		<label>Lien image &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
		 			<input type="text" name="lienimage">	
		 		</label>
		 		
		 		<label>Lien musique &nbsp; :
		 			<input type="text" name="lienmusique">	
		 		</label>			
				
					<!-- drop-down box to choose material  -->
		 		<label>Matériel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
		 		<?php
		 			foreach ($data as $tab) {
		 				if (is_array($tab)){
		 					print('<select name="refmateriel">');
		                	foreach ($tab as $ligne) {
		                        print( '<option value='.$ligne["idmateriel"].'>'. $ligne["nommateriel"] .'</option>');
		                	}
		                	print('</select>'); 
		 				}
		 			}           
		        ?>
		        </label>
		        <button type="submit">Ajouter !</button>
	        </div>
        </form>
	</main>
	
	
