<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';

require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('alimentos');

require_once ('../model/m_alimento.class.php');
$alimentos = Alimento::list_alimentos();
if(count($alimentos) > 0 ){
        $menu = $_SESSION['menu'];
        $usuario = $_SESSION['nombreusuario'];
        $perfil = $_SESSION['perfil'];
        $nomyape = $_SESSION['nomyape'];
		$head='sections/v_head.php';
        $title = "ABM alimentos ";
		$view_page = "modules/v_abm_alimentos.php";
        $params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu,'alimentos'=>$alimentos, 'head'=>$head);
        visualizarPlantilla ($view_page,$params);
}
else
header('location:c_sin_resultados.php');
?>