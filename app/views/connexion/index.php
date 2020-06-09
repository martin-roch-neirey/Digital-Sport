<!--- INDEX OF CONNEXION PAGE --->

<link rel="stylesheet" type="text/css" href="css/connexion_style.css">


<div class="limiter">
	<div class="container-login100">

		<div class="wrap-login100">
			<div class="login100-pic js-tilt" data-tilt>
				<a href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=home&action=index"><img src="images/connexion_haltere.png" alt="IMG"></a>
			</div>

				<form class="login100-form validate-form" action="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=connexion&action=connexion_try" method="post">
					<span class="login100-form-title">
																		<!--- Success message after registering of connexion success --->
					<?php if(isset($success_message)): ?>
 						<h3><?php echo $success_message?></h3> <br>
 					<?php endif; ?>
						Accédez à votre Espace Membre
					</span>

					<!--- DEBUG : print_r($data) --->
					<div class="wrap-input100 validate-input input-icons" data-validate = "Adresse email requise : ex@abc.xyz">
						<!--- EMAIL --->
						<input class="input100 input-field" type="text" name="P_email" placeholder="Email" minlenght="2" maxlength="100" required>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Un mot de passe est requis">
						<!--- PASSWORD --->
						<input class="input100 input-field" type="password" name="P_password" placeholder="Mot de passe" minlenght="2" maxlength="100" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						</span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							CONNEXION
						</button>
					</div>

					<!--- PASSWORD FORGOTTEN --->
					<div class="text-center">
						<span class="txt1">
							Oubli de mon
						</span>
						<a class="txt2" href="#">
							Mot de passe...
						</a>
					</div>

					<div class="text-center">
						<a class="txt2" href="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=inscription&action=index">

							<br><br><br><br><br><br><br>

							<!--- No account --->
							Pas de compte ? Inscrivez-vous !
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

