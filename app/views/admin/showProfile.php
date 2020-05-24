	<link rel="stylesheet" type="text/css" href="css/admin_index.css">
	<h2>Panel Admin</h2>
	<?php if(isset($success_message)): ?>
 		<h3><?php echo $success_message?></h3>
 		<form method="POST">
 			<label>Nom :</label>
 			<input maxlength="255" type="text" placeholder="Dupont" name="search">
 			<button type="submit"> Rechercher !</button>
 		</form>
 		<?php if(count($data) > 1): ?>
			<div>
	 			<table>
					<tr>
						<td>Nom</td>
						<td>Prénom</td> 
						<td>Date de naissance</td>
						<td>Mail</td>
						<td>Téléphone</td>
						<td>Taille</td>
						<td>Poids</td>
						<td>Rue</td>
						<td>Numéro de rue</td>
						<td>Ville</td>
						<td>Code Postal</td>
						<td>Pseudo</td>
					</tr>
					<?php
					foreach ($data as $tab) {
						if (is_array($tab)){
							foreach ($tab as $ligne) {
								$nom=$ligne["nom"];
								$prenom=$ligne["prenom"];
								$datenss=$ligne["datenss"];
								$mail=$ligne["mail"];
								$tel=$ligne["tel"];
								$taille=$ligne["taille"];
								$poids=$ligne["poids"];
								$rue=$ligne["rue"];
								$numrue=$ligne["numrue"];
								$ville=$ligne["ville"];
								$codepostal=$ligne["codepostal"];
								$pseudo=$ligne["pseudo"];
								echo "<tr>
										<td> ".$nom."</td> 
										<td> ".$prenom." </td> 
										<td> ".$datenss." </td>
										<td> ".$mail." </td>
										<td> ".$tel." </td>
										<td> ".$taille." </td>
										<td> ".$poids." </td>
										<td> ".$rue." </td>
										<td> ".$numrue." </td>
										<td> ".$ville." </td>
										<td> ".$codepostal." </td>
										<td> ".$pseudo." </td>
									  </tr>";
							}
						}
					}
					?>
				</table>
			</div>
		<?php endif; ?>
	<?php endif; ?>
	
	
