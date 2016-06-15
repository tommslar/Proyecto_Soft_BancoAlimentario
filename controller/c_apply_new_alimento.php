<?php
$alimento_codigo = $_POST["alimento_codigo"];
$cantidad = $_POST["cantidad"];
$fecha_vencimiento = $_POST["fecha_vencimiento"];
$peso_unitario = $_POST["peso_unitario"];
$medida=$_POST['medida'];
$cantidad_donada = $_POST["cantidad_donada"];
require_once ('../model/m_detalle_alimento.class.php');
$detalle_alimento= Detalle_Alimento::search_detalle_alimento($alimento_codigo,$cantidad,$peso_unitario, $medida); 
if($detalle_alimento > 0 )	{
	   $detalle_alimento_id = $detalle_alimento['id_detalle_alimento'];
	   $cant = $detalle_alimento['stock'] + $cantidad_donada;
	   Detalle_alimento::modificarStock($detalle_alimento_id, $cant);		
	 
	 } 
else{
	    Detalle_Alimento::new_detalle_alimento($alimento_codigo, $fecha_vencimiento, $cantidad, $peso_unitario, $medida, $cantidad_donada );
	 }	
header ("Location: c_abm_alimentos.php");
?>