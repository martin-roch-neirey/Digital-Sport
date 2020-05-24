<?php

$local_table = 'contact';
$local_fieldsParams = ['date','mail','message'];
$local_whereParams = [];
$local_orderParams = 'date DESC';

if (!empty($_POST['search'])){
	$local_whereParams = [['date','=',$_POST['search']]];
}
$result = select($local_table, $local_fieldsParams, $local_whereParams, $local_orderParams, 0, 0);

if (empty($result)){
	$local_data = ['success_message' => 'Aucun message pour le : ' . $_POST['search']];
} elseif (!empty($_POST['search'])) {
	$local_data = ['success_message' => 'Liste des messages pour le : ' . $_POST['search'], $result];
} else{
	$local_data = ['success_message' => 'Liste des messages :', $result];
}

?>