<!--- INDEX OF CONNEXION PAGE --->

<link rel="stylesheet" type="text/css" href="css/connexion_style.css">


<div class="limiter">
	<div class="container-login">

		<div class="wrap-login">
			<div class="login100-pic login100-pic-index" data-tilt>
				<a href='<?php echo get_url('home','index') ?>'><img src="images/connexion_haltere.png" alt="IMG"></a>
			</div>

				<form class="login-form validate-form" action='<?php echo get_url('connexion','connexion_try') ?>' method="post">
					<span class="login-form-title">
						<!--- Success/error message after success/fail registering --->
 						<h3>
				        <?php

				            if (isset($_COOKIE['cookie_success_message'])) {
				              echo $_COOKIE['cookie_success_message'];
				            } else if (isset($success_message)) {
				              echo $success_message;
				            } else if (isset($error_message)) {
				              echo $error_message;
				            } else if (isset($action_message)) {
				              echo $action_message;
				            }

				        ?>
    				</h3>
						Accédez à votre Espace Membre
					</span>

					<!--- DEBUG : print_r($data) --->
					<div class="wrap-input validate-input" data-validate = "Adresse email requise : ex@abc.xyz">
						<!--- EMAIL --->
						<input class="input input-field" type="text" name="P_email" placeholder="Email" minlenght="2" maxlength="100" required>
					</div>

					<div class="wrap-input validate-input" data-validate = "Un mot de passe est requis">
						<!--- PASSWORD --->
						<input class="input input-field" type="password" name="P_password" placeholder="Mot de passe" minlenght="2" maxlength="100" required>
						<span class="focus-input"></span>
						<span class="symbol-input">
						</span>
					</div>


					<div class="container-login-form-btn">
						<button class="login-form-btn"-psw>
							CONNEXION
						</button>
					</div>

					<!--- PASSWORD FORGOTTEN --->
					<div class="text-center">

						<a class="txt2" href='<?php echo get_url('connexion','reset_password') ?>'>
							Mot de passe</a>
						<span class="txt1">
							oublié ?
						</span>
					</div>

					<div class="text-center">
						<a class="txt2" href='<?php echo get_url('inscription','index') ?>'>

							<!--- No account --->
							Pas de compte ? Inscrivez-vous !
						</a>
					</div>

					<div class="text-center">
						<a class="txt2" href='<?php echo get_url('home','index') ?>'>

							<!--- Back to home page --->
							Retour à l'accueil
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

