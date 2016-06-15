<?php
 require_once '../lib/twig/lib/Twig/twig_setup.php';
 require_once 'c_check_functions.php';
 check_session_status();
 $menu = $_SESSION['menu'];
 $usuario = $_SESSION['nombreusuario'];
 $perfil = $_SESSION['perfil'];
 $nomyape = $_SESSION['nomyape'];
 $head='sections/v_head.php';
 $title = "Ingreso no Autorizado";
 $view_page = "modules/v_error_privillegios.php";
 $params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu, 'head'=>$head,'usuario'=>$usuario);
 visualizarPlantilla ($view_page,$params);
?>