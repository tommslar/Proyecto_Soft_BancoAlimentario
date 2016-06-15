<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('donantes');
require_once ('../model/m_donante.class.php');
$donantes = Donante::list_donantes();
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='sections/v_head.php';
$title = "ABM Donantes ";
$view_page = "modules/v_abm_donantes.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu,'donantes'=>$donantes, 'head'=>$head);
visualizarPlantilla ($view_page,$params);
?>