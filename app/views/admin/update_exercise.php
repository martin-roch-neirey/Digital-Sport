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

		<?php
			$dataExercise = $data[0][0]; // affect $data parts to var
			$dataMaterial = $data[0][1];
			print("<form id='Exo_style' action='https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=update_exercise_proceed' method='POST'>");
			foreach ($dataExercise as $ligne) { // show result: list user's caracteristic with a table
					$idexercice=$ligne["idexercice"];
					$nomexo=$ligne["nomexo"];
					$description=$ligne["description"];
					$lienvideo=$ligne["lienvideo"];
					$lienimage=$ligne["lienimage"];
					$lienmusique=$ligne["lienmusique"];

					echo "
							<input type='hidden' name='idexercice' value=".$idexercice.">
							<label>Nom :
								<input  minlength='1' maxlength='255' name='nomexo' value=".$nomexo." required>
							</label>
							<label>Description :
								<input minlength='1' maxlength='255' name='description' value=".$description." required>
							</label>
							<label>Lien vidéo :
								<input minlength='1' name='lienvideo' value=".$lienvideo." required>
							</label>

							<label>Lien image :
								<input minlength='1' name='lienimage' value=".$lienimage." required>
							</label>

							<label>Lien musique :
								<input minlength='1' name='lienmusique' value=".$lienmusique." required>
							</label>
							<label>Matériel :
					";

					print('<select name="refmateriel">'); // show a drop-down box to select 'refmateriel'
					foreach ($dataMaterial as $ligne) {
					    print( '<option value='.$ligne["idmateriel"].'>'. $ligne["nommateriel"] .'</option>');
					}
					print('</select>');
					print('</label>');
					
				}
				echo '<button type="submit">Enregistrer</button>';
			echo '</form>';
		?>
	</nav>
	
	