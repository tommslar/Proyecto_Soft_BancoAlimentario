<?php 
require_once ('../model/m_db.php');
 
class Usuario{
    static public function buscar_usuario($nombreusuario, $password){
             $db=db_setup();
	         $sql = "SELECT  usuario.nomyape, perfil_usuario.perfil as perfil, usuario.activo, usuario.nombreusuario  
			                        FROM usuario INNER JOIN perfil_usuario ON usuario.perfil_usuario_id = perfil_usuario.id_perfil_usuario
									WHERE usuario.nombreusuario = :nombreusuario AND usuario.password = :password";
             $query = $db->prepare($sql);
		     $query->execute(array('nombreusuario' => $nombreusuario, 'password' => $password));
		     return $result=$query->fetch();
      }
	  
	static public function buscar_nombreusuario($nombreusuario){
             $db=db_setup();
	         $sql = "SELECT  * FROM usuario WHERE usuario.nombreusuario = :nombreusuario AND usuario.baja = 0";
             $query = $db->prepare($sql);
		     $query->execute(array('nombreusuario' => $nombreusuario));
		     $row=$query->fetch();
			 	     if($row > 0 )
	          return true;
	     else
	        return false;
      }
	static public function get_user_role () {
		$db= db_setup();
		$sql= "SELECT `perfil_usuario_id` FROM `usuario`" ;
		$query = $db->prepare($sql);
		$rows= $query->execute();
		return $query->fetch() ;
	}
	
	static public function get_role_p ($nombre) {
		$db= db_setup();
		$sql= "SELECT `perfil_usuario_id` FROM `usuario` WHERE `nombreusuario` = :nombre;" ;
		$query = $db->prepare($sql);
		$rows= $query->execute(array('nombre' => $nombre));
		return $query->fetch() ;
	}
	
	static public function list_usuarios(){
		     $db= db_setup();
		     $sql= " SELECT usuario.id_usuario, usuario.nomyape, usuario.activo, usuario.nombreusuario, usuario.fecha_nacimiento, perfil_usuario.perfil as perfil FROM usuario INNER JOIN perfil_usuario ON usuario.perfil_usuario_id = perfil_usuario.id_perfil_usuario  WHERE usuario.baja = '0'";
			 $query = $db->prepare($sql);
		     $query->execute();
		     return $result = $query->fetchAll();
    }
	
	static public function new_usuario ($nombreyapellido , $fecha_nacimiento, $nombreusuario, $perfil_id, $password) {
	     $db= db_setup();
	     $sql= "INSERT INTO usuario(id_usuario, nomyape, nombreusuario, password, fecha_nacimiento, perfil_usuario_id) VALUES (NULL, :nombreyapellido, :nombreusuario, :password, :fecha_nacimiento, :perfil_id);" ;
	     $query = $db->prepare($sql);
	     $rows= $query->execute(array('nombreyapellido'=>$nombreyapellido , 'fecha_nacimiento'=>$fecha_nacimiento, 'nombreusuario'=>$nombreusuario, 'perfil_id'=>$perfil_id, 'password'=>$password));

	}
	
	static public function delete_usuario ($id) {
         $db= db_setup();
         $sql= "UPDATE `usuario` SET `baja`='1' WHERE `id_usuario` = :id;" ;
         $query = $db->prepare($sql);
         $rows= $query->execute(array('id' => $id));

    }
	
		static public function datos_usuario ($id) {
         $db= db_setup();
         $sql= "SELECT usuario.id_usuario, usuario.nomyape, usuario.activo, usuario.nombreusuario, usuario.fecha_nacimiento, usuario.perfil_usuario_id, usuario.password, perfil_usuario.perfil as perfil FROM  usuario INNER JOIN perfil_usuario ON usuario.perfil_usuario_id = perfil_usuario.id_perfil_usuario  WHERE id_usuario = :id AND baja='0' ";
         $query = $db->prepare($sql);
         $query->execute(array('id' => $id));
         return $rows=$query->fetch();
    }
	
	static public function edit_usuario ($usuario_id, $nombreyapellido , $fecha_nacimiento, $nombreusuario, $perfil_id, $password) {
 
         $db= db_setup();
         $sql= "UPDATE usuario SET nomyape= :nombreyapellido, fecha_nacimiento= :fecha_nacimiento,nombreusuario= :nombreusuario, perfil_usuario_id= :perfil_id, password = :password WHERE id_usuario = :usuario_id;" ;
         $query = $db->prepare($sql);
         $rows= $query->execute(array('usuario_id'=>$usuario_id, 'nombreyapellido'=>$nombreyapellido , 'fecha_nacimiento'=>$fecha_nacimiento, 'nombreusuario'=>$nombreusuario, 'perfil_id'=>$perfil_id, 'password'=>$password));
    }
	
}
?>
