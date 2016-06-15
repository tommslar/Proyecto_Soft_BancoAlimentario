<?php
require_once('../model/m_usuario.class.php');
$usuario_id = $_POST["id_usuario"];
$nombreyapellido = $_POST["nombreyapellido"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$nombreusuario = $_POST["nombreusuario"];
$perfil_id = $_POST["perfil_usuario_id"];
$password = $_POST["pass"]; 

$usuarioviejo = $_POST ["usuarioviejo"] ;

if ($usuarioviejo == $nombreusuario) {

	Usuario::edit_usuario ($usuario_id, $nombreyapellido , $fecha_nacimiento, $nombreusuario, $perfil_id, $password); 
	header ("Location: c_abm_usuarios.php");

} 
else {


	if(Usuario::buscar_nombreusuario($nombreusuario)){
        header ("Location: c_error_igual_usuario.php");
					}
			else{
		Usuario::edit_usuario ($usuario_id, $nombreyapellido , $fecha_nacimiento, $nombreusuario, $perfil_id, $password); 
	    header ("Location: c_abm_usuarios.php");
			}
}





?>