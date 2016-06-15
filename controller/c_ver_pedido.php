<?php
require_once ('../model/m_turno_entrega.class.php');
require_once ('c_check_functions.php');
check_session_status();
check_privileges_status('pedidos');
$turno_id = $_GET['id_turno'];

require_once ('../model/m_turno_entrega.class.php');
$turno_entrega = Turno_Entrega::get_turno_entrega($turno_id);

require_once ('../model/m_pedido_modelo.class.php');
$pedido_modelo = Pedido_Modelo::get_pedido_modelo($turno_id);
$numero_pedido = $pedido_modelo['numero_pedido_modelo'];
$estado_pedido_id = $pedido_modelo['estado_pedido_id'];
$entidad_receptora_id = $pedido_modelo['entidad_receptora_id'];

require_once ('../model/m_entidad_receptora.class.php');
$entidad_receptora = Entidad_Receptora::datos_entidad_receptora($entidad_receptora_id);

require_once ('../model/m_estado_pedido.class.php');
$descripcion_estado = Estado_Pedido::get_descripcion($estado_pedido_id);
$descripcion_estado = $descripcion_estado['descripcion'];

require_once ('../model/m_alimento_pedido.class.php');
$alimento_pedido = Alimento_Pedido::get_detalle_alimento_id($numero_pedido);
$detalle_alimento_id = $alimento_pedido['detalle_alimento_id'];
$alimento_pedido = Alimento_Pedido::get_cantidad($numero_pedido, $detalle_alimento_id);
$cantidad = $alimento_pedido['cantidad'];

require_once ('../model/m_detalle_alimento.class.php');
$detalle_alimento = Detalle_Alimento::get_detalle_alimento($detalle_alimento_id);
$codigo = $detalle_alimento['alimento_codigo'];

require_once ('../model/m_alimento.class.php');
$alimento_descripcion = Alimento::get_description($codigo);
$alimento_descripcion = $alimento_descripcion['descripcion'];

$head='sections/v_head.php';
$menu = $_SESSION['menu'];
$usuario = $_SESSION['nombreusuario'];
$perfil = $_SESSION['perfil'];
$nomyape = $_SESSION['nomyape'];
$title = "Ver Alimento ";
$view_page = "modules/v_ver_pedido.php";
$params=array('turnos'=>$turnos, 'horas'=> $horas, 'fecha'=>$fecha, 'cantidad'=>$cantidad );
visualizarPlantilla ($view_page,$params);   
?>