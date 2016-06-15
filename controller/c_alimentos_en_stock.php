<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
require_once ('../model/m_alimento.class.php');
$alimentos_en_stock = Alimento::alimentos_en_stock();
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='sections/v_head.php';
$title = "Alimentos En Stock ";
$view_page = "modules/v_alimentos_en_stock.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu, 'alimentos_en_stock' =>$alimentos_en_stock, 'head'=>$head);
visualizarPlantilla ($view_page,$params);
?>