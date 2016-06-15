<?php
 require_once '../lib/twig/lib/Twig/twig_setup.php';
 session_start();
 $_SESSION['nombreusuario'] = "Usuario Bloqueado";
 $usuario=$_SESSION['nombreusuario'];
 $title = "Cuenta Bloqueada";
 $link="../controller/index.php";
 $log ="Volver al Inicio";
 $view_page = "modules/v_cuenta_bloqueada.php";
 $params=array('title'=>$title,'link'=>$link,'log'=>$log, 'usuario'=> $usuario);
 visualizarPlantilla ($view_page,$params);

?>