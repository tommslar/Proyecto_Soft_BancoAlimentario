<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('entidad_receptora');
require_once ('../model/m_entidad_receptora.class.php');
$entidades_receptoras =Entidad_Receptora::list_entidades_receptoras();
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='sections/v_head.php';
$title = "ABM entidades receptoras ";
$view_page = "modules/v_abm_entidades_receptoras.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu,'entidades_receptoras'=>$entidades_receptoras, 'head'=>$head);
visualizarPlantilla ($view_page,$params);
?>