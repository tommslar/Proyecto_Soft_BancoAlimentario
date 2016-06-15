<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('pedidos');
$detalle_alimento_id = $_POST['id'];
$fecha_reserva=$_POST['fecha_reserva'];
$hora_reserva=$_POST['hora_reserva'];
$stock=$_POST['stock'];
$view_page='modules/v_definir_cantidad_detalle_alimento.php';
$params=array('fecha_reserva'=>$fecha_reserva,'hora_reserva'=> $hora_reserva, 'stock'=>$stock, 'detalle_alimento_id'=>$detalle_alimento_id);
visualizarPlantilla ($view_page,$params);
?>