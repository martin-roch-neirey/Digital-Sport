<?php

//----------------------------- functions for 'seanceclient' table -----------------------------

function countSessionClient () // count seanceclient in database
{
	$local_table = 'seanceclient';
    $local_fieldsParams = ['COUNT(*)'];
    return select($local_table, $local_fieldsParams, [], '', 0, 0);
}

function addClientSession () // add a session for a client
{
	$local_table = 'seanceclient';
	$local_fieldsParams = ['refclient' => $_SESSION['idclient']];

	insert($local_table,$local_fieldsParams);
}

function getAllClientSession () // get client sessions for a client
{
	$local_table = 'seanceclient';
	$local_fieldsParams = ['idseanceclient'];
	$local_whereParams = [['refclient','=',$_SESSION['idclient']]];

	return select($local_table,$local_fieldsParams,$local_whereParams,'',0,0);
}

function countClientSession () // count the number of client session
{
	$local_table = 'seanceclient';
	$local_fieldsParams = ['COUNT(idseanceclient)'];
	$local_whereParams = [['refclient','=',$_SESSION['idclient']]];
    
    return select($local_table, $local_fieldsParams, $local_whereParams, '', 0, 0);
}

function countClientExercise () // count the number of client exercise
{
	$local_table = 'seanceclient';
	$local_fieldsParams = ['COUNT(idrefchoixexo)'];
	$local_innerJoinParams = [['listerexo','idrefseanceclient ','idseanceclient']];
	$local_whereParams = [['refclient','=',$_SESSION['idclient']]];
    
    return select_ij($local_table,$local_fieldsParams,$local_innerJoinParams,$local_whereParams);
}

?>