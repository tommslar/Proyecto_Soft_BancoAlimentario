<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('pedidos');
require_once ('../model/m_turno_entrega.class.php');
$mes=$_POST['mes'];
$anio=$_POST['anio'];
$dia=$_POST['dia'];
$fecha=date('Y-m-d',mktime(0,0,0,$mes,$dia,$anio));
require_once ('../model/m_configuracion.class.php');
$hora_fin = Configuracion::get_valor(10);
$hora_fin = $hora_fin['valor'];
if($fecha == date('Y-m-d') && date('H:i') > $hora_fin){
     $view_page = 'modules/v_mensaje_turnos.php';
	 $msj=" Ya No Es Posible Definir Turnos Por el Dia De Hoy";
     $params=array('msj'=>$msj);
     visualizarPlantilla ($view_page,$params);
}
else{
$hora_inicio = Configuracion::get_valor(9);
$hora_inicio = $hora_inicio['valor'];
$turnos=Turno_entrega::turnos($fecha);
$hora = $hora_inicio;
$horas = array();
while(strtotime($hora) <= strtotime($hora_fin)){
      $nuevahora=mktime( date("H",strtotime($hora)), date("i",strtotime($hora)),0);
      
      require_once ('../model/m_turno_entrega.class.php');
      if(Turno_Entrega::search_fechayhora($fecha, date('H', $nuevahora),date('i', $nuevahora)) == 0){
	        if($fecha != date('Y-m-d')){
	            $nuevahora=date('H:i', $nuevahora );
                $horas[] = $nuevahora;
		    }
			else{
			     if(date('H:i', $nuevahora ) > date('H:i')){
				    $nuevahora=date('H:i', $nuevahora );
                    $horas[] = $nuevahora;
				 }
			}
			
      }
	  $hora = date("H:i",strtotime ( '+30 minute' , strtotime ( $hora ) )); 
 } 

$cantidad = count($horas) - 1;
$view_page = 'modules/v_agenda_turnos.php';
$params=array('turnos'=>$turnos, 'horas'=> $horas, 'fecha'=>$fecha, 'cantidad'=>$cantidad );
visualizarPlantilla ($view_page,$params);
}
?>