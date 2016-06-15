<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('../model/m_configuracion.class.php');
$valor = Configuracion::get_valor(4);
$clave_api = $valor['valor']; 
$valor = Configuracion::get_valor(5);
$clave_secreta = $valor['valor'];
$valor = Configuracion::get_valor(6);
$secreto_usuario_oauth = $valor['valor'];
$valor = Configuracion::get_valor(7);
$credencial_usuario_oauth = $valor['valor'];

$oauth = new OAuth($clave_api, $clave_secreta);
$oauth->setToken($credencial_usuario_oauth, $secreto_usuario_oauth);
 
$params = array();
$headers = array();
$method = OAUTH_HTTP_METHOD_GET;
  
// Specify LinkedIn API endpoint to retrieve your own profile
//$url = "https://api.linkedin.com/v1/people/~";
 
// By default, the LinkedIn API responses are in XML format. If you prefer JSON, simply specify the format in your call
 $url = "https://api.linkedin.com/v1/people/~?format=json";
 
// Make call to LinkedIn to retrieve your own profile
$oauth->fetch($url, $params, $method, $headers);
  
$result = $oauth->getLastResponse();
$json = json_decode($result);
$title = "Banco Alimentario de La Plata";
$link="../controller/c_login.php";
$log ="Iniciar Sesion";
$view_page = "modules/v_nosotros.php";
$params=array('title'=>$title,'link'=>$link,'log'=>$log, 'json'=>$json);
visualizarPlantilla ($view_page,$params);


//Empresa:	banco de alimentos de la plata
//Nombre de la aplicación:	BAP
//Clave de la API:	75ygkr87f5l0o9
//Clave secreta:	K03OgAMr4taHAMlz
//Credencial del usuario OAuth:	a9dd7f82-7372-4f4a-84e4-08277df69c3c
//Secreto del usuario OAuth:	58c77cd6-dee1-45e3-ac8b-9cc3b34122c3
?>