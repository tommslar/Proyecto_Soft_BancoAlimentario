<?php

require_once ('../model/m_db.php'); 

class Alimento_Donante{

    static public function new_alimento_donante ($detalle_alimento_id, $donante_id, $cantidad) {
         $db= db_setup();
	     $sql= "INSERT INTO alimento_donante(`detalle_alimento_id`, `donante_id`, `cantidad`) VALUES (:detalle_alimento_id, :donante_id, :cantidad);" ;
	     $query = $db->prepare($sql);
	     $rows= $query->execute(array('detalle_alimento_id' => $detalle_alimento_id, 'donante_id' => $donante_id, 'cantidad' => $cantidad));
	}
	
	static public function edit_alimento_donante ($ids, $donante_id, $cantidad){
         $db= db_setup();
         $sql= "UPDATE `alimento_donante` SET `detalle_alimento_id`= :ids,`donante_id`= :donante_id,`cantidad`= :cantidad WHERE `detalle_alimento_id` = :ids;" ;
         $query = $db->prepare($sql);
         $query->execute(array('ids' => $ids, 'donante_id' => $donante_id, 'cantidad' => $cantidad));
    }
}