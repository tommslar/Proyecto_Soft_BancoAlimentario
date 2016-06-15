<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
require_once ('../model/m_estado_entidad.class.php');
$estados = Estado_Entidad::get_states();
require_once ('../model/m_necesidad_entidad.class.php');
$necesidades = Necesidad_Entidad::get_needs();
require_once ('../model/m_servicio_entidad.class.php');
$servicios = Servicio_Entidad::get_services() ;  
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='sections/v_head.php';
$title = "Alta de Entidad Receptora ";
$view_page = "modules/v_alta_entidad_receptora.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu,'head'=>$head, 'estados' => $estados, 'necesidades'=> $necesidades, 'servicios' =>$servicios);
visualizarPlantilla ($view_page,$params);
?>