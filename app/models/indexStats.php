<?php

$local_table = ['client' => 'Clients :',
					'coach' => 'Coachs :',
					'exercice' => 'Exercices enregistrés :',
					'materiel' => 'Matériels enregistrés :',
					'contact' => 'Messages de contacte :',
					'seanceclient' => 'Séances client réalisées :',
					'seancecoach' => 'Séances coach réallisées :'];
$local_fieldsParams = ['COUNT(*)'];
$local_data = [];
foreach ($local_table as $table => $message) {
	$result = select($table, $local_fieldsParams, [], '', 0, 0);
	array_push($local_data, [$message, $result]);
}

?>