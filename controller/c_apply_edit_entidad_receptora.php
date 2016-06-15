<?php
require_once('../model/m_entidad_receptora.class.php');

$razon_social_er = $_POST["razon_social_er"];
$telefono = $_POST["telefono"];
$domicilio = $_POST["domicilio"];

$id= $_POST["id_entidad_receptora"]; 

$op1 = $_POST["estado_entidad_id"];
$op2 = $_POST["necesidad_entidad_id"];
$op3 = $_POST["servicio_prestado_id"];



 switch ($op1) {
			    case 'alta':
				 $estado_entidad_id=1;
				break;
				case 'en tramite':
				 $estado_entidad_id=2;
				break;
				case 'suspendida':
				 $estado_entidad_id=3;
				break;
				case 'baja':
				 $estado_entidad_id=4;
				break;
}
 switch ($op2) {
			    case 'Máxima':
				 $necesidad_entidad_id=1;
				break;
				case 'Mediana':
				 $necesidad_entidad_id=2;
				break;
				case 'Minima':
				 $necesidad_entidad_id=3;
				break;
				
}
 switch ($op3) {
			    case 'Alojamiento':
				 $servicio_prestado_id=1;
				break;
				case 'Alimentos':
				 $servicio_prestado_id=2;
				break;
				case 'Otro':
				 $servicio_prestado_id=3;
				break;
				
} 
	

	Entidad_Receptora::edit_entidad_receptora ($razon_social_er, $telefono, $domicilio, $estado_entidad_id, $necesidad_entidad_id, $servicio_prestado_id, $id); 
	header ("Location: c_abm_entidades_receptoras.php");


?>
