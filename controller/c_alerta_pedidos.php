<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('pedidos');
require_once ('../model/m_pedido_modelo.class.php');
$pedidos_modelo = Pedido_Modelo::list_pedidos_modelo_fecha_actual();
if (count ($pedidos_modelo ) > 0 ){  
   $menu = $_SESSION['menu'];
   $usuario = $_SESSION['nombreusuario'];
   $perfil = $_SESSION['perfil'];
   $nomyape = $_SESSION['nomyape'];
   $head='sections/v_head.php';
   $title = "Mi Perfil ";
   $view_page = "modules/v_abm_pedidos_modelo.php";
   $params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu,'pedidos_modelo'=>$pedidos_modelo, 'head'=>$head);
   visualizarPlantilla ($view_page,$params);
}
else{
header("Location: c_sin_resultados.php");
}
?>