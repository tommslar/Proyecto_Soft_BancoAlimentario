<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
$title = "Iniciar Sesion";
$link="../controller/index.php";
$log ="Registrarse";
$view_page = "modules/v_cuerpo_login.php";
$params=array('title'=>$title,'link'=>$link,'log'=>$log);
visualizarPlantilla ($view_page,$params);

?>