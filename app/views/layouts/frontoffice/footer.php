	<!-- Footer -->
	<footer id="footer">
		<h1>CONTACT</h1>
		<h3>🔰 Vous souhaitez obtenir des informations complémentaires ? Nous poser une quelconque question ? Nous proposer un dîner ? Tout se passe avec le formulaire ci-dessous...</h3>
		<div>
			<?php if(isset($success_message)): ?>
 				<p><?php echo $success_message ?></p>
			<?php else: ?>
				<form action="<?php echo get_url('home','submit_contact_message') ?>" method="POST">
				    <div>
				        <label for="mail">Mail :</label>
				        <input type="email" placeholder="manon.dupont@gmail.com" name="contact_mail" maxlength="255" required>
				    </div>
				    <div>
				        <textarea name="contact_message" placeholder="Un dîner !" maxlength="255" required></textarea>
				    	<button type="submit">Carrément, envoyer ca !</button>
				    </div>
				</form>
			<?php endif; ?>
		</div>
		<h2>&copy; DigitalSport</h2>
	</footer>
	<script type="text/javascript" src="js/script.js"></script>
</body>
</html>