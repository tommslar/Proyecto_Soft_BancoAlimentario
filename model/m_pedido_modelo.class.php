<?php 
require_once ('../model/m_db.php'); 

class Pedido_Modelo{

    static public function new_pedido_modelo($entidad_receptora_id, $turno_entrega_id, $con_envio) {
	     $db= db_setup();
	     $sql= "INSERT INTO pedido_modelo(`numero_pedido_modelo`, `fecha_ingreso`, `con_envio`, estado_pedido_id, `entidad_receptora_id`, `turno_entrega_id`, `baja`) VALUES (NULL, CURRENT_DATE(), :con_envio, '3', :entidad_receptora_id, :turno_entrega_id, '0');" ;
	     $query = $db->prepare($sql);
	     $query->execute(array( 'entidad_receptora_id'=>$entidad_receptora_id, 'turno_entrega_id' =>$turno_entrega_id, 'con_envio'=>$con_envio ));
	}
 	static public function get_pedido_modelo ($turno){
		     $db= db_setup();
		     $sql= "SELECT pedido_modelo.numero_pedido_modelo, pedido_modelo.fecha_ingreso,pedido_modelo.con_envio, pedido_modelo.entidad_receptora_id, pedido_modelo.estado_pedido_id
             FROM  pedido_modelo 
		     WHERE  pedido_modelo.turno_entrega_id = :turno AND pedido_modelo.baja = 0" ;
		     $query = $db->prepare($sql);
		     $query->execute(array('turno' => $turno));
		     return $rows = $query->fetch();
     }

    static public function list_pedidos_modelo(){
	  		 $db= db_setup();
		     $sql= "SELECT pedido_modelo.numero_pedido_modelo, pedido_modelo.fecha_ingreso, pedido_modelo.con_envio, pedido_modelo.estado_pedido_id, estado_pedido.descripcion, pedido_modelo.turno_entrega_id, pedido_modelo.entidad_receptora_id, entidad_receptora.razon_social, entidad_receptora.telefono, entidad_receptora.domicilio, alimento_pedido.detalle_alimento_id FROM pedido_modelo inner join estado_pedido on pedido_modelo.estado_pedido_id=estado_pedido.id_estado_pedido inner join entidad_receptora on pedido_modelo.entidad_receptora_id =entidad_receptora.id_entidad_receptora left join alimento_pedido on pedido_modelo.numero_pedido_modelo = alimento_pedido.pedido_numero inner join detalle_alimento on alimento_pedido.detalle_alimento_id = detalle_alimento.id_detalle_alimento inner join alimento on detalle_alimento.alimento_codigo = alimento.codigo WHERE pedido_modelo.baja = 0 and entidad_receptora.baja = 0 and alimento_pedido.baja = 0 and detalle_alimento.baja = 0 and alimento.baja = 0 ORDER BY 4 DESC" ;
		     $query = $db->prepare($sql);
		     $query->execute();
		     return $assistants = $query->fetchAll();
	  
	  }  

	  static public function list_pedidos_modelo_fecha_actual(){
	  		 $db= db_setup();
		     $sql= "SELECT pedido_modelo.numero_pedido_modelo, pedido_modelo.fecha_ingreso, pedido_modelo.con_envio, pedido_modelo.estado_pedido_id, estado_pedido.descripcion, pedido_modelo.turno_entrega_id, pedido_modelo.entidad_receptora_id, entidad_receptora.razon_social, entidad_receptora.telefono, entidad_receptora.domicilio, alimento_pedido.detalle_alimento_id FROM pedido_modelo inner join estado_pedido on pedido_modelo.estado_pedido_id=estado_pedido.id_estado_pedido inner join turno_entrega on turno_entrega.id_turno_entrega = pedido_modelo.turno_entrega_id inner join entidad_receptora on pedido_modelo.entidad_receptora_id =entidad_receptora.id_entidad_receptora left join alimento_pedido on pedido_modelo.numero_pedido_modelo = alimento_pedido.pedido_numero inner join detalle_alimento on alimento_pedido.detalle_alimento_id = detalle_alimento.id_detalle_alimento inner join alimento on detalle_alimento.alimento_codigo = alimento.codigo WHERE turno_entrega.fecha = CURRENT_DATE() and pedido_modelo.baja = 0 and entidad_receptora.baja = 0 and alimento_pedido.baja = 0 and detalle_alimento.baja = 0 and alimento.baja = 0 ORDER BY 4 DESC" ;
		     $query = $db->prepare($sql);
		     $query->execute();
		     return $assistants = $query->fetchAll();
	  
	  }
	  
	  	  static public function marcar_pedido_no_entregado($numero_pedido){
	  		 $db= db_setup();
		     $sql= "UPDATE `pedido_modelo` SET `estado_pedido_id`= 2 WHERE numero_pedido_modelo = :numero_pedido and baja = 0" ;
		     $query = $db->prepare($sql);
		     $rows=$query->execute(array(':numero_pedido' => $numero_pedido));
	  
	  }
	  
	   	  static public function kilos_pedidos_entregados($fecha_desde, $fecha_hasta){
	  		 $db= db_setup();
		     $sql= " SELECT pedido_modelo.numero_pedido_modelo, SUM(alimento_pedido.cantidad) AS cantidad FROM pedido_modelo inner join estado_pedido on estado_pedido.id_estado_pedido = pedido_modelo.estado_pedido_id inner join turno_entrega on turno_entrega.id_turno_entrega = pedido_modelo.turno_entrega_id inner join alimento_pedido on pedido_modelo.numero_pedido_modelo = alimento_pedido.pedido_numero inner join detalle_alimento on detalle_alimento.id_detalle_alimento = alimento_pedido.detalle_alimento_id WHERE pedido_modelo.baja = 0 and alimento_pedido.baja = 0 and detalle_alimento.baja= 0 and estado_pedido.id_estado_pedido= 1 and (turno_entrega.fecha BETWEEN :fecha_desde AND :fecha_hasta) AND detalle_alimento.medida='kg' GROUP BY 1" ;
		     $query = $db->prepare($sql);
		     $query->execute(array('fecha_desde' => $fecha_desde, 'fecha_hasta' => $fecha_hasta));
		     return $assistants = $query->fetchAll();
	  
	  }	 
	  
	      static public function ultimo_numero_pedido_modelo() {
	           $db= db_setup();
	           $sql= "SELECT numero_pedido_modelo FROM pedido_modelo ORDER BY numero_pedido_modelo DESC LIMIT 1;" ;
	           $query = $db->prepare($sql);
		       $rows= $query->execute();
		       return $query->fetch() ;

	}
	
		 static public function marcar_pedido_entregado($numero_pedido){
	  		 $db= db_setup();
		     $sql= "UPDATE `pedido_modelo` SET `estado_pedido_id`= 1 WHERE numero_pedido_modelo = :numero_pedido and baja = 0" ;
		     $query = $db->prepare($sql);
		     $rows=$query->execute(array(':numero_pedido' => $numero_pedido));
	  
	  }
      
	  	static public function delete_pedido ($numero) {
         $db= db_setup();
         $sql= "UPDATE pedido_modelo SET baja ='1' WHERE numero_pedido_modelo = :numero;" ;
         $query = $db->prepare($sql);
         $rows= $query->execute(array('numero' => $numero));

    }
}
?>