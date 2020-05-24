<?php
$local_table = 'materiel';

$local_data = [
	'nommateriel' => $_POST['nomMateriel'],
];

insert($local_table , $local_data);

?>