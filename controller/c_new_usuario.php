<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('usuarios');
require_once ('../model/m_perfil_usuario.class.php');
$perfiles = Perfil_Usuario::list_perfiles();
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='sections/v_head.php';
$title = "nuevo usuario ";
$view_page = "modules/v_new_usuario.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu,'perfiles'=>$perfiles, 'head'=>$head);
visualizarPlantilla ($view_page,$params);
?>