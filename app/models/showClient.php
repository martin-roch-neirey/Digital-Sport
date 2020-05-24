<?php

$local_table = 'client';
$local_fieldsParams = ['nom','prenom','datenss','mail','tel','taille','poids','rue','numrue','ville','codepostal','pseudo'];
$local_whereParams = [];
$local_orderParams = 'nom ASC';
if (!empty($_POST['search'])){
	$local_whereParams = [['nom','=',ucwords(strtolower($_POST['search']))]];
}
$result = select($local_table, $local_fieldsParams, $local_whereParams, $local_orderParams, 0, 0);

?>