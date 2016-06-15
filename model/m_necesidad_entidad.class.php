<?php

require_once ('../model/m_db.php');

class Necesidad_Entidad{

    static public function needs($necesidad) {
             $db= db_setup();
             $sql= "SELECT descripcion FROM necesidad_entidad WHERE descripcion NOT IN (SELECT descripcion FROM necesidad_entidad WHERE descripcion= :necesidad)" ;
             $query = $db->prepare($sql);
             $query->execute(array('necesidad' =>$necesidad));
             return $needs= $query->fetchAll();
	}

    static public function get_needs() {
             $db= db_setup();
             $sql= "SELECT descripcion FROM necesidad_entidad " ;
             $query = $db->prepare($sql);
             $query->execute();
             return $needs= $query->fetchAll();
 	}
	
}
?>