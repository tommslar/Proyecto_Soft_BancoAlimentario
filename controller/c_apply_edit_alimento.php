<?php
$alimento_codigo = $_POST["alimento_codigo"];
$fecha_vencimiento = $_POST["fecha_vencimiento"];
$cantidad_contenido= $_POST["cantidad_contenido"];
$peso_unitario = $_POST["peso_unitario"];
$medida = $_POST['medida'];
$stock = $_POST["stock"];
$reservado = $_POST["reservado"];
$donante_id = $_POST["donante_id"];
$id= $_POST["id_detalle_alimento"];
require_once('../model/m_detalle_alimento.class.php');
$detalle_alimento= Detalle_Alimento::search_detalle_alimento($id, $alimento_codigo,$cantidad_contenido,$peso_unitario, $medida); 
if($detalle_alimento > 0 )	{
	   $detalle_alimento_id = $detalle_alimento['id_detalle_alimento'];
	   $cant = $detalle_alimento['stock'] + $stock;
	   Detalle_alimento::modificarStock($detalle_alimento_id, $cant);
       Detalle_Alimento::delete_detalle_alimento ($id) ;

}
else{
       Detalle_Alimento::edit_detalle_alimento ($alimento_codigo, $fecha_vencimiento, $cantidad_contenido, $peso_unitario, $medida, $stock, $reservado, $id) ;
}
header ("Location: c_abm_alimentos.php");
?>