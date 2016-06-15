<?php
    session_start();
	 
	require_once ('../model/m_usuario.class.php');

	function check_session_status() {

		if (!isset($_SESSION['autorizado'])) {
			header("Location: c_login.php");
		}
	}

	 function check_privileges_status($op) {

		$nombre = $_SESSION['nombreusuario'];
		$role = Usuario::get_role_p($nombre);

		switch ($op) {
			
			case 'donantes': 
				if ($role['perfil_usuario_id'] == 2) {
					header ("Location: c_error_privillegios.php");
				}
				break;
			case 'entidad_receptora': 
				if ($role['perfil_usuario_id'] == 2) {
					header ("Location: c_error_privillegios.php");
				}
				break;	
			case 'alimentos': 
				if ($role['perfil_usuario_id'] == 2) {
					header ("Location: c_error_privillegios.php");
				}
				break;	
			case 'admin': 
				if ($role['perfil_usuario_id'] == 2) {
					header ("Location: c_error_privillegios.php");
				}
				break;
				
			case 'configuraciones': 
			 if ($role['perfil_usuario_id'] == 2 || $role['perfil_usuario_id'] == 3) {
				header ("Location: c_error_privillegios.php");
			 }
				
			case 'pedidos': 
				if ($role['perfil_usuario_id'] == 2) {
					header ("Location: c_error_privillegios.php");
				}
				break;	
				
			case 'usuarios': 
				if ($role['perfil_usuario_id'] == 2 || $role['perfil_usuario_id'] == 3) {
					header ("Location: c_error_privillegios.php");
				}
				break;
              //Acá van a ir más restricciones a medida que sean necesarias
		}
	}

?>