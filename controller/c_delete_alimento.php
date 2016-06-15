<?php
require_once('../model/m_detalle_alimento.class.php');

$id= $_GET["id_detalle_alimento"] ;
 
Detalle_Alimento::delete_detalle_alimento ($id) ;

header ("Location: c_abm_alimentos.php");

?>