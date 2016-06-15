<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('pedidos');
$fecha_reserva = $_GET['fecha_reserva'];
$hora_reserva = $_GET['hora_reserva'];
require_once ('../model/m_alimento.class.php');
$codigos_descripciones = Alimento::codes_descriptions();
$head='sections/v_head.php';
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$title = "Eleccion Del Alimento ";
$_SESSION['alimentos']=array();
$_SESSION['cantidades']=array();
$view_page = "modules/v_asignar_alimento.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu, 'head'=>$head, 'codigos_descripciones'=>$codigos_descripciones, 'fecha_reserva'=>$fecha_reserva, 'hora_reserva'=>$hora_reserva );
visualizarPlantilla ($view_page,$params);
?>