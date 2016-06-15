<?php

require_once ('../model/m_db.php');

class Servicio_Entidad{

    static public function services($servicio_prestado) {
             $db= db_setup();
             $sql= "SELECT descripcion FROM servicio_prestado WHERE descripcion NOT IN (SELECT descripcion FROM servicio_prestado WHERE descripcion= :servicio_prestado)" ;
             $query = $db->prepare($sql);
             $query->execute(array('servicio_prestado' =>$servicio_prestado));
             return $needs= $query->fetchAll();
	}
	
     static public function get_services() {
             $db= db_setup();
             $sql= "SELECT descripcion FROM servicio_prestado" ;
             $query = $db->prepare($sql);
             $query->execute();
             return $needs= $query->fetchAll();
	}
	
} 
?>