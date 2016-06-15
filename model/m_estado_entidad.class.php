<?php

require_once ('../model/m_db.php');

class Estado_Entidad{

    static public function states($estado) {
             $db= db_setup();
             $sql= "SELECT descripcion FROM estado_entidad WHERE descripcion NOT IN (SELECT descripcion FROM estado_entidad WHERE descripcion= :estado) " ;
             $query = $db->prepare($sql);
             $query->execute(array('estado' =>$estado));
             return $states= $query->fetchAll();

	}
	
    static public function get_states() {
             $db= db_setup();
             $sql= "SELECT descripcion FROM estado_entidad " ;
             $query = $db->prepare($sql);
             $query->execute();
             return $states= $query->fetchAll();

	}   

}
?>