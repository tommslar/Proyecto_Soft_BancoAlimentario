<?php
require_once('../model/m_donante.class.php');



$razon_social = $_POST["razon_social"];
$apellido_contacto = $_POST["apellido_contacto"];
$nombre_contacto = $_POST["nombre_contacto"];
$telefono_contacto = $_POST["telefono_contacto"];
$mail_contacto = $_POST["mail_contacto"];
$domicilio_contacto = $_POST["domicilio_contacto"];
if(Donante::search_donante_email($mail_contacto)){
        header ("Location: c_error_igual_donante.php");
}
else{
	Donante::new_donante ($razon_social, $apellido_contacto, $nombre_contacto, $telefono_contacto, $mail_contacto, $domicilio_contacto);
	header ("Location: c_abm_donantes.php");
}

?>
