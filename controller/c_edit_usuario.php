<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('usuarios');
$id_usuario= $_GET["id_usuario"] ;
require_once ('../model/m_usuario.class.php');
$datos_usuario = Usuario::datos_usuario($id_usuario);
require_once ('../model/m_perfil_usuario.class.php');
$perfiles = Perfil_Usuario::list_perfiles_menos_id($datos_usuario['perfil_usuario_id']);
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='sections/v_head.php';
$title = "Editar Usuario ";
$view_page = "modules/v_edit_usuario.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu, 'head'=>$head, 'datos_usuario'=>$datos_usuario, 'perfiles'=>$perfiles);
visualizarPlantilla ($view_page,$params);

?>