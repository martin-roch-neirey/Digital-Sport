<link rel="stylesheet" type="text/css" href="css/pagemembre_style.css"> <!-- load style -->
<link rel="stylesheet" type="text/css" href="css/pagemembre_exercise_training_proceed_style.css">
<link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/script.js"></script>
<main>

	<menu class='menu'>
				<div>
					<div>

					<br>

						<h1 class='exercise-title'>🏅 ENTRAÎNEMENT EN COURS 🏅</h1><br>
						<p>Courage ! Vous allez y arriver. N'oubliez pas de lancer votre chronomètre, vous pouvez l'arrêter à tout moment pour le reprendre plus tard. Essayez de battre votre record !</p> <br>
						<p>Si vous ressentez une sensation de malaise durant cette séance, arrêtez immédiatement votre exercice. Hydratez-vous intensémment pour éviter tout risque potentiel. Si les symptômes persistent, contactez votre médecin ou le SAMU au 15 (Urgences Eurpéennes 112).</p>
						<br>

					</div>

				</div>
			</menu>


<?php

	$trainingExercise1 = [$data[0]];

	if (isset($data[1])){
		$trainingExercise2 = [$data[1]];
	}
	if (isset($data[2])){
		$trainingExercise3 = [$data[2]];
	}

	print('<div>');

	echo "

		<menu class='menu-chrono box' id='test'>
 		<h3>Chronomètre</h3>
			<div class='' id='divChrono'>00:00:00</div>
				<form id='formChrono'>
				   <input type='button' id='bStart' class='button' value='START' onClick='fStart()' />
				   <input type='button' id='bStop' class='button' value='STOP' onClick='fStop()' />
				   <input type='button' id='bDel' class='button' value='RESET' onClick='fReset()' />
				</form>

				</menu>
					<br><br>


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
			<menu class='menu'>
				<div>
					<div>

					<br>

						<h1 class='exercise-title'>🥇 ".$nomexo." 🥇</h1><br>
						<h3>Description : </h3><p>".$description."</p><br>
						<h3>Nombre de répétition :</h3><p>".$nbrepetition."</p><br>
						<h3>Temps imparti :</h3> <p>".$vitesse." secondes</p><br>
						<img width='640' height='360' src=".$lienimage.">

						<br>

					</div>

					<div>

						<br>

						<iframe type='text/html' width='640' height='360' src=".$lienvideo." frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen > </iframe>

						<br><br><br>

					</div>
				</div>
			</menu>

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
			<menu class='menu'>
				<div>
					<div>

					<br>

						<h1 class='exercise-title'>🥈 ".$nomexo." 🥈</h1><br>
						<h3>Description : </h3><p>".$description."</p><br>
						<h3>Nombre de répétition :</h3><p>".$nbrepetition."</p><br>
						<h3>Temps imparti :</h3> <p>".$vitesse." secondes</p><br>
						<img width='640' height='360' src=".$lienimage.">

						<br>

					</div>

					<div>

						<br>

						<iframe type='text/html' width='640' height='360' src=".$lienvideo." frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen > </iframe>

						<br><br><br>

					</div>
				</div>
			</menu>

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
			<menu class='menu'>
				<div>
					<div>

					<br>

						<h1 class='exercise-title'>🥉 ".$nomexo." 🥉</h1><br>
						<h3>Description : </h3><p>".$description."</p><br>
						<h3>Nombre de répétition :</h3><p>".$nbrepetition."</p><br>
						<h3>Temps imparti :</h3> <p>".$vitesse." secondes</p><br>
						<img width='640' height='360' src=".$lienimage.">

						<br>

					</div>

					<div>

						<br>

						<iframe type='text/html' width='640' height='360' src=".$lienvideo." frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen > </iframe>

						<br><br><br>

					</div>
				</div>
			</menu>
			";
			}
		}

	print('</div>');

?>

<menu class='menu'>
				<div>
					<button class="button"><a href="<?php echo get_url('pagemembre', 'index')?>">FIN DE SÉANCE</a></button>


				</div>
			</menu>


<br><br><br>


</main>



