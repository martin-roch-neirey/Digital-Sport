	<link rel="stylesheet" type="text/css" href="css/index.css">  <!-- load style -->
	<main>
		<?php
			echo '<h3 class="presentation_message">'.$presentation_message.'</h3>'; // show several message (presentation/success/error)
			if (isset($error_message)){
				echo '<h4 class="error_message">'.$error_message.'</h4>' ;
			}
			if (isset($success_message)){
				echo '<h4 class="success_message">'.$success_message.'</h4>' ;
				echo '<h4 class="success_message">'.$mdp.'</h4>' ;
			}
		?>

		<form action="<?php echo get_url('home', 'reset_password_proceed') ?>" method='POST'>
			<input type="mail" name="mail">
			<button type="submit" >Réinitialiser !</button>
		</form>