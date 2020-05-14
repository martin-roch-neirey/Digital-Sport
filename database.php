<?php

/**
 * retourne une instance PDO
 * @param  [type] $config [description]
 * @return [type]         [description]
 */
function getPdo($config = null) {

	list('driver' => $driver,
		'db_host' => $host,
		'db_name' => $dbname,
		'db_port' => $port,
		'db_user' => $user,
		'db_password' => $password) = get_config('database');

	$dsn = "$driver:dbname=$dbname;host=$host;port=$port";

	try {
    	$dbh = new PDO($dsn, $user, $password); //objet PDO
    	
	} catch (PDOException $e) { //connexion échouée
		display_view('errors/500', ['error_message' => $e->getMessage()], false);
		die("");
	}

	return $dbh; //retourne objet PDO en cas de succès
}

/**
 * execute une requete prepare
 * @param  string     $sql    [description]
 * @param  array|null $params [description]
 * @return [type]             [description]
 */
function pdo_query(string $sql,array $params = null)
{
	global $dbh;
	$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); //sortir les erreurs de la BDD pour debbug

	$sth = $dbh->prepare($sql);
	$sth->execute($params);
	
	return $sth->fetchAll(PDO::FETCH_ASSOC); //exécuter une requête préparée
}

function select($table, $fields, array $whereParams, array $orderParams = null, $limitParams = null, $offsetParams = null)
{
	$where = '';
	$order = '';

	foreach ($whereParams as $param){
		foreach ($param as $values) {
			$where .= ($values.' ');
		}
		$where .= 'AND ';
	}
	$where = substr($where,0,-5);

	foreach ($orderParams as $param){
		foreach ($param as $values) {
			$order .= (' '.$values);
		}
		$order .= ',';
	}
	$order = substr($order,1,-1);

	$sql = 'SELECT $fields FROM $table WHERE $where ORDER BY $order LIMIT $limitParams OFFSET $offsetParams;';

	pdo_query($sql);

}

function insert($table, array $data){
    $fields = array_keys($data);

    $bindParams = array_map(function($field) {
        return ':' . $field;
    }, $fields);

    $params = array_combine($bindParams, array_values($data));

    $sql = 'INSERT INTO $table ('. implode(',', $fields) . ') VALUES(' . $bindParams . ')';

    pdo_query($sql, array_values($params));
}


function delete($table, $WhereParams)
{

}