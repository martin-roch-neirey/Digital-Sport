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
			echo "<form method='POST' action=". get_url('admin','add_coach_proceed') .">";

			$dataPrefixetel = $data[0];
		?>

		<div class='div_add_coach'>
		    <label class='label_space_add_coach'>Sexe &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                <select name='sexe'>
                    <option value='F'>Femme</option>
                    <option value='H'>Homme</option>
                    <option value='N'>Neutre</option>
                </select>
            </label>
			<label class='label_space_add_coach'>Nom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
				<input  minlength='1' maxlength='255' name='nom' required>
			</label>
			<label class='label_space_add_coach'>Prénom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
				<input minlength='1' maxlength='255' name='prenom' required>
			</label>
			<label class='label_space_add_coach'>Date de naissance :
				<input type='date' name='datenss' required />
			</label>
			<label class='label_space_add_coach'>Mail &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
				<input minlength='1' maxlength='255' name='mail' required>
			</label>
			<label class='label_space_add_coach'>Téléphone :

			<?php

			print('<select class="select_refprefixetel" name="refprefixetel">'); // show a drop-down box to select 'prefixetel'
			   	foreach ($dataPrefixetel as $ligne) {
			        print( '<option value='.$ligne["idprefixetel"].'>'. $ligne["designationprefixetel"] .'</option>');
			    }
			print('</select>');

			?>
				
			<input minlength='10' maxlength='13' name='tel' required>
			</label>
			<label class='label_space_add_coach'>Taille &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
				<input minlength='1' maxlength='3' name='taille'>
			</label>
			<label class='label_space_add_coach'>Poids &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
				<input minlength='1' maxlength='3' name='poids'>
			</label>
			<label class='label_space_add_coach'>Rue &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
				<input minlength='1' name='rue' required>
			</label>
			<label class='label_space_add_coach'>Numéro de rue &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
				<input minlength='1' maxlength='8' name='numrue' required>
			</label>
			<label class='label_space_add_coach'>Ville &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
				<input minlength='1' maxlength='50' name='ville' required>
			</label>
			<label class='label_space_add_coach'>Code postal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
				<input minlength='1' maxlength='6' name='codepostal' required>
			</label>
			<label class='label_space_add_coach'>Pseudo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
				<input minlength='1' maxlength='20' name='pseudo' required>
			</label>
			<label class='label_space_add_coach'>Mot de passe &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                <input id='password' type='password' name='motdepasse' onkeyup='check_password()' minlenght='1' maxlength='50' required />
            </label>
            <label class='label_space_add_coach'>Confirmation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                <input id='confirm_password' type='password' name='confirm_password' onkeyup='check_password()' minlenght='1' maxlength='50' required />
            </label>
            <h5 id="message"></h5>
				
			<button class="button_add_coach" type="submit">Ajouter</button>
		</div>
		</form>
	</main>

	
	
