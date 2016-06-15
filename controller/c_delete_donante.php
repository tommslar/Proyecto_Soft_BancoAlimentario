<?php
require_once('../model/m_donante.class.php');

$id= $_GET["id_donante"] ;
 
Donante::delete_donante ($id) ;

header ("Location: c_abm_donantes.php");

?>