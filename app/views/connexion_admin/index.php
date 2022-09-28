<!--- INDEX OF CONNEXION PAGE --->

<link rel="stylesheet" type="text/css" href="css/connexion_admin_style.css">
<head>
	<title>Connexion Admin</title>
</head>

	<div class="container-login100">

		<div class="wrap-login100">

				<form action='<?php echo get_url('connexion_admin','connexion_try_admin') ?>' method="post">
					<span class="login100-form-title">

					<!--- Success message after connexion success registering --->
					<?php
						if (isset($_COOKIE['cookie_success_message'])){
							print('<h3 class="success_message">'.$_COOKIE['cookie_success_message'].'</h3>');
						}elseif(isset($error_message)){
							print('<h3 class="error_message">'.$error_message.'</h3>');
						}

					?>
						🔐 Accès au pannel admin :
					</span>

					<div class="wrap-input100" data-validate = "Adresse email requise : ex@abc.xyz">
						<!--- EMAIL --->
						<input class="input100" type="text" name="mail" placeholder="Email" minlenght="1" maxlength="255" required>
					</div>

					<div class="wrap-input100" data-validate = "Mot de passe requis">
						<!--- PASSWORD --->
						<input class="input100" type="password" name="password" placeholder="Mot de passe" minlenght="1" maxlength="50" required>
						</span>
					</div>

					<div>
						<button class="login100-form-btn">
							CONNEXION
						</button>
					</div>

				</form>
			</div>
		</div>

