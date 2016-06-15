{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<header class="header_alta">
					        <h2>LISTADO DE PEDIDOS</h2>
</header>
<div class="boton_agregar">
<a href="../controller/c_definir_turno.php" title="agregar_pedido">Confeccion y Entrega de Pedido </a>
</div>
<table id="tabla_listado_alimentos">
        <thead class="especial">
                            <tr>
							     <th>NUMERO DE PEDIDO</th>
                                 <th>FECHA INGRESO DEL PEDIDO</th>
                                 <th>CON ENVIO</th>
								 <th>ESTADO</th>
                                 <th>RAZON SOCIAL</th>
								 <th>TELEFONO</th>
								 <th>DOMICILIO</th>
								 <th colspan="7">OPERACIONES</th>
								 
                            </tr>
        </thead>
        <tbody>
		                   {% for p_m in pedidos_modelo %}
						                  <tr>
										      										  
										      <td>{{ p_m['numero_pedido_modelo'] }}</td>
											  <td>{{ p_m['fecha_ingreso'] }}</td>
										      <td>{% if p_m['con_envio'] == 1 %} Si {% else %} No {% endif %}</td> 
											  <td>{{ p_m['descripcion'] }}</td>
										      <td>{{ p_m['razon_social'] }}</td>	
											  <td>{{ p_m['telefono'] }}</td>											  
											  <td>{{ p_m['domicilio'] }}</td>
	
											  <td><a href="../controller/c_ver_alimento.php?detalle_alimento_id={{ p_m['detalle_alimento_id'] }}&numero_pedido={{ p_m['numero_pedido_modelo'] }}" title="ver alimento">Ver Alimento</a></td> 
											  <td> <a href="../controller/c_ver_turno_entrega.php?turno_entrega_id={{ p_m['turno_entrega_id'] }}&numero_pedido={{ p_m['numero_pedido_modelo'] }}" title="ver turno">ver Turno</a></td>
											  <td>  {% if p_m['con_envio'] == 1 %}
											               <div><a href="../controller/c_mostrar_recorrido.php?entidad_receptora_id={{ p_m['entidad_receptora_id'] }}" title="mostrar recorrido">Mostrar Recorrido </a></div>
											        {% endif %}
											  </td>
											  
											      {% if p_m['estado_pedido_id'] != 1 %}
											           <td><a href="../controller/c_enviar_pedido.php?numero={{ p_m['numero_pedido_modelo'] }}" title="enviar pedido">Enviar</a>
											           </td>
											           <td><a href="../controller/c_edit_pedido.php?numero={{ p_m['numero_pedido_modelo'] }}" title="editar">Editar</a></td> 
											           <td> <a href="../controller/c_delete_pedido.php?numero={{ p_m['numero_pedido_modelo'] }}" title="agregar">Eliminar</a></td>													   
                                                   {% endif %}
												   {% if p_m['estado_pedido_id'] != 2 %}
												   <td>	<a href="../controller/c_marcar_no_entregado.php?numero={{ p_m['numero_pedido_modelo'] }}" title="marcar como no entregado">Marcar No Entregado</a> </td>
												   {% endif %}
											 
										  </tr>
							{% endfor %}					
        </tbody>
</table>
{% endblock %}