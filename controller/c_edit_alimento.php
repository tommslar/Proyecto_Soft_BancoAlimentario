<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
$id_detalle_alimento= $_GET['id_detalle_alimento'] ;
require_once ('../model/m_detalle_alimento.class.php');
$detalle_alimento = Detalle_Alimento::datos_detalle_alimento($id_detalle_alimento);
require_once ('../model/m_alimento.class.php');
$codigos_descripciones = Alimento::get_codes_descriptions($detalle_alimento['alimento_codigo']);
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='sections/v_head.php';
$title = "Modificar Alimento ";
$view_page = "modules/v_edit_alimento.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu,'detalle_alimento'=>$detalle_alimento, 'codigos_descripciones' =>$codigos_descripciones, 'head'=>$head);
visualizarPlantilla ($view_page,$params);
?>