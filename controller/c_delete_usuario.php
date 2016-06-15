<?php
require_once('../model/m_usuario.class.php');

$id= $_GET["id_usuario"] ;
 
Usuario::delete_usuario($id) ;

header ("Location: c_abm_usuarios.php");

?>