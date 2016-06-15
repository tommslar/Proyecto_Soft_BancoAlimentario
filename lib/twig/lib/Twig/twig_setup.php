<?php
//Funcion que configura la carga generica de las plantillas
function visualizarPlantilla($template,$params){
	require_once("Autoloader.php");
	Twig_Autoloader::register();
	$dir="../views/default/";
	$loader = new Twig_Loader_Filesystem($dir);
	$twig = new Twig_Environment($loader);
	$template = $twig->loadTemplate($template);
	$template->display($params);
}
?>