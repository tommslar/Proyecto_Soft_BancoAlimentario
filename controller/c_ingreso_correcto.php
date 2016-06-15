<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
session_start();
   $_SESSION['nombreusuario'] = $usu;
   $_SESSION['perfil'] =  $p;
   $_SESSION['nomyape'] =  $nyp;
   $_SESSION['autorizado'] = True;     
switch ($_SESSION['perfil']) {
             case "administrador":
			       $_SESSION['menu'] = "sections/v_menu_admin.php";
				   $_SESSION['view'] = "modules/v_ingreso_admin.php";	 
				   break;
             case "consulta":
			      $_SESSION['menu'] = "sections/v_menu_consulta.php";
				  $_SESSION['view'] = "modules/v_ingreso_consulta.php";
				  break;
			case "gestion":
			      $_SESSION['menu'] = "sections/v_menu_gestion.php";
				  $_SESSION['view'] = "modules/v_ingreso_gestion.php";
				  break;	  
}

$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='sections/v_head.php';
$title = "Mi Perfil";
$date = date(date('Y-m-d'));
$view_page = $_SESSION['view'];
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu, 'head'=>$head, 'date'=>$date);
visualizarPlantilla ($view_page,$params);
?>