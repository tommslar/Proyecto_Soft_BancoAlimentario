<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();

    $fecha_desde = $_POST["fecha_desde"];
	$fecha_hasta = $_POST["fecha_hasta"];
	
    require_once ('../model/m_pedido_modelo.class.php'); 
    $kilos_pedidos_entregados=Pedido_Modelo::kilos_pedidos_entregados($fecha_desde,$fecha_hasta);
if(count($kilos_pedidos_entregados) > 0){
        foreach ($kilos_pedidos_entregados as $p_e) {
		        $pedidos[] = $p_e["numero_pedido_modelo"];
		        $cantidades[] = $p_e["cantidad"];
	    }
	
	    $pedidos = implode("', '", $pedidos);
	    $pedidos = "['".$pedidos."']";
	
	    $cantidades = join(", ", $cantidades);
	    $cantidades = "[".$cantidades."]";
		
        $menu = $_SESSION['menu'];
        $usuario = $_SESSION['nombreusuario'];
        $perfil = $_SESSION['perfil'];
        $nomyape = $_SESSION['nomyape'];
		$head='sections/v_head_estadisticas.php';
        $title = "Listados";
        $view_page = "modules/v_grafico-1.php";
        $params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu, 'head'=>$head, 'fecha_desde'=>$fecha_desde, 'fecha_hasta'=>$fecha_hasta, 'pedidos'=> $pedidos,'cantidades' =>$cantidades);
        visualizarPlantilla ($view_page,$params);
}
else
    header('Location:c_sin_resultados.php');		 
?>