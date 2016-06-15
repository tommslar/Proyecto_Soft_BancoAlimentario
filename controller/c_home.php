<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
session_start();
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$view_page = $_SESSION['view'];
$head='sections/v_head.php';
$title = "Mi Perfil";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu, 'head'=>$head);
visualizarPlantilla ($view_page,$params);
?>