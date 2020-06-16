	<link rel="stylesheet" type="text/css" href="css/admin_index.css">  <!-- load style -->
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
			if (isset($_COOKIE['cookie_success_message'])){
				echo '<h4 class="success_message">'.$_COOKIE['cookie_success_message'].'</h4>' ;	
			}

		?>
		
		<!-- form to search users -->
		<form method="POST">
	 		<label>Rechercher un nom :</label>
	 		<input minlength="1" maxlength="255" type="text" placeholder="Dupont" name="search">
	 		<button type="submit"> Rechercher !</button>
	 	</form>
	 	<!-- show result: list user's caracteristic with a table -->
	 	<?php if(count($data) > 3): ?>
				<div>
		 			<table class='table_giant'>
						<tr class="tr_title">
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
						</tr>

						<?php
						$dataUser = $data[0]; // table with user's caracteristic

						foreach ($dataUser as $ligne) {	// depending on 'action_message', we take caracteristic from coach or client
							if ($action_message == 'client'){
								$iduser=$ligne["idclient"];
								$refniveau=$ligne["refniveau"];
								$reftypeabonnement=$ligne["reftypeabonnement"];
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
										<form action=". get_url('admin','update_client_profile') ." method='POST'>
											<td class='invs_table'>
												<input type='hidden' name='refniveau' value=".$refniveau.">
												<input type='hidden' name='refprefixetel' value=".$refprefixetel.">
												<input type='hidden' name='reftypeabonnement' value=".$reftypeabonnement.">
												<input type='hidden' name='iduser' value=".$iduser.">
												<button type='submit'>Editer</button>
										</form>
										<form action=". get_url('admin','delete_client_profile_proceed') ." method='POST'>
												<input type='hidden' name='iduser' value=".$iduser.">
												<button type='submit'>Supprimer</button>
											</td>
										</form>
									</tr>
								";
							} elseif ($action_message == 'coach') {
								echo "
										<form action=". get_url('admin','update_coach_profile') ." method='POST'>
											<td class='invs_table'>
												<input type='hidden' name='refprefixetel' value=".$refprefixetel.">
												<input type='hidden' name='iduser' value=".$iduser.">
												<button type='submit'>Editer</button>
											
										</form>
										<form action=". get_url('admin','delete_coach_profile_proceed') ." method='POST'>
											
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
	</main>

