	<link rel="stylesheet" type="text/css" href="css/admin_index.css"> <!-- load style -->
	<nav>
		<h2>Panel Admin</h2>
		<?php
			echo '<h3 id="statsTitle">'.$presentation_message.'</h3>'; // show several message (presentation/success/error)
			if (isset($error_message)){
				echo '<h4>'.$error_message.'</h4>' ;
			}
			if (isset($success_message)){
				echo '<h4>'.$success_message.'</h4>' ;
			}

		?>
		<!-- form to register new exercise -->
 		<form id="Exo_style" action="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=add_exercise_proceed" method="POST">
 			<div>
 				<div>
		 			<label>Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			 		<input minlength="1" maxlength="255" type="text" name="nomexercice" required>
 				</div>
 				<div>
			 		<label>Description : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			 		<input minlength="1" maxlength="255" type="" name="description" required>	
 				</div>
 				<div>
			 		<label>Lien vidéo : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			 		<input type="text" name="lienvideo">	
 				</div>
 				<div>
			 		<label>Lien image : &nbsp;&nbsp;&nbsp;&nbsp;</label>
			 		<input type="text" name="lienimage">	
 				</div>
 				<div>
			 		<label>Lien musique : &nbsp;</label>
			 		<input type="text" name="lienmusique">				
 				</div>
 				
 				<div>
 					<!-- drop-down box to choose material  -->
			 		<label>Matériel : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
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
			    </div>
	        </div>
	        <button type="submit">Ajouter !</button>
        </form>
	</nav>
	
	
