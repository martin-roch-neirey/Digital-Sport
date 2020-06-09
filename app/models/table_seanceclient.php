<?php

//----------------------------- functions for 'seanceclient' table -----------------------------

function countSessionClient () // count seanceclient in database
{

	$local_table = 'seanceclient';
    $local_fieldsParams = ['COUNT(*)'];
    return select($local_table, $local_fieldsParams, [], '', 0, 0);

}

?>