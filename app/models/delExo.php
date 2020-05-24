<?php

$local_table = 'exercice';
$local_fieldsParams = ['idexercice','nomexo','description'];
$local_orderParams = 'nomexo ASC';

$result = select($local_table, $local_fieldsParams, [], $local_orderParams, 0, 0);

?>