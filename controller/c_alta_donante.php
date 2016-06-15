<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario']; // aca lo modifique porque decia $_SESSION['usuario'] que era el nombre viejo
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='sections/v_head.php';
$title = "Alta de Donantes ";
$view_page = "modules/v_alta_donante.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu,'head'=>$head);
visualizarPlantilla ($view_page,$params);
?>