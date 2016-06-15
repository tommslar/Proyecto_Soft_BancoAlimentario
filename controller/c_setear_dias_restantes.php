<?php
require_once ('c_check_functions.php');
check_session_status();
require_once('../model/m_configuracion.class.php');
$cantidad_dias_limite = Configuracion::get_valor(1);

require_once('../model/m_detalle_alimento.class.php');
$listado_alimentos = Detalle_Alimento::listado_detalles_alimentos();
foreach ($listado_alimentos as $l_a){       
  
         $fecha_vencimiento=strtotime ( '+'.$cantidad_dias_limite['valor'].'day' , strtotime ( $l_a['fecha_vencimiento'] ) );
		 $fecha_vencimiento = date ( 'Y-m-d' , $fecha_vencimiento );
		 $dias_restantes= (strtotime($fecha_vencimiento)-strtotime(date('Y-m-d')))/86400;
		 
		 Detalle_Alimento::setear_dias_restantes($l_a['id_detalle_alimento'], $dias_restantes);
         
}
?>