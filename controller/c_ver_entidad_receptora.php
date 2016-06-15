<?php
require_once ('c_check_functions.php');
check_session_status();
$entidad_receptora_id = $_GET['entidad_receptora_id'];
$pedido_numero = $_GET['numero_pedido'];
require_once ('../model/m_entidad_receptora.class.php');
$entidad_receptora = Entidad_Receptora::datos_entidad_receptora ($entidad_receptora_id);
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='../views/default/sections/v_head.php';
$title = "Ver Entidad Receptora ";
$view_page = "../views/default/modules/v_ver_entidad_receptora.php";
include '../views/default/estructura_perfil.php';   
?>