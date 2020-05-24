	<link rel="stylesheet" type="text/css" href="css/admin_index.css">
	<h2>Panel Admin</h2>
	<?php if(count($data) > 1): ?>
			<h3 id="statsTitle">Statistiques DigitalSport</h3>
			<div>
				<table id='tableauStats'>
					<?php
					foreach ($data as $tab) {
						foreach ($tab as $tableau) {
							if (is_array($tableau)){
								foreach ($tableau as $ligne) {
									$count=$ligne["count"];
									echo "<tr>
											<td> ".$tab[0]."</td>
											<td> ".$count."</td> 
								  		  </tr>";
								}
							}
						}
					}
					
					?>
				</table>
			</div>
	<?php endif; ?>
	
	
	
