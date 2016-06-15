<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();

    $fecha_desde = $_POST["fecha_desde"];
	$fecha_hasta = $_POST["fecha_hasta"];
	
    require_once ('../model/m_entidad_receptora.class.php'); 
    $kilos_pedidos_entregados_x_entidad_receptora=Entidad_Receptora::kilos_pedidos_entregados_x_entidad_receptora($fecha_desde,$fecha_hasta);
if(count($kilos_pedidos_entregados_x_entidad_receptora) > 0){      
		
        $menu = $_SESSION['menu'];
        $usuario = $_SESSION['nombreusuario'];
        $perfil = $_SESSION['perfil'];
        $nomyape = $_SESSION['nomyape'];
		$head='sections/v_head_estadisticas.php';
        $title = "Listados";
        $view_page = "modules/v_grafico-2.php";
        $params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu, 'head'=>$head, 'fecha_desde'=>$fecha_desde, 'fecha_hasta'=>$fecha_hasta, 'kilos_pedidos_entregados_x_entidad_receptora'=> $kilos_pedidos_entregados_x_entidad_receptora);
        visualizarPlantilla ($view_page,$params);
}
else
    header('Location:c_sin_resultados.php');		 
?>