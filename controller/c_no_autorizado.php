<?php
 require_once '../lib/twig/lib/Twig/twig_setup.php';
 session_start();
 $_SESSION['nombreusuario'] = "Usuario Sin Acceso";
 $usuario=$_SESSION['nombreusuario'];
 $title = "Ingreso no Autorizado";
 $link="../controller/c_login.php";
 $log ="Volver al Login";
 $view_page = "modules/v_no_autorizado.php";
 $params=array('title'=>$title,'link'=>$link,'log'=>$log, 'usuario'=>$usuario);
 visualizarPlantilla ($view_page,$params);
?>