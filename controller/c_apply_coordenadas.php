<?php
$id_lat = $_POST["id_lat"];
$clave_lat = $_POST["clave_lat"];
$valor_lat= $_POST["loglat"];
require_once('../model/m_configuracion.class.php'); 
Configuracion::edit_configuracion($id_lat, $clave_lat, $valor_lat);

$id_long = $_POST["id_long"];
$clave_long = $_POST["clave_long"];
$valor_long= $_POST["loglong"];
require_once('../model/m_configuracion.class.php'); 
Configuracion::edit_configuracion($id_long, $clave_long, $valor_long);

header ("Location: c_configuraciones.php");
?>