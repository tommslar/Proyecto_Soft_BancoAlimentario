<?php 

require_once ('../model/m_db.php'); 

class Configuracion{
    
    static public function get_valor($id){
			 $db= db_setup();
		     $sql= "SELECT `valor` FROM `configuracion` WHERE `id_configuracion`= :id" ;
		     $query = $db->prepare($sql);
		     $query->execute(array('id' =>$id));
		     return $rows = $query->fetch();
	
	}
	
	    static public function datos_configuracion_menos_coordenadas(){
			 $db= db_setup();
		     $sql= "SELECT * FROM `configuracion` WHERE `baja`= 0 and `id_configuracion` NOT IN (SELECT `id_configuracion` FROM `configuracion` WHERE `id_configuracion` = '11' or `id_configuracion` = '12')" ;
		     $query = $db->prepare($sql);
		     $query->execute();
		     return $rows = $query->fetchAll();
	
	}
	
		static public function get_configuracion($id_configuracion){
			 $db= db_setup();
		     $sql= "SELECT * FROM `configuracion` WHERE `id_configuracion` = :id_configuracion AND `baja`= 0" ;
		     $query = $db->prepare($sql);
		     $query->execute(array('id_configuracion' =>$id_configuracion));
		     return $rows = $query->fetch();
	
	}
	
		static public function edit_configuracion($id_configuracion, $clave, $valor){
			 $db= db_setup();
		     $sql= "UPDATE `configuracion` SET `clave` = :clave, `valor` = :valor WHERE `id_configuracion` = :id_configuracion AND baja = 0" ;
		     $query = $db->prepare($sql);
		     $query->execute(array('id_configuracion' =>$id_configuracion, 'clave' => $clave, 'valor' =>$valor));
		     $rows = $query->fetch();
	
	}
}
?>