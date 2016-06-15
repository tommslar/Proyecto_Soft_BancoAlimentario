<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once 'c_check_functions.php';
check_session_status();
check_privileges_status('pedidos');
require_once ('../model/m_configuracion.class.php');
$cantidad_dias_limite = Configuracion::get_valor(1);
$f = date('Y-m-d');
$f = strtotime ( '+'.$cantidad_dias_limite['valor'].'day' , strtotime ( $f ) ) ;
$fecha = date("Y-m-d",$f);
require_once ('../model/m_alimento.class.php');
$list_proximos_vencimientos = Alimento::list_proximos_vencimientos($fecha);
if(count($list_proximos_vencimientos) > 0){
   $menu = $_SESSION['menu'];
   $usuario = $_SESSION['nombreusuario'];
   $perfil = $_SESSION['perfil'];
   $nomyape = $_SESSION['nomyape'];
   $head='sections/v_head.php';
   $title = "Alerta Proximos Vencimientos ";
   $view_page = "modules/v_alerta_proximos_vencimientos.php";
   $params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu, 'head'=>$head, 'list_proximos_vencimientos'=>$list_proximos_vencimientos, 'fecha' => $fecha);
   visualizarPlantilla ($view_page,$params);
}
else{
header("Location: c_sin_resultados.php");
}
?>