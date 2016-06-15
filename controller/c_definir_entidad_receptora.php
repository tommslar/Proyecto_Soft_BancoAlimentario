<?php
require_once '../lib/twig/lib/Twig/twig_setup.php'; 
require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('pedidos');
$head='../views/default/sections/v_head.php';
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
     $hora_reserva=$_POST['hora_reserva'];
     $fecha_reserva=$_POST['fecha_reserva'];
     require_once ('../model/m_entidad_receptora.class.php');
     $entidades_receptoras = Entidad_Receptora::list_entidades_receptoras();
	 $head='sections/v_head.php';
     $title = "definir entidad receptora ";	 
     $view_page = 'modules/v_definir_entidad_receptora.php';	 

     $params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu,'entidades_receptoras'=>$entidades_receptoras, 'hora_reserva'=>$hora_reserva, 'fecha_reserva'=>$fecha_reserva, 'head'=>$head);
     visualizarPlantilla ($view_page,$params); 

?>