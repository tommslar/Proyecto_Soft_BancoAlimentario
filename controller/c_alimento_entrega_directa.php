<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('pedidos');
$detalle_alimento_id = $_GET['detalle_alimento_id'];
$alimento_descripcion = $_GET['alimento_descripcion'];
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='sections/v_head.php';
$title = "Alimento Entrega Directa ";
$view_page = "modules/v_alimento_entrega_directa.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu, 'detalle_alimento_id'=>$detalle_alimento_id, 'alimento_descripcion' =>$alimento_descripcion, 'head'=>$head);
visualizarPlantilla ($view_page,$params);
?>