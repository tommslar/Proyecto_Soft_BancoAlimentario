<?php 

require_once ('../model/m_db.php'); 

class Alimento{
    
    static public function list_alimentos(){
		     $db= db_setup();
		     $sql= "SELECT detalle_alimento.id_detalle_alimento, detalle_alimento.alimento_codigo, detalle_alimento.fecha_vencimiento, detalle_alimento.cantidad_contenido, detalle_alimento.peso_unitario, detalle_alimento.medida, detalle_alimento.stock, detalle_alimento.reservado, alimento.descripcion as descripcion, donante.razon_social as donante_razon_social, donante.apellido_contacto as donante_apellido, donante.nombre_contacto as donante_nombre 
             FROM detalle_alimento INNER JOIN alimento ON detalle_alimento.alimento_codigo = alimento.codigo LEFT JOIN alimento_donante ON detalle_alimento.id_detalle_alimento = alimento_donante.detalle_alimento_id LEFT JOIN donante ON alimento_donante.donante_id = donante.id_donante   WHERE detalle_alimento.baja = 0 AND (donante.baja = 0 OR alimento_donante.donante_id IS NULL)" ;
		     $query = $db->prepare($sql);
		     $query->execute();
		     return $assistants = $query->fetchAll();
	}
	
    static public function new_alimento ($alimento_codigo, $descripcion) {
	         $db= db_setup();
	         $sql= "INSERT INTO alimento(`codigo`, `descripcion`) VALUES (:alimento_codigo, :descripcion);" ;
	         $query = $db->prepare($sql);
	         $rows= $query->execute(array('alimento_codigo' => $alimento_codigo, 'descripcion' => $descripcion));	
	}
	
	static public function datos_alimento ($id){
		     $db= db_setup();
		     $sql= "SELECT detalle_alimento.id_detalle_alimento, detalle_alimento.alimento_codigo, detalle_alimento.fecha_vencimiento, detalle_alimento.cantidad_contenido, detalle_alimento.peso_unitario, detalle_alimento.medida, detalle_alimento.stock, detalle_alimento.reservado, alimento.descripcion
             FROM alimento INNER JOIN detalle_alimento ON alimento.codigo  = detalle_alimento.alimento_codigo   
		     WHERE detalle_alimento.id_detalle_alimento = :id AND detalle_alimento.baja = 0" ;
		     $query = $db->prepare($sql);
		     $query->execute(array('id' => $id));
		     return $rows = $query->fetch();
	}
	
	static public function alimentos_en_stock(){
		     $db= db_setup();
		     $sql= "SELECT alimento.codigo, alimento.descripcion, SUM(detalle_alimento.stock) as stock, SUM(detalle_alimento.reservado) as cantidad_reservada 
			 FROM alimento  INNER JOIN detalle_alimento on alimento.codigo = detalle_alimento.alimento_codigo 
			 WHERE alimento.baja = 0 AND detalle_alimento.baja =0 
			 GROUP BY alimento.codigo 
			 HAVING sum(detalle_alimento.stock) > 0 
			 ORDER BY stock" ;
		     $query = $db->prepare($sql);
		     $query->execute();
		     return $assistants = $query->fetchAll();
	}

    static public function codes_descriptions() {
		$db= db_setup();
		$sql= "SELECT codigo, descripcion FROM alimento" ;
		$query = $db->prepare($sql);
		$query->execute();
		return $assistants = $query->fetchAll();
	}
	
	static public function get_codes_descriptions($alimento_codigo) {
        $db= db_setup();
        $sql= "SELECT codigo, descripcion FROM alimento WHERE codigo NOT IN (SELECT codigo FROM alimento WHERE codigo = :alimento_codigo)" ;
        $query = $db->prepare($sql);
        $query->execute(array('alimento_codigo' =>$alimento_codigo));
        return $assistants= $query->fetchAll();

	}
	static public function codes() {
		$db= db_setup();
		$sql= "SELECT codigo FROM alimento" ;
		$query = $db->prepare($sql);
		$query->execute();
		return $assistants = $query->fetchAll();
	}
	
	static public function get_codes($alimento_codigo) {
        $db= db_setup();
        $sql= "SELECT codigo FROM alimento WHERE codigo NOT IN (SELECT codigo FROM alimento WHERE codigo= :alimento_codigo)" ;
        $query = $db->prepare($sql);
        $query->execute(array('alimento_codigo' =>$alimento_codigo));
        return $assistants= $query->fetchAll();

	}
	
	static public function get_description($alimento_codigo) {
        $db= db_setup();
        $sql= "SELECT descripcion FROM alimento WHERE codigo = :alimento_codigo" ;
        $query = $db->prepare($sql);
        $query->execute(array('alimento_codigo' =>$alimento_codigo));
        return $row= $query->fetch();

	}
	
	static public function exist_code ($codigo_alimento) {
	$db= db_setup();
	$sql= "SELECT codigo FROM alimento WHERE codigo = :codigo_alimento;" ;
	$query = $db->prepare($sql);
	$query->execute(array('codigo_alimento' => $codigo_alimento));
    $rows= $query->fetch();
	if($rows > 0 )
	    return true;
	else
	  return false;
	} 

	static public function list_proximos_vencimientos($fecha){
		     $db= db_setup();
		     $sql= "SELECT detalle_alimento.`id_detalle_alimento`, alimento.`codigo`, alimento.`descripcion`, detalle_alimento.fecha_vencimiento, detalle_alimento.cantidad_contenido, detalle_alimento.peso_unitario, detalle_alimento.medida, detalle_alimento.stock FROM `alimento` inner join `detalle_alimento` on alimento.codigo = detalle_alimento.alimento_codigo WHERE detalle_alimento.fecha_vencimiento <= :fecha AND MONTH(fecha_vencimiento) = MONTH(CURRENT_DATE()) AND DAY(fecha_vencimiento) >= DAY(CURRENT_DATE()) AND detalle_alimento.stock > 0 AND alimento.baja = 0 AND detalle_alimento.baja = 0 ORDER BY 3" ;
		     $query = $db->prepare($sql);
		     $query->execute(array('fecha' => $fecha));
		     return $assistants = $query->fetchAll();
	}

    static public function alimentos_vencidos_sin_entregar($month, $year ){
	  		 $db= db_setup();
		     $sql= "SELECT alimento.descripcion, SUM(alimento_pedido.cantidad ) AS cantidad FROM detalle_alimento INNER JOIN alimento ON detalle_alimento.alimento_codigo = alimento.codigo INNER JOIN alimento_pedido ON detalle_alimento.id_detalle_alimento = alimento_pedido.detalle_alimento_id INNER JOIN pedido_modelo ON alimento_pedido.pedido_numero = pedido_modelo.numero_pedido_modelo
             INNER JOIN estado_pedido ON pedido_modelo.estado_pedido_id = estado_pedido.id_estado_pedido WHERE alimento.baja =0 AND detalle_alimento.baja =0 AND alimento_pedido.baja =0 AND pedido_modelo.baja =0 AND estado_pedido.id_estado_pedido =2 AND detalle_alimento.dias_restantes <= 0 AND MONTH(detalle_alimento.fecha_vencimiento) = :month AND YEAR(detalle_alimento.fecha_vencimiento) = :year GROUP BY alimento.descripcion" ;
		     $query = $db->prepare($sql);
		     $query->execute(array('month'=>$month, 'year'=>$year));
		     return $assistants = $query->fetchAll();
	  
	  }

}
?>