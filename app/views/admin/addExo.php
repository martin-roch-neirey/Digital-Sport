	<link rel="stylesheet" type="text/css" href="css/admin_index.css">
	<h2>Panel Admin</h2>
	<?php if(isset($presentation_message)): ?>
 		<h3><?php echo $presentation_message ?></h3>
 		<form id="Exo_style" action="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=addExo_proceed" method="POST">
 			<div>
 				<div>
		 			<label>Nom :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			 		<input maxlength="255" type="text" name="nomExercice" required>
 				</div>
 				<div>
			 		<label>Description : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			 		<input maxlength="255" type="" name="description" required>	
 				</div>
 				<div>
			 		<label>Lien vidéo : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			 		<input type="text" name="lienVideo">	
 				</div>
 				<div>
			 		<label>Lien image : &nbsp;&nbsp;&nbsp;&nbsp;</label>
			 		<input type="text" name="lienImage">	
 				</div>
 				<div>
			 		<label>Lien musique : &nbsp;</label>
			 		<input type="text" name="lienMusique">				
 				</div>
 				
 				<div>
			 		<label>Matériel : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			 		<?php
			 			foreach ($data as $tab) {
			 				if (is_array($tab)){
			 					print('<select name="refMateriel">');
			 					print('<option>Aucun</option>');
			                	foreach ($tab as $ligne) {
			                        print( '<option value='.$ligne["idmateriel"].'>'. $ligne["nommateriel"] .'</option>');
			                	}
			                	print('</select>'); 
			 				}
			 			}           
			        ?>
			    </div>
	        </div>
	        <button type="submit">Ajouter !</button>
        </form>
 	<?php elseif(isset($success_message)): ?>
 		<h3><?php echo $success_message?></h3>
 		<form action="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=addExo" method="POST">
 			<button id="inserernouveau" type="submit">Un autre !</button>
 		</form>
	<?php endif; ?>
	
	
