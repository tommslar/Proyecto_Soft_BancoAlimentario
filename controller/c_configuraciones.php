<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('configuraciones');
require_once ('../model/m_configuracion.class.php');
$configuraciones= Configuracion::datos_configuracion_menos_coordenadas();
$latitud_banco= Configuracion::get_configuracion(11);
$lat = $latitud_banco['valor'];
$longitud_banco= Configuracion::get_configuracion(12);
$lon = $longitud_banco['valor'];
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='sections/v_head_mapa_coord.php';
$title = "Configuracion del Sistema ";
$view_page = "modules/v_configuraciones.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu, 'head'=>$head, 'configuraciones' => $configuraciones, 'lat'=> $lat, 'lon'=>$lon, 'latitud_banco'=>$latitud_banco, 'longitud_banco'=>$longitud_banco );
visualizarPlantilla ($view_page,$params);
?>