<?php
require_once('../model/m_entidad_receptora.class.php');

$id= $_GET["id_entidad_receptora"] ;
 
Entidad_Receptora::delete_entidad_receptora ($id) ;

header ("Location: c_abm_entidades_receptoras.php");

?>