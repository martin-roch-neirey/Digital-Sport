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
		
		<!-- show form to add material -->
		<form action='<?php echo get_url('admin','add_material_proceed') ?>' method='POST'>
	 		<label>Nom matériel :
	 			<input minlength='1' maxlength='20' type='text' name='nommateriel' required>
	 			<button type='submit'>Ajouter !</button>
	 		</label>	
	    </form>

 		<!-- show table to see material and delete it -->
 		<div>
	 		<table class="table_show_materiel">
				<tr class="tr_title">
					<td>Nom matériel</td>
				<tr>
		 		<?php
		 			$data_material = $data[0];
		 			foreach ($data_material as $ligne) {
						$idmateriel=$ligne["idmateriel"];
						$nommateriel=$ligne["nommateriel"];
						echo "
							<tr>
								<td class='td_nommateriel'> ".$nommateriel."</td> 
								<form action=". get_url('admin', 'delete_material_proceed')." method='POST'>
									<td class='invs_table'>
										<input type='hidden' name='idmateriel' value=".$idmateriel.">
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