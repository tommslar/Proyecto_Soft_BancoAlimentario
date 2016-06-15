<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
require_once ('../model/m_alimento.class.php');
$codigos_descripciones = Alimento::codes_descriptions();
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='sections/v_head.php';
$title = "Alta De Alimentos ";
$view_page = "modules/v_new_alimento.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu,'codigos_descripciones'=>$codigos_descripciones, 'head'=>$head);
visualizarPlantilla ($view_page,$params);
?>