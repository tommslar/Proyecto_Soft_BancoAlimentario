<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('pedidos');
$entidad_receptora_id = $_GET['entidad_receptora_id'];

$clima = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=La_Plata,Argentina");
$json = json_decode($clima);

$country = $json->sys->country; 
$ciudad = $json->name;
$lat = $json->coord->lat;
$lon = $json->coord->lon;
$temp = $json->main->temp;
$tempmax = $json->main->temp_max;
$tempmin = $json->main->temp_min;
$presion = $json->main->pressure;
$humedad = $json->main->humidity;
$vel_viento = $json->main->temp;
$estado_cielo = $json->weather[0]->main;
$descripcion = $json->weather[0]->description;

require_once ('../model/m_configuracion.class.php');
$latitud_banco= Configuracion::get_configuracion(11);
$lat_banco = $latitud_banco['valor'];
$longitud_banco= Configuracion::get_configuracion(12);
$long_banco = $longitud_banco['valor'];

require_once ('../model/m_entidad_receptora.class.php');
$latitud_er= Entidad_Receptora::get_latitud($entidad_receptora_id);
$lat_er = $latitud_er['latitud'];
$longitud_er= Entidad_Receptora::get_longitud($entidad_receptora_id);
$long_er = $longitud_er['longitud'];
$domicilio_er= Entidad_Receptora::get_domicilio($entidad_receptora_id);
$domicilio_er = $domicilio_er['domicilio'];

$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='sections/v_head_mapa_recorrido.php';
$title = "Configuracion del Sistema ";
$view_page = "modules/v_mostrar_recorrido.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu, 'head'=>$head,'descripcion'=>$descripcion ,'estado_cielo'=> $estado_cielo, 'vel_viento'=>$vel_viento, 'humedad'=>$humedad, 'presion'=>$presion, 'tempmin'=>$tempmin, 'tempmax'=>$tempmax,'temp'=>$temp, 'lon'=>$lon, 'lat'=>$lat, 'ciudad'=>$ciudad, 'country'=> $country,  'lat_er'=>$lat_er, 'long_er'=>$long_er, 'lat_banco'=> $lat_banco,'long_banco' =>$long_banco, 'domicilio_er'=>$domicilio_er);
    visualizarPlantilla ($view_page,$params);
?>