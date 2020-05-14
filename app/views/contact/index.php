<?php 

	if(isset($errors)) {
		print_r($errors);
	}

 ?>

<?php if(isset($success_message)): ?>
 <p style="background-color: green "><?php echo $success_message ?></p>
<?php endif; ?>

form contact
<form method="post" action="http://localhost:8181/index.php?controller=contact&action=submit_contact">
	<input type="email" name="email"/>
	<textarea name="message" maxlength="255"></textarea>
	<input type="submit" name=""/>
</form>