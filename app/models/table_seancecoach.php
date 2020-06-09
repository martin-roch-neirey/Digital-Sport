<?php

//----------------------------- functions for 'seancecoach' table -----------------------------

function countSessionCoach () // count seancecoach in database
{

	$local_table = 'seancecoach';
    $local_fieldsParams = ['COUNT(*)'];
    return select($local_table, $local_fieldsParams, [], '', 0, 0);

}

?>