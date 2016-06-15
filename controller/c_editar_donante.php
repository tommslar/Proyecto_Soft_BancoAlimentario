<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('donantes');
$id_donante= $_GET["id_donante"] ;
require_once ('../model/m_donante.class.php');
$donante = Donante::datos_donante($id_donante);
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='sections/v_head.php';
$title = "Alta de Donantes ";
$view_page = "modules/v_edit_donante.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu, 'head'=>$head, 'donante'=>$donante);
visualizarPlantilla ($view_page,$params);
?>