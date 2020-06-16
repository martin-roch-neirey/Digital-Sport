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
	$layout = explode('/', $view_path);
	extract($data);

	if(!file_exists($view)) {
		require_once VIEW_PATH . "/errors/500.php";
		return false;
	}
	
	if (($use_layout) and ($layout[0] == 'admin')){
		require_once VIEW_PATH ."/layouts/backoffice/header.php";
	}elseif (($use_layout) and ($layout[0] == 'pagemembre')){
		require_once VIEW_PATH ."/layouts/memberpage/header.php";
	}elseif ($use_layout){
		require_once VIEW_PATH ."/layouts/frontoffice/header.php";
	}

	require_once $view;

	if (($use_layout) and ($layout[0] == 'admin')){
		require_once VIEW_PATH ."/layouts/backoffice/footer.php";
	}elseif (($use_layout) and ($layout[0] == 'pagemembre')){
		require_once VIEW_PATH ."/layouts/memberpage/footer.php";
	}elseif ($use_layout){
		require_once VIEW_PATH ."/layouts/frontoffice/footer.php";
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

/**
 * cree une url pour un lien de l'application
 * 
 * @param  string      $controller le controller sur lequel on navigue
 * @param  string|null $action     l'action du controller
 * @param  array       $get_params les parametres get qu'on veux dans l'url sous la forme de tableau cle => valeur
 * @return [type]                  l'url au format // www.monsite.com/index.php?controller=home&action=index&param1=param
 */
function get_url(string $controller, string $action = null,array $get_params = []) {
	$base_url = get_config('app_url');

	$url = $base_url . '/index.php?controller=' . $controller;
	$url .= isset($action) ? '&action=' . $action: '';
	$url .= (!empty($get_params) ? http_build_query($get_params): '');

	return $url;
}

/**
 * renvoi l'url vers un asset
 * 
 * @param  [type] $path le chemin relatif de l'asset par rapport a mvc/public/
 * @return [type]       
 */
function get_asset($path) {
	if(!file_exists(PUBLIC_PATH . '/' . $path)) {
		display_view('errors/500', null, false);
		exit;
	}
	return get_config('app_url') . '/' . $path;
}