<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
$title = "Banco Alimentario de La Plata";
$link="../controller/c_login.php";
$log ="Iniciar Sesion";
$view_page = "modules/v_cuerpo_index.php";
$params=array('title'=>$title,'link'=>$link,'log'=>$log);
visualizarPlantilla ($view_page,$params);

?>