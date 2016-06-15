<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('usuarios');
require_once ('../model/m_usuario.class.php');
$usuarios = Usuario::list_usuarios();
if(count($usuarios) > 0){
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='sections/v_head.php';
$title = "ABM usuarios ";
$view_page = "modules/v_abm_usuarios.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu,'usuarios'=>$usuarios, 'head'=>$head);
visualizarPlantilla ($view_page,$params);
}
else
     header('location:c_sin_resultados.php');
?>