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

		<!-- form to search a date -->
	 	<form method="POST" action="<?php echo get_url('admin','show_contact_message') ?>">
	 		<label>Date :</label>
	 		<input type="date" name="search" minlength="1" maxlength="10">
	 		<button type="submit"> Rechercher !</button>
	 	</form>
	 	
	 	<div>
	 	<?php 
	 		if (isset($action_message) and $action_message == 'delete'){
	 			$data = $data[0];
	 		} 
	 		if(isset($data[0])): 
	 			$data_message = $data[0];
	 	?> <!-- check if search is empty/has a response, continue and show contact message or not -->
	 		<table class='table_giant'>
				<tr class="tr_title">
					<td>Date</td>
					<td>Mail</td> 
					<td class='td_contact_message'>Message</td>
				</tr>
				<?php
				if (isset($action_message)){ // check if the user require a date, and show him a button to suppress messages for the day required
				 	if ($action_message == 'delete_date'){
				 		echo "
				 		<form method='POST' action=". get_url('admin','delete_day_contact_message') .">
					 		<label>Supprimer les messages pour ce jour: 
					 			<button type='submit'>Supprimer !</button>
					 			<input type='hidden' name='date' value=".$data_message[0]['date'].">
					 		</label>
					 	</form>
					 	";
					 }
				}
				foreach ($data_message as $ligne) { // show result: list contact message with a table
					$date=$ligne["date"];
					$mail=$ligne["mail"];
					$message=$ligne["message"];
					$idcontact=$ligne["idcontact"];
					echo "<tr>
							<td> ".$date."</td> 
							<td> ".$mail." </td> 
							<td> ".$message." </td>
							<form method='POST' action=". get_url('admin','delete_contact_message') .">
								<td class='invs_table'>
									<input type='hidden' name='idcontact' value=".$idcontact.">
									<button type='submit'>Supprimer</button> 
								</td>
							</form>
						  </tr>";
				}
				?>

			</table>
		<?php endif; ?>
		</div>
	</main>
	
	
