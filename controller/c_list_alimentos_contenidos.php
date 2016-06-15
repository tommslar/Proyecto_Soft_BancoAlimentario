<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
$alimento=$_POST['alimento'];
$fecha_reserva=$_POST['fecha_reserva'];
$hora_reserva=$_POST['hora_reserva'];
require_once ('../model/m_alimento.class.php');
$alimento_descripcion = Alimento::get_description($alimento);
require_once ('../model/m_detalle_alimento.class.php');
$detalles = Detalle_Alimento::list_alimentos_contenidos($alimento);
if(count($detalles) > 0){
     $view_page = 'modules/v_list_alimentos_contenidos.php';
	 $params=array('alimento_descripcion'=>$alimento_descripcion,'detalles'=> $detalles );
     visualizarPlantilla ($view_page,$params);
}
else{
     $view_page = 'modules/v_mensaje_turnos.php';
	 $msj=" No Existen Detalles Alimentos Asociados A Su Eleccion";
     $params=array('msj'=>$msj);
     visualizarPlantilla ($view_page,$params);
}
?>
