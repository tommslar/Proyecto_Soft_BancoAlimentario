<?php
require_once '../lib/twig/lib/Twig/twig_setup.php';
require_once ('c_check_functions.php');
check_session_status();
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$detalle_alimento_id = $_POST["id_detalle_alimento"];
$cantidad_enviar = $_POST["cantidad_enviar"];
require_once ('../model/m_detalle_alimento.class.php');
$row = Detalle_Alimento::verificar_stock($detalle_alimento_id, $cantidad_enviar);
if ($row > 0){
       require_once ('../model/m_alimento_entrega_directa.class.php');
       if (Alimento_Entrega_Directa::new_alimento_Entrega_directa($detalle_alimento_id, $cantidad_enviar)){
	             $cant = $row['stock'] - $cantidad_enviar;
	             Detalle_alimento::modificarStock($detalle_alimento_id, $cant);
                 $msj="La Entrega Directa Del Alimeno Se Realizo Con Exito";
                 $title = "Entrega Exitosa";
        }
        else{
            $msj="Error Al realizar La Entrega";
            $title = "Error ";
        }
}
else{
        $msj="La Cantidad Ingresada Es Mayor A La Disponible";
        $title = "Error";
}
$head='sections/v_head.php';
$view_page = "modules/v_mensaje.php";
$params=array('title'=>$title,'nomyape'=>$nomyape,'perfil'=>$perfil,'menu'=>$menu, 'msj'=>$msj, 'head'=>$head);
visualizarPlantilla ($view_page,$params);
?>