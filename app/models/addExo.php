<?php

$local_table = 'materiel';
$local_fieldsParams = ['idmateriel','nommateriel'];
$local_orderParams = 'nommateriel ASC';

$result = select($local_table, $local_fieldsParams, [], $local_orderParams, 0, 0);

?>