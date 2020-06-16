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
			$dataExercise = $data[0][0]; // affect $data parts to var
			$dataMaterial = $data[0][1];
			print("<form action=". get_url('admin', 'update_exercise_proceed') ." method='POST'>");
			foreach ($dataExercise as $ligne) { // show result: list user's caracteristic with a table
					$idexercice=$ligne["idexercice"];
					$nomexo=$ligne["nomexo"];
					$description=$ligne["description"];
					$lienvideo=$ligne["lienvideo"];
					$lienimage=$ligne["lienimage"];
					$lienmusique=$ligne["lienmusique"];

					echo "
						<div>
							<input type='hidden' name='idexercice' value=".$idexercice.">
							<label>Nom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
								<input  minlength='1' maxlength='255' name='nomexo' value=".$nomexo." required>
							</label>
							<label>Description &nbsp;&nbsp;&nbsp; :
								<input minlength='1' maxlength='255' name='description' value=".$description." required>
							</label>
							<label>Lien vidéo &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
								<input minlength='1' name='lienvideo' value=".$lienvideo." required>
							</label>

							<label>Lien image &nbsp;&nbsp;&nbsp; :
								<input minlength='1' name='lienimage' value=".$lienimage." required>
							</label>

							<label>Lien musique :
								<input minlength='1' name='lienmusique' value=".$lienmusique." required>
							</label>
							<label>Matériel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
					";

					print('<select name="refmateriel">'); // show a drop-down box to select 'refmateriel'
					foreach ($dataMaterial as $ligne) {
					    print( '<option value='.$ligne["idmateriel"].'>'. $ligne["nommateriel"] .'</option>');
					}
					print('</select>');
					print('</label>');
					
				}
				echo '<button type="submit" class="button_update_exercice">Enregistrer</button>';
				echo '</div>';
			echo '</form>';
		?>
	</main>
	
	
