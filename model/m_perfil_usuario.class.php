<?php 
require_once ('../model/m_db.php');
 
class Perfil_Usuario{
	
	static public function list_perfiles(){
		     $db= db_setup();
		     $sql= " SELECT * FROM perfil_usuario";
			 $query = $db->prepare($sql);
		     $query->execute();
		     return $result = $query->fetchAll();
    }
	
	static public function list_perfiles_menos_id($id) {
        $db= db_setup();
        $sql= "SELECT * FROM perfil_usuario WHERE id_perfil_usuario NOT IN (SELECT id_perfil_usuario FROM perfil_usuario WHERE id_perfil_usuario= :id)" ;
        $query = $db->prepare($sql);
        $query->execute(array('id' =>$id));
        return $assistants= $query->fetchAll();

	}
	
}
?>