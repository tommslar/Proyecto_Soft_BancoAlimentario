<?php
$id_configuracion = $_POST["id_configuracion"];
$clave = $_POST["clave"];
$valor= $_POST["valor"];
require_once('../model/m_configuracion.class.php'); 
Configuracion::edit_configuracion($id_configuracion, $clave, $valor);
header ("Location: c_configuraciones.php");
?>