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

function select(string $table, array $fieldsParams, array $whereParams, string $orderParams, int $limitParams , int $offsetParams)
{
	$fields = '';

	foreach ($fieldsParams as $param){
		$fields .= $param.', ';
	}
	$fields = substr($fields,0,-2);
	
	$where = '';
	$data_array = [];
	$bindParams_array = [];
	foreach ($whereParams as $param){
        $where .= ($param[0] . ' ' . $param[1] . ' :' . $param[0] . ' AND ');
        array_push($data_array, $param[2]);
        array_push($bindParams_array, (':'.$param[0]));
	}
	$where = substr($where,0,-5);
	$data_prepare = array_combine($bindParams_array, array_values($data_array));

    $sql = 'SELECT ' . $fields . ' FROM ' . $table;
    $sql .= !empty($whereParams) ? ' WHERE ' . $where: '';
    $sql .= !empty($orderParams) ? ' ORDER BY ' . $orderParams: '';
    $sql .= !empty($limitParams) ? ' LIMIT ' . $limitParams: '';
    $sql .= !empty($offsetParams) ? ' OFFSET ' . $offsetParams: '';

	return pdo_query($sql,$data_prepare);
}

function insert(string $table, array $data){
    $fields = array_keys($data);

    $bindParams = array_map(function($field) {
        return ':' . $field;
    }, $fields);

    $params = array_combine($bindParams, array_values($data));

    $sql = 'INSERT INTO ' . $table . ' ('. implode(',', $fields) . ') VALUES(' . implode(',',$bindParams) . ')';

    pdo_query($sql, array_values($params));
}


function delete(string $table, array $whereParams){
	$params = '';
	$data_array = [];
	$bindParams_array = [];
	foreach ($whereParams as $param){
        $params .= ($param[0] . ' ' . $param[1] . ' :' . $param[0] . ' AND ');
        array_push($data_array, $param[2]);
        array_push($bindParams_array, (':'.$param[0]));
	}
	$params = substr($params,0,-5);
	$data_prepare = array_combine($bindParams_array, array_values($data_array));

	$sql = 'DELETE FROM ' . $table . ' WHERE ' . $params;

	pdo_query($sql,$data_prepare);

}

function update(string $table, array $fieldsParams , array $whereParams){

	$fields = '';
	$data_array = [];
	$bindField_array = [];
	
	foreach ($fieldsParams as $param){
        $fields .= ($param[0] . ' ' . $param[1] . ' :' . $param[0] . ', ');
        array_push($data_array, $param[2]);
        array_push($bindField_array, (':'.$param[0]));
	}
	
	$field_prepare = array_combine($bindField_array, array_values($data_array));
    $where_prepare = array(':'.$whereParams[0] => $whereParams[2]);
	
    $fields = substr($fields,0,-2);
    $where = $whereParams[0] . ' ' . $whereParams[1] . ' ' . ':'.$whereParams[0];
    
    $data_prepare = array_merge($field_prepare, $where_prepare);

	$sql = 'UPDATE ' . $table . ' SET ' . $fields . ' WHERE ' . $where;

	pdo_query($sql, $data_prepare);

}