<!--- INDEX OF CONNEXION PAGE --->

<link rel="stylesheet" type="text/css" href="css/connexion_style.css">


<div class="limiter">
	<div class="container-login">

		<div class="wrap-login">
			<div class="login100-pic login100-pic-index" data-tilt>
				<a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=home&action=index"><img src="images/connexion_haltere.png" alt="IMG"></a>
			</div>

				<form class="login-form validate-form" action="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=connexion&action=connexion_try" method="post">
					<span class="login-form-title">
						<!--- Success/error message after success/fail registering --->
 					<?php if(isset($error_message)): ?>
 						<h3 class="error_message"><?php echo $error_message?></h3> <br>
 					<?php endif; ?>
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
						<span class="txt1">
							Oubli de mon
						</span>
						<a class="txt2" href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=connexion&action=reset_password">
							Mot de passe...
						</a>
					</div>

					<div class="text-center">
						<a class="txt2" href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=inscription&action=index">

							<!--- No account --->
							Pas de compte ? Inscrivez-vous !
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

