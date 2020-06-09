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
		
		<!-- show form to add material -->
		<form id='Exo_style' action='https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=add_material_proceed' method='POST'>
 			<div>
 				<div>
			 		<label>Nom matériel :
			 			<input minlength='1' maxlength='20' type='text' name='nommateriel' required>
			 			<button type='submit'>Ajouter !</button>
			 		</label>		
 				</div>
	        </div>
	    </form>

 		<!-- show table to see material and delete it -->
		<div>
	 		<table>
				<tr>
					<td>Nom matériel</td>
					<td>Suppression</td>
				<tr>
	 		<?php
	 			$data_material = $data[0];
	 			foreach ($data_material as $ligne) {
					$idmateriel=$ligne["idmateriel"];
					$nommateriel=$ligne["nommateriel"];
					echo "
						<tr>
							<td> ".$nommateriel."</td> 
							<form action='https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=delete_material_proceed' method='POST'>
								<td>
									<input type='hidden' name='idmateriel' value=".$idmateriel.">
									<button type='submit'>Supprimer</button>
								</td>
							</form>
						<tr>
					";
				}           
	        ?>
	    	</table>
        </div>
	</nav>