<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
$id_configuracion= $_POST['variable'] ;
require_once ('../model/m_configuracion.class.php');
$configuracion = Configuracion::get_configuracion($id_configuracion);
$view_page = 'modules/v_edit_configuracion.php';
$params=array('configuracion'=>$configuracion);
visualizarPlantilla ($view_page,$params);
?>