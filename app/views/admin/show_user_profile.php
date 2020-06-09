	<link rel="stylesheet" type="text/css" href="css/admin_index.css">  <!-- load style -->
	<nav>
		<h2>Panel Admin</h2> <!-- show several message (presentation/success/error) -->
		<?php
			echo '<h3>'.$presentation_message.'</h3>'; 
			if (isset($error_message)){
				echo '<h4>'.$error_message.'</h4>' ;
			}
			if (isset($success_message)){
				echo '<h4>'.$success_message.'</h4>' ;
			}
		?>
		<!-- form to search users -->
		<form method="POST"> rechercher un <?php '<h4>'.$action_message.'</h4>' ?>
	 		<label>Nom :</label>
	 		<input minlength="1" maxlength="255" type="text" placeholder="Dupont" name="search">
	 		<button type="submit"> Rechercher !</button>
	 	</form>
	 	<!-- show result: list user's caracteristic with a table -->
	 	<?php if(count($data) > 3): ?>
				<div>
		 			<table>
						<tr>
							<td>Nom</td>
							<td>Prénom</td> 
							<td>Date de naissance</td>
							<td>Mail</td>
							<td>Téléphone</td>
							<td>Taille</td>
							<td>Poids</td>
							<td>Rue</td>
							<td>Numéro de rue</td>
							<td>Ville</td>
							<td>Code Postal</td>
							<td>Pseudo</td>
							<td>Modifier</td>
						</tr>

						<?php
						$dataUser = $data[0]; // table with user's caracteristic

						foreach ($dataUser as $ligne) {	// depending on 'action_message', we take caracteristic from coach or client
							if ($action_message == 'client'){
								$iduser=$ligne["idclient"];
								$refniveau=$ligne["refniveau"];
							} elseif ($action_message == 'coach'){
								$iduser=$ligne["idcoach"];
							}

							$refprefixetel=$ligne["refprefixetel"];
							$nom=$ligne["nom"];
							$prenom=$ligne["prenom"];
							$datenss=$ligne["datenss"];
							$mail=$ligne["mail"];
							$tel=$ligne["tel"];
							$taille=$ligne["taille"];
							$poids=$ligne["poids"];
							$rue=$ligne["rue"];
							$numrue=$ligne["numrue"];
							$ville=$ligne["ville"];
							$codepostal=$ligne["codepostal"];
							$pseudo=$ligne["pseudo"];

							echo "
								<tr>
								<td> ".$nom."</td> 
								<td> ".$prenom." </td> 
								<td> ".$datenss." </td>
								<td> ".$mail." </td>
								<td> ".$tel." </td>
								<td> ".$taille." </td>
								<td> ".$poids." </td>
								<td> ".$rue." </td>
								<td> ".$numrue." </td>
								<td> ".$ville." </td>
								<td> ".$codepostal." </td>
								<td> ".$pseudo." </td>
							";

							// depending on 'action_message', we send different information (coach has no 'refniveau')
							if ($action_message == 'client'){
								echo "
										<form action='https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=update_client_profile' method='POST'>
											<td>
												<input type='hidden' name='refniveau' value=".$refniveau.">
												<input type='hidden' name='refprefixetel' value=".$refprefixetel.">
												<input type='hidden' name='iduser' value=".$iduser.">
												<button type='submit'>Editer</button>
											</td>
										</form>
										<form action='https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=delete_client_profile_proceed' method='POST'>
											<td>
												<input type='hidden' name='iduser' value=".$iduser.">
												<button type='submit'>Supprimer</button>
											</td>
										</form>
									</tr>
								";
							} elseif ($action_message == 'coach') {
								echo "
										<form action='https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=update_coach_profile' method='POST'>
											<td>
												<input type='hidden' name='refprefixetel' value=".$refprefixetel.">
												<input type='hidden' name='iduser' value=".$iduser.">
												<button type='submit'>Editer</button>
											</td>
										</form>
										<form action='https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=delete_coach_profile_proceed' method='POST'>
											<td>
												<input type='hidden' name='iduser' value=".$iduser.">
												<button type='submit'>Supprimer</button>
											</td>
										</form>
									</tr>
								";
							}
						}
						?>
					</table>
				</div>
			<?php endif; ?>
	</nav>

