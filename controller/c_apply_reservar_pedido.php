<?php 
require_once ('c_check_functions.php');
check_session_status();
$fecha_reserva=$_POST['fecha_reserva'];
$hora_reserva = $_POST['hora_reserva'];
$entidad_receptora_id = $_POST['entidad_receptora'];
$con_envio=$_POST['con_envio'];
$alimentos = $_SESSION['alimentos'];
$cantidades = $_SESSION['cantidades'];
	
require_once ('../model/m_turno_entrega.class.php');
Turno_Entrega::new_turno_entrega($fecha_reserva, $hora_reserva);
$turno_entrega = Turno_Entrega::ultimo_turno_entrega_id();
$turno_entrega_id=$turno_entrega['id_turno_entrega'];
require_once ('../model/m_pedido_modelo.class.php');
Pedido_Modelo::new_pedido_modelo($entidad_receptora_id, $turno_entrega_id, $con_envio);
$pedido = pedido_modelo::ultimo_numero_pedido_modelo();
$pedido_modelo_id=$pedido['numero_pedido_modelo'];
$cant = 0;
for($i = 0; $i<count($alimentos); $i++){
     $detalle_alimento_id=$alimentos[$i]['id_detalle_alimento'];
     $cantidad_reserva = $cantidades[$i];
	 $cant = $cant + $cantidades[$i];
     require_once ('../model/m_detalle_alimento.class.php');
     $detalle = Detalle_Alimento::get_reservado($detalle_alimento_id);
     $reservado = ($detalle['reservado']) + $cantidad_reserva;
     Detalle_Alimento::actualizar_reservado($detalle_alimento_id, $reservado);
     $detalle = Detalle_Alimento::get_stock($detalle_alimento_id);
     $stock = ($detalle['stock']) - $cantidad_reserva;
     Detalle_alimento::modificarStock($detalle_alimento_id, $stock);
}	 


for($j = 0; $i<count($alimentos); $j++){
     echo $detalle_alimento_id=$a[$j]['id_detalle_alimento'];
     echo $cantidad_reserva = $cantidades[$j];
	 require_once ('../model/m_alimento_pedido.class.php');
     Alimento_Pedido::new_alimento_pedido($pedido_modelo_id, $detalle_alimento_id, $cant);
}
//header('Location:c_abm_pedidos_modelo.php');
?>