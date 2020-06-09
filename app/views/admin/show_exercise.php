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
			print_r($data[0]);
		?>
		
		<!-- show exercise to update (add/update/delete) -->
		<label>Un nouvel exercice :
			<button>
				<a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=add_exercise">Ajouter</a>
			</button>
		</label>
			<div>
	 			<table>
					<tr>
						<td>Nom</td>
						<td>Description</td> 
						<td></td>
						<td></td>
					</tr>

					<?php
					$dataUser = $data[0]; // table with exercise's caracteristic

					foreach ($dataUser as $ligne) {	// loop to show each exercise's caracteristic
						$idexercice=$ligne["idexercice"];
						$refmateriel=$ligne["refmateriel"];
						$nomexo=$ligne["nomexo"];
						$description=$ligne["description"];

						echo "
							<tr>
								<td> ".$nomexo."</td> 
								<td> ".$description." </td> 
								<form id='Exo_style' action='https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=update_exercise' method='POST'>
									<td>
										<input type='hidden' name='idexercice' value=".$idexercice.">
										<input type='hidden' name='refmateriel' value=".$refmateriel.">
										<button type='submit'>Editer</button>
									</td>
								</form>
								
								<form action='https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=delete_exercise_proceed' method='POST'>
									<td>
										<input type='hidden' name='idexercice' value=".$idexercice.">
										<button type='submit'>Supprimer</button>
									</td>
								</form>
							</tr>
						";
					}
					?>
				</table>
			</div>
	
