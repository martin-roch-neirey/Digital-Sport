<link rel="stylesheet" type="text/css" href="css/pagemembre_style.css"> <!-- load style -->

<main>


<h3>Choisissez ce que vous voulez travailler :</h3>

<?php

	$trainingExercise1 = [$data[0]]; 

	if (isset($data[1])){
		$trainingExercise2 = [$data[1]];
	} 
	if (isset($data[2])){
		$trainingExercise3 = [$data[2]];
	}

	print('<div>');

	echo "		<div id='divChrono'>00:00:00</div>
				<form id='formChrono'>
				   <input type='button' id='bStart' value='Démarrer' onClick='fStart()' />
				   <input type='button' id='bStop' value='Stop' onClick='fStop()' />
				   <input type='button' id='bDel' value='Remise à zéro' onClick='fReset()' />
				</form>
		";

		foreach ($trainingExercise1 as $ligne){
			$lienvideo=$ligne['lienvideo'];
			$lienimage=$ligne['lienimage'];
			$lienmusique=$ligne['lienmusique'];
			$nomexo=$ligne['nomexo'];
			$description=$ligne['description'];
			$nbrepetition=$ligne['nbrepetition'];
			$vitesse=$ligne['vitesse'];

			echo "
			<div>
				<div> 

					<h4>".$nomexo."</h4>
					<p>".$description."</p>
					<h5>Nombre de répétition : ".$nbrepetition.".</h5>
					<h5>Temps imparti : ".$vitesse." secondes.</h5>
					<img width='640' height='360' src=".$lienimage.">

				</div>

				<div>

					<iframe type='text/html' width='640' height='360' src=".$lienvideo." frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen> </iframe>

				</div>
			</div>
			";
		}

		if (isset($trainingExercise2)){

			foreach ($trainingExercise2 as $ligne){
			$lienvideo=$ligne['lienvideo'];
			$lienimage=$ligne['lienimage'];
			$lienmusique=$ligne['lienmusique'];
			$nomexo=$ligne['nomexo'];
			$description=$ligne['description'];
			$nbrepetition=$ligne['nbrepetition'];
			$vitesse=$ligne['vitesse'];

			echo "
			<div>
				<div> 

					<h4>".$nomexo."</h4>
					<p>".$description."</p>
					<h5>Nombre de répétition : ".$nbrepetition.".</h5>
					<h5>Temps imparti : ".$vitesse." secondes.</h5>
					<img width='640' height='360' src=".$lienimage.">

				</div>

				<div>

					<iframe type='text/html' width='640' height='360' src=".$lienvideo." frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen />

				</div>
			</div>

			";
			}
		}


		if (isset($trainingExercise3)){

			foreach ($trainingExercise3 as $ligne){
			$lienvideo=$ligne['lienvideo'];
			$lienimage=$ligne['lienimage'];
			$lienmusique=$ligne['lienmusique'];
			$nomexo=$ligne['nomexo'];
			$description=$ligne['description'];
			$nbrepetition=$ligne['nbrepetition'];
			$vitesse=$ligne['vitesse'];

			echo "
			<div>
				<div> 

					<h4>".$nomexo."</h4>
					<p>".$description."</p>
					<h5>Nombre de répétition : ".$nbrepetition.".</h5>
					<h5>Temps imparti : ".$vitesse." secondes.</h5>
					<img width='640' height='360' src=".$lienimage.">

				</div>

				<div>

					<iframe type='text/html' width='640' height='360' src=".$lienvideo." frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen />

				</div>
			</div>

			";
			}
		}

	print('</div>');

?>

</main>
<script type="text/javascript" src="js/script.js"></script>

	
