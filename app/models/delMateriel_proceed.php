<?php

$local_table = 'materiel';
$local_whereParams = [['idmateriel','=', $_POST['idMateriel']]];

delete($local_table, $local_whereParams);

?>