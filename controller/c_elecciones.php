<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('pedidos');
$cantidad_reserva=$_POST['cantidad_reserva'];
echo $fecha_reserva = $_POST['fecha_reserva'];
echo $hora_reserva = $_POST['hora_reserva'];
$detalle_alimento_id = $_POST['id_detalle_alimento'];
require_once ('../model/m_detalle_alimento.class.php');
//$detalle = Detalle_Alimento::get_reservado($detalle_alimento_id);
//$reservado = ($detalle['reservado']) + $cantidad_reserva;
//Detalle_Alimento::actualizar_reservado($detalle_alimento_id, $reservado);
//$d = Detalle_Alimento::get_stock($detalle_alimento_id);
//$stock = ($d['stock']) - $cantidad_reserva;
//Detalle_alimento::modificarStock($detalle_alimento_id, $stock);
$detalle_alimento = Detalle_Alimento::get_info_detalle_alimento($detalle_alimento_id);
$_SESSION['alimentos'][]=$detalle_alimento;
$alimentos = $_SESSION['alimentos'];
$_SESSION['cantidades'][]=$cantidad_reserva;
$cantidades = $_SESSION['cantidades'];
$cantidad = count($alimentos) -1;
$view_page='modules/v_elecciones.php';
$params=array('alimentos'=>$alimentos,'cantidades'=>$cantidades ,'cantidad'=>$cantidad, 'fecha_reserva'=>$fecha_reserva, 'hora_reserva'=>$hora_reserva);
visualizarPlantilla ($view_page,$params);
?>