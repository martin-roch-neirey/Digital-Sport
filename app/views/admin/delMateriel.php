	<link rel="stylesheet" type="text/css" href="css/admin_index.css">
	<h2>Panel Admin</h2>
	<?php if(isset($presentation_message)): ?>
 		<h3><?php echo $presentation_message ?></h3>
 		<form id="Exo_style" action="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=delMateriel_proceed" method="POST">
 			<div>
 				<div>
			 		<label>Matériel :</label>
			 		<?php
			 			foreach ($data as $tab) {
			 				if (is_array($tab)){
			 					print('<select name="idMateriel">');
			                	foreach ($tab as $ligne) {
			                        print( '<option value='.$ligne["idmateriel"].'>'. $ligne["nommateriel"] .'</option>');
			                	}
			                	print('</select>'); 
			 				}
			 			}           
			        ?>
			    </div>
	        </div>
	        <button type="submit">Supprimer !</button>
        </form>
 	<?php elseif(isset($success_message)): ?>
 		<h3><?php echo $success_message?></h3>
 		<form action="https://srv-prj.iut-acy.local/RT/1projet17/mvc/public/index.php?controller=admin&action=delMateriel" method="POST">
 			<button id="inserernouveau" type="submit">Un autre !</button>
 		</form>
	<?php endif; ?>
	
	
