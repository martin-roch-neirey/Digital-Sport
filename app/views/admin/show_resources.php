	<link rel="stylesheet" type="text/css" href="css/admin_index.css"> <!-- load style -->
	<main>
		<h2>Panel Admin</h2>
		<?php
			echo '<h3 class="presentation_message">'.$presentation_message.'</h3>'; // show several message (presentation/success/error)
			if (isset($error_message)){
				echo '<h4 class="error_message">'.$error_message.'</h4>' ;
			}
			if (isset($success_message)){
				echo '<h4 class="success_message">'.$success_message.'</h4>' ;
			}
		?>

		<?php

		if ($action_message == 'graph') { // check if we show graph / mcd / mld with appropriate button
			$image = 'images/graphe.png';
			$link_button1 = 'https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=show_resource_mcd';
			$text_button1 = 'MCD';
			$link_button2 = 'https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=show_resource_mld';
			$text_button2 = 'MLD';


		} elseif ($action_message == 'mcd') {
			$image = 'images/mcd.png';
			$link_button1 = 'https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=show_resource_graph';
			$text_button1 = 'Graphe-DF';
			$link_button2 = 'https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=show_resource_mld';
			$text_button2 = 'MLD';

		} elseif ($action_message == 'mld') {
			$image = 'images/mld.png';
			$link_button1 = 'https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=show_resource_graph';
			$text_button1 = 'Graphe-DF';
			$link_button2 = 'https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=show_resource_mcd';
			$text_button2 = 'MCD';

		}

		// print right image, button1 and button2 depending on the action message

		print('<img src='.$image.' alt="resouces" /> <br>');
		print('<button class="button_ressource"><a href='.$link_button1.'>'.$text_button1.'</a></button>');
		print('<button><a href='.$link_button2.'>'.$text_button2.'</a></button>');
		?>
	</main>





