	<link rel="stylesheet" type="text/css" href="css/admin_index.css">
	<h2>Panel Admin</h2>
	<?php if(isset($success_message)): ?>
 		<h3><?php echo $success_message?></h3>
 		
 		<form method="POST">
 			<label>Date :</label>
 			<input type="date" name="search">
 			<button type="submit"> Rechercher !</button>
 		</form>
 	
 		<?php if(count($data) > 1): ?>
			<div>
	 			<table id='contactMessage'>
					<tr>
						<td>Date</td>
						<td>Mail</td> 
						<td>Message</td>
					</tr>
					<?php
					foreach ($data as $tab) {
						if (is_array($tab)){
							foreach ($tab as $ligne) {
								$date=$ligne["date"];
								$mail=$ligne["mail"];
								$message=$ligne["message"];
								echo "<tr>
										<td> ".$date."</td> 
										<td> ".$mail." </td> 
										<td> ".$message." </td>
									  </tr>";
							}
						}
					}
					?>
				</table>
			</div>
		<?php endif; ?>
	<?php endif; ?>
	
	
