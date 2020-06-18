<link rel="stylesheet" type="text/css" href="css/connexion_style.css"> <!-- load style from connexion_style.css -->
<head>
	<title>Connexion DigitalSport</title>
</head
<div class="limiter"> <!--- Reset password page --->
	<div class="container-login">

		<div class="wrap-login">
			<div class="login100-pic" data-tilt>
				<a href="<?php echo get_url('home','index') ?>" ><img src="<?php echo get_asset('images/connexion_haltere.png') ?>" alt="IMG"></a>
			</div>
				<!-- show form to reset password -->
				<form class="login-form validate-form" action="<?php echo get_url('connexion','reset_password_proceed') ?>" method="post">

					<span class="login-form-title">

					<!-- Success/error message after testing if the email address is known -->
					<?php if(isset($_COOKIE['cookie_success_message'])): ?>
						<h3 class="success_message"><?php echo $_COOKIE['cookie_success_message'] ?></h3> <br>
 					<?php elseif(isset($error_message)): ?>
 						<h3 class="error_message"><?php echo $error_message ?></h3> <br>
 					<?php endif; ?>
						Réinitialisation de Mot de Passe
					</span>

					<div class="wrap-input validate-input" data-validate = "Adresse email requise : ex@abc.xyz">
						<input class="input input-field" type="text" name="mail" placeholder="📧 Email" minlenght="1" maxlength="255" required>
					</div>

					<!-- button to submit form -->
					<div class="container-login-form-btn">
						<button class="login-form-btn-psw">
							REINITIALISER
						</button>
					</div>
					<div class="text-center">
						<a class="txt2" href="<?php echo get_url('connexion','index') ?>">
							Se connecter ...
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

