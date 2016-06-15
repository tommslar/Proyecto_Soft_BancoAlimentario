<?php 

require_once ('../model/m_db.php'); 

class Alimento_Entrega_Directa{
	
    static public function new_alimento_entrega_directa ($detalle_alimento_id, $cantidad_enviar) {
	         $db= db_setup();
	         $sql= "INSERT INTO alimento_entrega_directa(`detalle_alimento_id`, `cantidad`) VALUES (:detalle_alimento_id, :cantidad_enviar);" ;
	         $query = $db->prepare($sql);
	         $rows= $query->execute(array('detalle_alimento_id' => $detalle_alimento_id, 'cantidad_enviar' => $cantidad_enviar));
             if($rows > 0)
                 return true;
             else
                 return false;			 
	}
}
?>