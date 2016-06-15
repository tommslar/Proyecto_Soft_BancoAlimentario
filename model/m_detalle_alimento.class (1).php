<?php

require_once ('../model/m_db.php'); 

class Detalle_Alimento{

	static public function get_detalle_alimento ($id){
		     $db= db_setup();
		     $sql= "SELECT detalle_alimento.alimento_codigo, detalle_alimento.fecha_vencimiento, detalle_alimento.cantidad_contenido, detalle_alimento.peso_unitario, detalle_alimento.medida
             FROM detalle_alimento 
		     WHERE detalle_alimento.id_detalle_alimento = :id AND detalle_alimento.baja = 0" ;
		     $query = $db->prepare($sql);
		     $query->execute(array('id' => $id));
		     return $rows = $query->fetch();
     }
	 
	static public function get_info_detalle_alimento ($id){
		     $db= db_setup();
		     $sql= "SELECT detalle_alimento.alimento_codigo, alimento.descripcion, detalle_alimento.cantidad_contenido, detalle_alimento.peso_unitario, detalle_alimento.medida, detalle_alimento.id_detalle_alimento, detalle_alimento.reservado
             FROM detalle_alimento inner join alimento on detalle_alimento.alimento_codigo=alimento.codigo 
		     WHERE detalle_alimento.id_detalle_alimento = :id AND detalle_alimento.baja = 0" ;
		     $query = $db->prepare($sql);
		     $query->execute(array('id' => $id));
		     return $rows = $query->fetch();
     }

    static public function search_detalle_alimento($id, $codigo, $cantidad_contenido, $peso_unitario, $medida) {
		 $db= db_setup();
		 $sql= "SELECT * FROM detalle_alimento WHERE detalle_alimento.id_detalle_alimento <> :id AND alimento_codigo = :codigo AND cantidad_contenido = :cantidad_contenido AND peso_unitario= :peso_unitario AND medida=:medida AND baja=0" ;
		 $query = $db->prepare($sql);
		 $query->execute(array('id' => $id, 'codigo' => $codigo, 'cantidad_contenido' => $cantidad_contenido, 'peso_unitario' => $peso_unitario, 'medida'=> $medida));
		 return $rows = $query->fetch();
	}

	static public function new_detalle_alimento ($alimento_codigo, $fecha_vencimiento, $cantidad_contenido, $peso_unitario, $medida, $stock) {
	     $db= db_setup();
	     $sql= "INSERT INTO detalle_alimento(`id_detalle_alimento`, `alimento_codigo`, `fecha_vencimiento`, `cantidad_contenido`, `peso_unitario`, `medida`, `stock`, `baja`) VALUES (NULL, :alimento_codigo, :fecha_vencimiento, :cantidad_contenido, :peso_unitario, :medida, :stock, '0');" ;
	     $query = $db->prepare($sql);
	     $query->execute(array('alimento_codigo' =>$alimento_codigo, 'fecha_vencimiento' => $fecha_vencimiento, 'cantidad_contenido' => $cantidad_contenido, 'peso_unitario' => $peso_unitario, 'medida'=>$medida, 'stock' => $stock));
	}
	
	static public function edit_detalle_alimento ($alimento_codigo, $fecha_vencimiento, $cantidad_contenido, $peso_unitario, $medida, $stock, $reservado, $id) { 
         $db= db_setup();
         $sql= "UPDATE `detalle_alimento` SET `alimento_codigo`= :alimento_codigo,`fecha_vencimiento`= :fecha_vencimiento,`cantidad_contenido`= :cantidad_contenido,`peso_unitario`= :peso_unitario,`medida`=:medida, `stock`= :stock,`reservado`= :reservado WHERE `id_detalle_alimento` = :id;" ;
         $query = $db->prepare($sql);
         $rows = $query->execute(array('alimento_codigo' => $alimento_codigo, 'fecha_vencimiento' => $fecha_vencimiento, 'cantidad_contenido' => $cantidad_contenido, 'peso_unitario' => $peso_unitario, 'medida'=> $medida, 'stock' => $stock, 'reservado' => $reservado, 'id' => $id));
    }
	
	static public function delete_detalle_alimento ($id) {
         $db= db_setup();
         $sql= "UPDATE `detalle_alimento` SET `baja`='1' WHERE `id_detalle_alimento` = :id;" ;
         $query = $db->prepare($sql);
         $rows= $query->execute(array('id' => $id));

    }
	
