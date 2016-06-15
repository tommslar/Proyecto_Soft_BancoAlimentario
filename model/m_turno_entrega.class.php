<?php 
require_once ('../model/m_db.php'); 

class Turno_Entrega{

        
    static public function new_turno_entrega($fecha_reserva, $hora_reserva) {
	     $db= db_setup();
	     $sql= "INSERT INTO turno_entrega(`id_turno_entrega`, `fecha`, `hora`, `baja`) VALUES (NULL, :fecha_reserva, :hora_reserva,'0');" ;
	     $query = $db->prepare($sql);
	     $query->execute(array('fecha_reserva' =>$fecha_reserva, 'hora_reserva' => $hora_reserva));
	}
	
        static public function get_turno_entrega($turno_entrega_id) {
        $db= db_setup();
        $sql= "SELECT * FROM turno_entrega WHERE turno_entrega.id_turno_entrega = :turno_entrega_id" ;
        $query = $db->prepare($sql);
        $query->execute(array('turno_entrega_id' =>$turno_entrega_id));
        return $row= $query->fetch();

	}  
	
	
	static public function search_fechayhora($f, $h, $min){

	    $db= db_setup();
        $sql= "SELECT * FROM turno_entrega WHERE turno_entrega.fecha = :f  AND HOUR(turno_entrega.hora)= :h AND MINUTE(turno_entrega.hora)=:min AND turno_entrega.baja=0" ;
        $query = $db->prepare($sql);
        $query->execute(array('f' =>$f, 'h'=>$h, 'min'=>$min));		
        return $row= $query->fetch();
	}
	
    static public function turnos($fecha){

	    $db= db_setup();
        $sql= "SELECT * FROM turno_entrega WHERE turno_entrega.fecha = :fecha  AND turno_entrega.baja=0" ;
        $query = $db->prepare($sql);
        $query->execute(array('fecha' =>$fecha));		
        return $row= $query->fetchAll();
	}
	
	static public function ultimo_turno_entrega_id() {
	     $db= db_setup();
	     $sql= "SELECT id_turno_entrega FROM turno_entrega ORDER BY id_turno_entrega DESC LIMIT 1;" ;
	     $query = $db->prepare($sql);
		 $rows= $query->execute();
		 return $query->fetch() ;

	}

}
?>