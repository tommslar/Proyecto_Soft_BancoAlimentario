<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('pedidos');
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
require_once ('c_check_functions.php');
check_session_status();
$numero_pedido = $_GET['numero'];
require_once ('../model/m_pedido_modelo.class.php');
Pedido_Modelo::marcar_pedido_entregado($numero_pedido);

$title = "operacion exitosa";
$head='sections/v_head.php';
$view_page = "modules/v_mensaje.php";
$msj="OPERACION EXITOSA";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu, 'msj'=>$msj, 'head'=>$head);
visualizarPlantilla ($view_page,$params);
?>