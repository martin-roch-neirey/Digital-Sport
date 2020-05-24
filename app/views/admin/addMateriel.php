	<link rel="stylesheet" type="text/css" href="css/admin_index.css">
	<h2>Panel Admin</h2>
	<?php if(isset($presentation_message)): ?>
 		<h3><?php echo $presentation_message ?></h3>
 		<form id="Exo_style" action="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=addMateriel_proceed" method="POST">
 			<div>
 				<div>
			 		<label>Nom matériel :</label>
			 		<input maxlength="255" type="text" name="nomMateriel">			
 				</div>
	        </div>
	        <button type="submit">Ajouter !</button>
        </form>
 	<?php elseif(isset($success_message)): ?>
 		<h3><?php echo $success_message?></h3>
 		<form action="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=addMateriel" method="POST">
 			<button id="inserernouveau" type="submit">Un autre !</button>
 		</form>
	<?php endif; ?>
	
	
