<?php 

require_once ('../model/m_db.php'); 

class Estado_Pedido{

                 static public function get_descripcion($estado){
                 $db= db_setup();
                 $sql= "SELECT descripcion FROM estado_pedido WHERE id_estado_pedido = :estado" ;
                 $query = $db->prepare($sql);
                 $query->execute(array('estado' =>$estado));
                 return $row= $query->fetch();
}  
}
?>