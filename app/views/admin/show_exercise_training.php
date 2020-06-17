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
			if (isset($_COOKIE['cookie_success_message']))
				echo '<h4 class="success_message">'.$_COOKIE['cookie_success_message'].'</h4>' ;
			elseif (isset($success_message)){
				echo '<h4 class="success_message">'.$success_message.'</h4>' ;
			}

		?>
		
		<!-- show exercise to update (add/update/delete) -->
		<form>
			<label>Un nouvel exercice d'entrainement :</label>
			<button>
				<a href=<?php echo get_url('admin','add_exercise_training') ?> >Ajouter</a>
			</button>
		</form>
		<div>
 			<table class='table_show_exercice_training'>
				<tr class="tr_title">
					<td>Exercice</td>
					<td>Muscle</td>
					<td>Type de muscu</td> 
					<td>Niveau</td>
					<td>Répétitions</td>
					<td>Temps</td>
				</tr>

				<?php
				$exercise_training_data = $data[0]; // table with exercise training caracteristic

				foreach ($exercise_training_data as $ligne) {	// loop to show each exercise's caracteristic
					$nomexo=$ligne["nomexo"];
					$idchoixexo=$ligne["idchoixexo"];
					$nommuscle=$ligne["nommuscle"];
					$nomtypemuscu=$ligne["nomtypemuscu"];
					$nomniveau=$ligne["nomniveau"];
					$nbrepetition=$ligne["nbrepetition"];
					$vitesse=$ligne["vitesse"];
					$refniveau=$ligne["refniveau"];
					$reftypemuscu=$ligne["reftypemuscu"];
					$refmuscle=$ligne["refmuscle"];
					$refexercice=$ligne["refexercice"];

					echo "
						<tr>
							<td> ".$nomexo."</td> 
							<td> ".$nommuscle."</td>
							<td> ".$nomtypemuscu."</td>
							<td> ".$nomniveau."</td>
							<td> ".$nbrepetition."</td>
							<td> ".$vitesse."</td>
							<form action=". get_url('admin','update_exercise_training') ." method='POST'>
								<td class='invs_table'>
									<input type='hidden' name='idchoixexo' value=".$idchoixexo.">
									<input type='hidden' name='refexercice' value=".$refexercice.">
									<input type='hidden' name='refmuscle' value=".$refmuscle.">
									<input type='hidden' name='reftypemuscu' value=".$reftypemuscu.">
									<input type='hidden' name='refniveau' value=".$refniveau.">
									
									<button type='submit'>Editer</button>
							</form>
							
							<form action=".get_url('admin','delete_exercise_training_proceed')." method='POST'>
									<input type='hidden' name='idchoixexo' value=".$idchoixexo.">

									<button type='submit'>Supprimer</button>
								</td>
							</form>
						</tr>
					";
				}
				?>
			</table>
		</div>
	</main>
	
