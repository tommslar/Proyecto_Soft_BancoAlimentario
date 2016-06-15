<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
$detalle_alimento_id = $_GET['detalle_alimento_id'];
$pedido_numero = $_GET['numero_pedido'];
require_once ('../model/m_detalle_alimento.class.php');
$detalle_alimento = Detalle_Alimento::get_detalle_alimento($detalle_alimento_id);
require_once ('../model/m_alimento.class.php');
$descripcion = Alimento::get_description($detalle_alimento['alimento_codigo']);
require_once ('../model/m_alimento_pedido.class.php');
$cantidad = Alimento_Pedido::get_numero_cantidad($detalle_alimento_id);
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='sections/v_head.php';
$title = "Ver Alimento ";
$view_page = "modules/v_ver_alimento.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu,'detalle_alimento'=>$detalle_alimento, 'descripcion'=>$descripcion, 'cantidad'=>$cantidad,'pedido_numero'=>$pedido_numero,'head'=>$head);
visualizarPlantilla ($view_page,$params);  
?>