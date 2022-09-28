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

			if ($action_message == 'client'){ // depending on user, change form if it is a client or a coach
				echo "<form method='POST' action=". get_url('admin', 'update_client_profile_proceed') .">";
			} elseif ($action_message == 'coach'){
				echo "<form method='POST' action=". get_url('admin', 'update_coach_profile_proceed') .">";
			}

			$dataUser = $data[0]; // affect $data parts to var ('refniveau' if it is a client)
			$dataPrefixetel = $data[1];
			if ($action_message == 'client'){
				$dataNiveau = $data[2];
				$dataTypeAbonnement = $data[3];
			}

			foreach ($dataUser as $ligne) { // show result: list user's caracteristic with a table
				if ($action_message == 'client'){
						$iduser=$ligne["idclient"];
						$refniveau=$ligne["refniveau"];
						$reftypeabonnement=$ligne["reftypeabonnement"];
					} elseif ($action_message == 'coach'){
						$iduser=$ligne["idcoach"];
					}
					$nom=$ligne["nom"];
					$prenom=$ligne["prenom"];
					$mail=$ligne["mail"];
					$tel=$ligne["tel"];
					$taille=$ligne["taille"];
					$poids=$ligne["poids"];
					$rue=$ligne["rue"];
					$numrue=$ligne["numrue"];
					$ville=$ligne["ville"];
					$codepostal=$ligne["codepostal"];
					$pseudo=$ligne["pseudo"];
					$refprefixetel=$ligne["refprefixetel"];

					echo "
						<div>
							<input type='hidden' name='iduser' value=".$iduser.">
							<label class='label_space_usr_prfl'>Nom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
								<input  minlength='1' maxlength='255' name='nom' value=".$nom." required>
							</label>
							<label class='label_space_usr_prfl'>Prénom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
								<input minlength='1' maxlength='255' name='prenom' value=".$prenom." required>
							</label>
							<label class='label_space_usr_prfl'>Mail &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
								<input minlength='1' maxlength='255' name='mail' value='".$mail."' required>
							</label>
							<label class='label_space_usr_prfl'>Téléphone :
					";

					print('<select class="select_refprefixetel" name="refprefixetel">'); // show a drop-down box to select 'prefixetel'
					   	foreach ($dataPrefixetel as $ligne) {
					        print( '<option value='.$ligne["idprefixetel"].'>'. $ligne["designationprefixetel"] .'</option>');
					    }
					print('</select>');
						
					echo "  <input minlength='6' maxlength='13' name='tel' value=".$tel." required>
							</label>
							<label class='label_space_usr_prfl'>Taille &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
								<input minlength='1' maxlength='3' name='taille' value=".$taille." required>
							</label>
							<label class='label_space_usr_prfl'>Poids &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
								<input minlength='1' maxlength='3' name='poids' value=".$poids." required>
							</label>
							<label class='label_space_usr_prfl'>Rue &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
								<input minlength='1' name='rue' value='".$rue."' required>
							</label>
							<label class='label_space_usr_prfl'>Numéro de rue &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
								<input minlength='1' maxlength='8' name='numrue' value=".$numrue." required>
							</label>
							<label class='label_space_usr_prfl'>Ville &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
								<input minlength='1' maxlength='50' name='ville' value='".$ville."' required>
							</label>
							<label class='label_space_usr_prfl'>Code postal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
								<input minlength='1' maxlength='6' name='codepostal' value=".$codepostal." required>
							</label>
							<label class='label_space_usr_prfl'>Pseudo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
								<input minlength='1' maxlength='20' name='pseudo' value=".$pseudo." required>
							</label>
					";
				}
				if ($action_message == 'client'){ // show a drop-down box to select 'niveau' (for client)
					print('<label class="label_space_usr_prfl"> Niveau &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ');
			 		print('<select name="refniveau">');
			           	foreach ($dataNiveau as $ligne) {
			                print( '<option value='.$ligne["idniveau"].'>'. $ligne["nomniveau"] .'</option>');
			          	}
			        print('</select>');
			        print('</label>');

			        print('<label class="label_space_usr_prfl"> Abonnement &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ');
			 		print('<select name="reftypeabonnement">');
			           	foreach ($dataTypeAbonnement as $ligne) {
			                print( '<option value='.$ligne["idtypeabonnement"].'>'. $ligne["nomtypeabonnement"] .'</option>');
			          	}
			        print('</select>');
			        print('</label>');
				}

				echo '<button class="button_update_user" type="submit">Enregistrer</button>';
				echo '</div>';
			echo '</form>';
		?>
	</main>

	
	