	static public function datos_detalle_alimento ($id){
		     $db= db_setup();
		     $sql= "SELECT detalle_alimento.id_detalle_alimento, detalle_alimento.alimento_codigo, detalle_alimento.fecha_vencimiento, detalle_alimento.cantidad_contenido, detalle_alimento.peso_unitario, detalle_alimento.medida, detalle_alimento.stock, detalle_alimento.reservado, alimento.descripcion
             FROM detalle_alimento INNER JOIN alimento ON detalle_alimento.alimento_codigo = alimento.codigo  
		     WHERE detalle_alimento.id_detalle_alimento = :id AND detalle_alimento.baja = 0" ;
		     $query = $db->prepare($sql);
		     $query->execute(array('id' => $id));
		     return $rows = $query->fetch();
	}
	
	static public function ultimo_detalle_alimento_agregado () {
	     $db= db_setup();
	     $sql= "SELECT id_detalle_alimento FROM detalle_alimento ORDER BY id_detalle_alimento DESC LIMIT 1;" ;
	     $query = $db->prepare($sql);
		 $rows= $query->execute();
		 return $query->fetch() ;

	}
	
 	static public function modificarStock($id, $cant) {
	     $db= db_setup();
	     $sql= "UPDATE detalle_alimento SET stock = :cant WHERE id_detalle_alimento = :id AND baja = '0'" ;
	     $query = $db->prepare($sql);
	     $query->execute(array('id'=>$id, 'cant'=>$cant));
	}
	
    static public function verificar_stock($detalle_alimento_id, $cantidad_enviar) {
	     $db= db_setup();
	     $sql= "SELECT `detalle_alimento`.stock FROM `detalle_alimento` WHERE `id_detalle_alimento`= :detalle_alimento_id and `stock`>= :cantidad_enviar and `baja` = 0" ;
	     $query = $db->prepare($sql);
	     $query->execute(array('detalle_alimento_id'=>$detalle_alimento_id, 'cantidad_enviar'=>$cantidad_enviar));
		 return $rows = $query->fetch();
	}
	
	static public function setear_dias_restantes ($detalle_alimento_id, $dias_restantes) { 
         $db= db_setup();
         $sql= "UPDATE `detalle_alimento` SET `dias_restantes`= :dias_restantes WHERE `id_detalle_alimento` = :detalle_alimento_id;" ;
         $query = $db->prepare($sql);
         $rows = $query->execute(array('detalle_alimento_id' => $detalle_alimento_id, 'dias_restantes' => $dias_restantes));
    }
	
   static public function listado_detalles_alimentos(){
	  		 $db= db_setup();
		     $sql= "SELECT detalle_alimento.id_detalle_alimento, detalle_alimento.cantidad_contenido, detalle_alimento.peso_unitario, detalle_alimento.medida, detalle_alimento.fecha_vencimiento FROM detalle_alimento INNER JOIN alimento ON detalle_alimento.alimento_codigo = alimento.codigo WHERE alimento.baja =0 AND detalle_alimento.baja =0 ORDER BY 1 LIMIT 0 , 30" ;
		     $query = $db->prepare($sql);
		     $query->execute();
		     return $assistants = $query->fetchAll();
	  
	  }
	  
	     static public function list_alimentos_contenidos($codigo){
	  		 $db= db_setup();
		     $sql= "SELECT detalle_alimento.id_detalle_alimento, detalle_alimento.cantidad_contenido, detalle_alimento.peso_unitario, detalle_alimento.medida, detalle_alimento.stock FROM detalle_alimento  WHERE detalle_alimento.baja =0 AND detalle_alimento.alimento_codigo = :codigo AND detalle_alimento.stock > 0" ;
		     $query = $db->prepare($sql);
		     $query->execute(array('codigo'=>$codigo));
		     return $assistants = $query->fetchAll();
	  
	  }
	  
	static public function get_reservado ($id){
		     $db= db_setup();
		     $sql= "SELECT detalle_alimento.reservado
             FROM detalle_alimento 
		     WHERE detalle_alimento.id_detalle_alimento = :id AND detalle_alimento.baja = 0" ;
		     $query = $db->prepare($sql);
		     $query->execute(array('id' => $id));
		     return $rows = $query->fetch();
     }
	 
    static public function get_stock ($id){
		     $db= db_setup();
		     $sql= "SELECT detalle_alimento.stock
             FROM detalle_alimento 
		     WHERE detalle_alimento.id_detalle_alimento = :id AND detalle_alimento.baja = 0" ;
		     $query = $db->prepare($sql);
		     $query->execute(array('id' => $id));
		     return $rows = $query->fetch();
     }
	 
	static public function actualizar_reservado ($detalle_alimento_id, $reservado){
		     $db= db_setup();
		     $sql= "UPDATE `detalle_alimento` SET `reservado`= :reservado WHERE `id_detalle_alimento` = :detalle_alimento_id;" ;
		     $query = $db->prepare($sql);
		     $query->execute(array('detalle_alimento_id' => $detalle_alimento_id, 'reservado' => $reservado));
     }
}
?>