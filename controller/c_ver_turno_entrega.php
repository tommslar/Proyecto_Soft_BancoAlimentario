<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('pedidos');
$turno_entrega_id = $_GET['turno_entrega_id'];
$pedido_numero = $_GET['numero_pedido'];
require_once ('../model/m_turno_entrega.class.php');
$turno_entrega = Turno_Entrega::get_turno_entrega($turno_entrega_id);
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='sections/v_head.php';
$title = "Ver Turno ";
$view_page = "modules/v_ver_turno_entrega.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu,'$pedido_numero'=>$pedido_numero, 'turno_entrega'=>$turno_entrega, 'head'=>$head);
visualizarPlantilla ($view_page,$params); 
?>