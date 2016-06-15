<?php
require_once('../model/m_usuario.class.php');
$nombreyapellido = $_POST["nombreyapellido"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$nombreusuario = $_POST["nombreusuario"];
$perfil_id = $_POST["perfil_usuario_id"];
$password = $_POST["pass"];

if(Usuario::buscar_nombreusuario($nombreusuario)){
        header ("Location: c_error_igual_usuario.php");
}
else{
	Usuario::new_usuario ($nombreyapellido , $fecha_nacimiento, $nombreusuario, $perfil_id, $password);
	header ("Location: c_abm_usuarios.php");
}

?>