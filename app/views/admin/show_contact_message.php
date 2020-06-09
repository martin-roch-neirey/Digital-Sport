	<link rel="stylesheet" type="text/css" href="css/admin_index.css"> <!-- load style -->
	<nav>
		<h2>Panel Admin</h2> <!-- show several message (presentation/success/error) -->
		<?php
			echo '<h3>'.$presentation_message.'</h3>'; 
			if (isset($error_message)){
				echo '<h4>'.$error_message.'</h4>' ;
			}
			if (isset($success_message)){
				echo '<h4>'.$success_message.'</h4>' ;
			}
		?>

		<!-- form to search a date -->
	 	<form method="POST">
	 		<label>Date :</label>
	 		<input type="date" name="search" minlength="1" maxlength="10">
	 		<button type="submit"> Rechercher !</button>
	 	</form>
	 	
	 	<?php 
	 		$data=$data[0];
	 		if(isset($data[0])): 
	 			$data_message = $data[0];
	 	?> <!-- check if search is empty/has a response, continue and show contact message or not -->
			<div>
		 		<table id='contactMessage'>
					<tr>
						<td>Date</td>
						<td>Mail</td> 
						<td>Message</td>
						<td>Suppression</td>
					</tr>
					<?php
						foreach ($data_message as $ligne) { // show result: list contact message with a table
							$date=$ligne["date"];
							$mail=$ligne["mail"];
							$message=$ligne["message"];
							$idcontact=$ligne["idcontact"];
							echo "<tr>
									<td> ".$date."</td> 
									<td> ".$mail." </td> 
									<td> ".$message." </td>
									<form method='POST' action='https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=delete_contact_message'>
										<td>
											<input type='hidden' name='idcontact' value=".$idcontact.">
												<button type='submit'>Supprimer</button> 
										</td>
									</form>
								  </tr>";
						}
					if (isset($action_message)){ // check if the user require a date, and show him a button to suppress messages for the day required
					 	if ($action_message == 'delete_date'){
					 		echo "
					 		<form method='POST' action='https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=delete_day_contact_message'>
						 		<label>Supprimer les messages pour ce jour: </label>
						 		<input type='hidden' name='date' value=".$date.">
						 		<button type='submit'>Supprimer !</button>
						 	</form>
						 	";
						 }
					}

					?>

				</table>
			</div>
		<?php endif; ?>
	</nav>
	
	
