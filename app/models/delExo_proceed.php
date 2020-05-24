<?php

$local_table = 'exercice';
$local_whereParams = [['idexercice','=', $_POST['idExercice']]];

delete($local_table, $local_whereParams);

?>