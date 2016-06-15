<?php

require_once ('../model/m_db.php'); 

class Alimento_Pedido{

       	static public function get_numero_cantidad($detalle_alimento_id) {
        $db= db_setup();
        $sql= "select alimento_pedido.cantidad FROM alimento_pedido WHERE detalle_alimento_id = :detalle_alimento_id" ;
        $query = $db->prepare($sql);
        $query->execute(array('detalle_alimento_id' =>$detalle_alimento_id));
        return $row= $query->fetch();
	}
  
        static public function new_alimento_pedido($pedido_modelo_id, $detalle_alimento_id, $cantidad_reserva) {
	     $db= db_setup();
	     $sql= "INSERT INTO alimento_pedido(`pedido_numero`, `detalle_alimento_id`, `cantidad`, `baja`) VALUES (:pedido_modelo_id, :detalle_alimento_id, :cantidad_reserva, '0');" ;
	     $query = $db->prepare($sql);
	     $query->execute(array('pedido_modelo_id'=>$pedido_modelo_id, 'detalle_alimento_id'=>$detalle_alimento_id, 'cantidad_reserva' =>$cantidad_reserva));
	}
	
	  static public function get_detalle_alimento_id($numero_pedido){
        $db= db_setup();
        $sql= "select alimento_pedido.detalle_alimento_id FROM alimento_pedido WHERE pedido_numero = :numero_pedido" ;
        $query = $db->prepare($sql);
        $query->execute(array('numero_pedido' =>$numero_pedido));
        return $row= $query->fetch();
	}
	
		
	  static public function get_cantidad($numero_pedido, $detalle_alimento_id) {
        $db= db_setup();
        $sql= "select alimento_pedido.cantidad FROM alimento_pedido WHERE pedido_numero = :numero_pedido and detalle_alimento_id = :detalle_alimento_id" ;
        $query = $db->prepare($sql);
        $query->execute(array('numero_pedido' =>$numero_pedido, 'detalle_alimento_id' =>$detalle_alimento_id));
        return $row= $query->fetch();
	}
}
?>