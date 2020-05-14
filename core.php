<?php

/**
 * affiche une page
 * 
 * @param  string       $view_path  [description]
 * @param  array        $data       [description]
 * @param  bool|boolean $use_layout [description]
 * @return [type]                   [description]
 */
function display_view(string $view_path, array $data = [], bool $use_layout = true)
{
	$view = VIEW_PATH . '/' . str_replace('.php', '', $view_path) . ".php";

	extract($data);

	if(!file_exists($view)) {
		require_once VIEW_PATH . "/errors/500.php";
		return false;	
	}
	
	if ($use_layout) {
		require_once VIEW_PATH ."/layouts/header.php";
	}

	require_once $view;

	if ($use_layout) {
		require_once VIEW_PATH ."/layouts/footer.php";
	}
}

/**
 * @param  array  $arr  [description]
 * @param  string $path [description]
 * @return [type]       [description]
 */
function get_item_rec(array $arr, string $path)
{
	if(!isset($arr) || empty($arr))
		return NULL;	

	if(strpos($path, '.') === FALSE)
	{
		if(isset($arr[$path]))
			return ($arr[$path]);
		return NULL;
	}

	$curr_key = substr($path, 0, strpos($path, '.'));
	$next_path = substr($path, strpos($path, '.') + 1);

	return get_item_rec($arr[$curr_key], $next_path);

}

/**
 * fonction qui recupere une variable du tableau de configuration
 * ex: si on veux recuperer $config['database']['db_name'], la variable '$path' vaudra 'database.db_name'
 * @param  string $item [description]
 * @return [type]       [description]
 */
function get_config(string $item)
{
	$config = require (APP_ROOT . '/app/config.php');

	return get_item_rec($config, $item) ?? null;
}
