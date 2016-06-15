<?php
require_once('../model/m_pedido_modelo.class.php');

$numero= $_GET["numero"] ;
 
Pedido_Modelo::delete_pedido ($numero) ;

header ("Location: c_abm_pedidos_modelo.php");

?>