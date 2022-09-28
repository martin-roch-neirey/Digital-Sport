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
		<!-- form to register new exercise -->
 		<form class='form_add_exercise' action='<?php echo get_url('admin','add_exercise_proceed') ?>' method='POST'>
 			<div>
	 			<label>Nom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
	 				<input minlength="1" maxlength="255" type="text" name="nomexo" required>
	 			</label>
		 		
		 		<label>Description &nbsp;&nbsp;&nbsp;&nbsp; :
		 			<textarea minlength="1" type="text" name="description" required></textarea>
		 		</label>
		 		
		 		<label>Lien vidéo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
		 			<input type="text" name="lienvideo" required>	
		 		</label>
		 		
		 		<label>Lien image &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
		 			<input type="text" name="lienimage" required>	
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
		 					print('<option value="">Aucun</option>');
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
	
	
