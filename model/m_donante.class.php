<?php 
require_once ('../model/m_db.php'); 
class Donante{
	
	static public function list_donantes() {
		 $db= db_setup();
		 $sql= "SELECT * FROM donante WHERE baja = 0;" ;
		 $query = $db->prepare($sql);
		 $query->execute();
		return $assistants = $query->fetchAll();
	}
	static public function search_donante_email ($email) {
	     $db= db_setup();
	     $sql= "SELECT mail_contacto FROM donante WHERE mail_contacto = :email;" ;
	     $query = $db->prepare($sql);
	     $rows= $query->execute(array('email' => $email));
         $rows= $query->fetch();
	     if($rows > 0 )
	          return true;
	     else
	        return false;
	}
	
	static public function new_donante ($razon_social, $apellido_contacto, $nombre_contacto, $telefono_contacto, $mail_contacto, $domicilio_contacto) {
	     $db= db_setup();
	     $sql= "INSERT INTO donante(`id_donante`, `razon_social`, `apellido_contacto`, `nombre_contacto`, `telefono_contacto`, `mail_contacto`, `domicilio_contacto`, `baja`) VALUES (NULL, :razon_social, :apellido_contacto, :nombre_contacto, :telefono_contacto, :mail_contacto, :domicilio_contacto,'0');" ;
	     $query = $db->prepare($sql);
	     $rows= $query->execute(array('razon_social' => $razon_social, 'apellido_contacto' => $apellido_contacto, 'nombre_contacto' =>  $nombre_contacto, 'telefono_contacto' => $telefono_contacto, 'mail_contacto' => $mail_contacto, 'domicilio_contacto' => $domicilio_contacto));

	}
	
	static public function edit_donante ($razon_social, $apellido_contacto, $nombre_contacto, $telefono_contacto, $mail_contacto,    $domicilio_contacto, $id) {
 
         $db= db_setup();
         $sql= "UPDATE `donante` SET `razon_social`= :razon_social,`apellido_contacto`= :apellido_contacto,`nombre_contacto`= :nombre_contacto,`telefono_contacto`= :telefono_contacto,`mail_contacto`= :mail_contacto,`domicilio_contacto`= :domicilio_contacto WHERE `id_donante` = :id;" ;
         $query = $db->prepare($sql);
         $rows= $query->execute(array('razon_social' => $razon_social, 'apellido_contacto' => $apellido_contacto, 'nombre_contacto' => $nombre_contacto, 'telefono_contacto' => $telefono_contacto, 'mail_contacto' => $mail_contacto, 'domicilio_contacto' => $domicilio_contacto, 'id' => $id));
    }
	
	static public function delete_donante ($id) {
         $db= db_setup();
         $sql= "UPDATE `donante` SET `baja`='1' WHERE `id_donante` = :id;" ;
         $query = $db->prepare($sql);
         $rows= $query->execute(array('id' => $id));

    }
	
	static public function datos_donante ($id) {
         $db= db_setup();
         $sql= "SELECT * FROM  donante WHERE id_donante = :id AND baja='0' ";
         $query = $db->prepare($sql);
         $query->execute(array('id' => $id));
         return $rows=$query->fetch();
    }
}
?>