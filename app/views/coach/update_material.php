	<link rel="stylesheet" type="text/css" href="css/coach_index.css"> <!-- load style -->
	<main>

		<br><br>

		<menu class="menu">
		<?php
			echo '<h3 class="presentation_message title-menu">'.$presentation_message.'</h3>'; // show several message (presentation/success/error)
			if (isset($error_message)){
				echo '<h4 class="error_message">'.$error_message.'</h4>' ;
			}
			if (isset($_COOKIE['cookie_success_message']))
				echo '<h4 class="success_message">'.$_COOKIE['cookie_success_message'].'</h4>' ;
			elseif (isset($success_message)){
				echo '<h4 class="success_message">'.$success_message.'</h4>' ;
			}

		?>

		<!-- show form to add material -->
		<form action='<?php echo get_url('coach','add_material_proceed') ?>' method='POST'>
	 		<label><p>Nom matériel :</p>
	 			<input minlength='1' maxlength='20' type='text' name='nommateriel' required>
	 			<button type='submit' class='button'>Ajouter !</button>
	 		</label>
	  </form>

	</menu>
	<br><br>

	<menu class="menu">
<h3 class="presentation_message title-menu">📋 Matériel disponible 📋</h3>
 		<!-- show table to see material and delete it -->
 		<div>
	 		<table class="table-content">
				<tr class="tr_title">
					<td>Nom matériel</td>
					<td>Action</td>
				</tr>
				<tr>
		 		<?php
		 			$data_material = $data[0];
		 			foreach ($data_material as $ligne) {
						$idmateriel=$ligne["idmateriel"];
						$nommateriel=$ligne["nommateriel"];
						echo "
							<tr>
								<td class='td_nommateriel'> ".$nommateriel."</td>
								<form action=". get_url('coach', 'delete_material_proceed')." method='POST'>
									<td class='invs_table'>
										<input type='hidden' name='idmateriel' value=".$idmateriel.">
										<button type='submit' class='little-button'>Supprimer</button>
									</td>
								</form>
							</tr>
						";
					}
		        ?>
		      </tr>
		    </table>
	    </div>

	    <br>

		</menu>

		<br><br>
	</main>
