<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();


$month = $_POST['mes'];
$year = $_POST['anio'];

require_once ('../model/m_alimento.class.php');
$alimentos_vencidos_sin_entregar = Alimento::alimentos_vencidos_sin_entregar($month, $year);

if(count($alimentos_vencidos_sin_entregar) > 0){
    foreach ($alimentos_vencidos_sin_entregar as $a_s_e) {
		$alimentos[] = $a_s_e["descripcion"];
		$cantidades[] = $a_s_e["cantidad"];
	}
	
	$alimentos = implode("', '", $alimentos);
	$alimentos = "['".$alimentos."']";
	
	$cantidades = join(", ", $cantidades);
	$cantidades = "[".$cantidades."]";
    $view_page = 'modules/v_grafico-3.php';

    $menu = $_SESSION['menu'];
    $usuario = $_SESSION['nombreusuario'];
    $perfil = $_SESSION['perfil'];
    $nomyape = $_SESSION['nomyape'];
	$head='sections/v_head_estadisticas.php';
    $title = "Alimentos Vencidos Sin Entregar";	
    $params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu, 'head'=>$head, 'month'=>$month, 'year'=>$year, 'alimentos'=> $alimentos,'cantidades' =>$cantidades);
    visualizarPlantilla ($view_page,$params);
}
else
    header('Location:c_sin_resultados.php');
?>