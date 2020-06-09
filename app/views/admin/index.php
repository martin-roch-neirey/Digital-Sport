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
		<div>
			<table id='tableauStats'> <!-- show result: list stats with a tab -->
				<?php
				foreach ($data as $tab) {
					if (is_array($tab)){
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
				}		
				?>
			</table>
		</div>
	</nav>
	
	
	
