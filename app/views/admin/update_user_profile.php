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

			if ($action_message == 'client'){ // depending on user, change form if it is a client or a coach
				echo "<form id='modifyClient' method='POST' action='https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=update_client_profile_proceed'>";
			} elseif ($action_message == 'coach'){
				echo "<form id='modifyClient' method='POST' action='https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=update_coach_profile_proceed'>";
			}

			$dataUser = $data[0]; // affect $data parts to var ('refniveau' if it is a client)
			$dataPrefixetel = $data[1];
			if ($action_message == 'client'){
				$dataNiveau = $data[2];
			}

			foreach ($dataUser as $ligne) { // show result: list user's caracteristic with a table
				if ($action_message == 'client'){
						$iduser=$ligne["idclient"];
						$refniveau=$ligne["refniveau"];
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
							<input type='hidden' name='iduser' value=".$iduser.">
							<label>Nom :
								<input  minlength='1' maxlength='255' name='nom' value=".$nom." required>
							</label>
							<label>Prénom :
								<input minlength='1' maxlength='255' name='prenom' value=".$prenom." required>
							</label>
							<label>Mail :
								<input minlength='1' maxlength='255' name='mail' value=".$mail." required>
							</label>
							<label>Téléphone :
					";

					print('<select name="refprefixetel">'); // show a drop-down box to select 'prefixetel'
					   	foreach ($dataPrefixetel as $ligne) {
					        print( '<option value='.$ligne["idprefixetel"].'>'. $ligne["designationprefixetel"] .'</option>');
					    }
					print('</select>');
						
					echo "  <input minlength='10' maxlength='13' name='tel' value=".$tel." required>
							</label>
							<label>Taille :
								<input minlength='1' maxlength='3' name='taille' value=".$taille." required>
							</label>
							<label>Poids :
								<input minlength='1' maxlength='3' name='poids' value=".$poids." required>
							</label>
							<label>Rue :
								<input minlength='1' name='rue' value='".$rue."' required>
							</label>
							<label>Numéro de rue :
								<input minlength='1' maxlength='8' name='numrue' value=".$numrue." required>
							</label>
							<label>Ville :
								<input minlength='1' maxlength='50' name='ville' value='".$ville."' required>
							</label>
							<label>Code postal :
								<input minlength='1' maxlength='6' name='codepostal' value=".$codepostal." required>
							</label>
							<label>Pseudo :
								<input minlength='1' maxlength='20' name='pseudo' value=".$pseudo." required>
							</label>
					";
				}
				if ($action_message == 'client'){ // show a drop-down box to select 'niveau' (for client)
					print('<label> Niveau :');
			 		print('<select name="refniveau">');
			           	foreach ($dataNiveau as $ligne) {
			                print( '<option value='.$ligne["idniveau"].'>'. $ligne["nomniveau"] .'</option>');
			          	}
			        print('</select>');
			        print('</label>');
				}
				echo '<button type="submit">Enregistrer</button>';
			echo '</form>';
		?>
	</nav>

	
	
