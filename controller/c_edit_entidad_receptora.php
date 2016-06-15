<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
$id_entidad_receptora= $_GET["id_entidad_receptora"] ;
require_once ('../model/m_entidad_receptora.class.php');
$entidad_receptora = Entidad_Receptora::datos_entidad_receptora($id_entidad_receptora);
require_once ('../model/m_estado_entidad.class.php');
$estados = Estado_Entidad::states($entidad_receptora['estado']);
require_once ('../model/m_necesidad_entidad.class.php');
$necesidades = Necesidad_Entidad::needs($entidad_receptora['necesidad']);
require_once ('../model/m_servicio_entidad.class.php');
$servicios =Servicio_Entidad::services($entidad_receptora['servicio_prestado']) ; 
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$head='sections/v_head.php';
$title = "Modificar entidades receptoras ";
$view_page = "modules/v_edit_entidad_receptora.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu,'entidad_receptora'=>$entidad_receptora, 'estados'=>$estados, 'necesidades'=>$necesidades, 'servicios'=>$servicios, 'head'=>$head);
visualizarPlantilla ($view_page,$params);
?>