	<link rel="stylesheet" type="text/css" href="css/admin_index.css"> <!-- load style -->
	<main>
		<h2>Panel Admin</h2>
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
			<label>Un nouvel exercice :
				<button>
					<a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=add_exercise">Ajouter</a>
				</button>
			</label>
		</form>
		<div>
 			<table class='table_show_exercice'>
				<tr class="tr_title">
					<td>Nom</td>
					<td>Description</td> 
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
							<td class='td_description'> ".$description." </td> 
							<form action='https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=update_exercise' method='POST'>
								<td class='invs_table'>
									<input type='hidden' name='idexercice' value=".$idexercice.">
									<input type='hidden' name='refmateriel' value=".$refmateriel.">
									<button type='submit'>Editer</button>
							</form>
							
							<form action='https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=delete_exercise_proceed' method='POST'>
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
	</main>
	
