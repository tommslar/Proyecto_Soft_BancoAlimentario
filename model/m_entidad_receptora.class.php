<?php 
require_once ('../model/m_db.php'); 

class Entidad_Receptora{

    static public function list_entidades_receptoras(){
	         $db= db_setup();
		     $sql= "SELECT entidad_receptora.id_entidad_receptora,entidad_receptora.razon_social, entidad_receptora.telefono, entidad_receptora.domicilio, estado_entidad.descripcion as estado, necesidad_entidad.descripcion as necesidad, servicio_prestado.descripcion as servicio_prestado
			 FROM entidad_receptora INNER JOIN estado_entidad ON entidad_receptora.estado_entidad_id = estado_entidad.id_estado_entidad INNER JOIN necesidad_entidad ON entidad_receptora.necesidad_entidad_id = necesidad_entidad.id_necesidad_entidad INNER JOIN servicio_prestado ON entidad_receptora.servicio_prestado_id = servicio_prestado.id_servicio_prestado
		     WHERE entidad_receptora.baja = 0";
		     $query = $db->prepare($sql);
		     $query->execute();
		     return $assistants = $query->fetchAll();
    }
	
	static public function new_entidad_receptora ($razon_social_er, $telefono, $domicilio, $estado_entidad_id, $necesidad_entidad_id,  $servicio_prestado_id) {
	         $db= db_setup();
	         $sql= "INSERT INTO entidad_receptora(`id_entidad_receptora`, `razon_social`, `telefono`, `domicilio`, `estado_entidad_id`, `necesidad_entidad_id`, `servicio_prestado_id`, `baja`) VALUES (NULL, :razon_social_er, :telefono, :domicilio, :estado_entidad_id, :necesidad_entidad_id, :servicio_prestado_id,'0');" ;
	         $query = $db->prepare($sql);
	         $rows= $query->execute(array('razon_social_er' => $razon_social_er, 'telefono' => $telefono, 'domicilio' => $domicilio, 'estado_entidad_id' => $estado_entidad_id, 'necesidad_entidad_id' => $necesidad_entidad_id, 'servicio_prestado_id' => $servicio_prestado_id));
    }
	
	static public function edit_entidad_receptora ($razon_social_er, $telefono, $domicilio, $estado_entidad_id, $necesidad_entidad_id, $servicio_prestado_id, $id){
             $db= db_setup();
             $sql= "UPDATE `entidad_receptora` SET `razon_social`= :razon_social_er,`telefono`= :telefono,`domicilio`= :domicilio,`estado_entidad_id`= :estado_entidad_id,`necesidad_entidad_id`= :necesidad_entidad_id,`servicio_prestado_id`= :servicio_prestado_id WHERE `id_entidad_receptora` = :id;" ;
             $query = $db->prepare($sql);
             $rows= $query->execute(array('razon_social_er' => $razon_social_er, 'telefono' => $telefono, 'domicilio' => $domicilio, 'estado_entidad_id' => $estado_entidad_id, 'necesidad_entidad_id' => $necesidad_entidad_id, 'servicio_prestado_id' => $servicio_prestado_id, 'id' => $id));
             }
			 
	static public function delete_entidad_receptora ($id) {
             $db= db_setup();
             $sql= "UPDATE `entidad_receptora` SET `baja`='1' WHERE `id_entidad_receptora` = :id;" ;
             $query = $db->prepare($sql);
             $rows= $query->execute(array('id' => $id));
    }

	static public function datos_entidad_receptora ($id) {
             $db= db_setup();
             $sql= "SELECT entidad_receptora.id_entidad_receptora,entidad_receptora.razon_social, entidad_receptora.telefono, entidad_receptora.domicilio, estado_entidad.descripcion as estado, necesidad_entidad.descripcion as necesidad, servicio_prestado.descripcion as servicio_prestado
			 FROM entidad_receptora INNER JOIN estado_entidad ON entidad_receptora.estado_entidad_id = estado_entidad.id_estado_entidad INNER JOIN necesidad_entidad ON entidad_receptora.necesidad_entidad_id = necesidad_entidad.id_necesidad_entidad INNER JOIN servicio_prestado ON entidad_receptora.servicio_prestado_id = servicio_prestado.id_servicio_prestado
		     WHERE entidad_receptora.id_entidad_receptora= :id AND entidad_receptora.baja = 0";
             $query = $db->prepare($sql);
             $query->execute(array('id' => $id));
             return $rows=$query->fetch();
    }	
	
	    static public function kilos_pedidos_entregados_x_entidad_receptora($fecha_desde, $fecha_hasta){
	  		 $db= db_setup();
		     $sql= "SELECT entidad_receptora.razon_social, SUM(alimento_pedido.cantidad) AS cantidad FROM entidad_receptora inner join pedido_modelo on entidad_receptora.id_entidad_receptora = pedido_modelo.entidad_receptora_id inner join estado_pedido on estado_pedido.id_estado_pedido = pedido_modelo.estado_pedido_id inner join turno_entrega on turno_entrega.id_turno_entrega = pedido_modelo.turno_entrega_id inner join alimento_pedido on pedido_modelo.numero_pedido_modelo = alimento_pedido.pedido_numero inner join detalle_alimento on detalle_alimento.id_detalle_alimento = alimento_pedido.detalle_alimento_id WHERE pedido_modelo.baja = 0 and alimento_pedido.baja = 0 and detalle_alimento.baja= 0 and estado_pedido.id_estado_pedido= 1 and (turno_entrega.fecha BETWEEN :fecha_desde AND :fecha_hasta) AND detalle_alimento.medida='kg' GROUP BY 1" ;
		     $query = $db->prepare($sql);
		     $query->execute(array('fecha_desde' => $fecha_desde, 'fecha_hasta' => $fecha_hasta));
		     return $assistants = $query->fetchAll();
	  
	  }
	  
	  	static public function get_latitud($entidad_receptora_id) {
        $db= db_setup();
        $sql= "SELECT latitud FROM entidad_receptora WHERE id_entidad_receptora = :entidad_receptora_id" ;
        $query = $db->prepare($sql);
        $query->execute(array('entidad_receptora_id' =>$entidad_receptora_id));
        return $row= $query->fetch();

	}
	
		static public function get_longitud($entidad_receptora_id) {
        $db= db_setup();
        $sql= "SELECT longitud FROM entidad_receptora WHERE id_entidad_receptora = :entidad_receptora_id" ;
        $query = $db->prepare($sql);
        $query->execute(array('entidad_receptora_id' =>$entidad_receptora_id));
        return $row= $query->fetch();

	}
	
		static public function get_domicilio($entidad_receptora_id) {
        $db= db_setup();
        $sql= "SELECT domicilio FROM entidad_receptora WHERE id_entidad_receptora = :entidad_receptora_id" ;
        $query = $db->prepare($sql);
        $query->execute(array('entidad_receptora_id' =>$entidad_receptora_id));
        return $row= $query->fetch();

	}
}
?>