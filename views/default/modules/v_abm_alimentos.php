{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<header class="header_alta">
					        <h2>LISTADO DE ALIMENTOS</h2>
</header>
<div class="boton_agregar">
<a href="../controller/c_new_alimento.php" title="agregar alimento"> Agregar Alimento </a>
</div>
<table id="tabla_listado_alimentos">
        <thead class="especial">
                            <tr>
							     <th>CODIGO</th>
                                 <th>DESCRIPCION</th>
                                 <th>FECHA DE VENCIMIENTO</th>
                                 <th>CANTIDAD_CONTENIDO</th>
								 <th>X</th>
								 <th>PESO UNITARIO</th>								 
								 <th>MEDIDA</th>
								 <th>STOCK</th>
								 <th>RESERVADO</th>
								 
								 <th colspan="3">OPERACIONES</th>
                            </tr>
        </thead>
        <tbody>
		                    {% for a in alimentos %}	
						                  <tr>
										      <td>{{ a['alimento_codigo'] }}</td>
											  <td>{{ a['descripcion'] }}</td>
										      <td>{{ a['fecha_vencimiento'] }}</td> 
										      <td>{{ a['cantidad_contenido'] }}</td>	
											  <td>X</td>
											  <td>{{ a['peso_unitario'] }}</td>											  
											  <td>{{ a['medida'] }}</td>
										      <td>{{ a['stock'] }}</td>
											  <td>{{ a['reservado'] }}</td>
											  
											  <td><a href="../controller/c_edit_alimento.php?id_detalle_alimento={{ a['id_detalle_alimento'] }}" title="editar">editar</a></td> 
											  <td> <a href="../controller/c_delete_alimento.php?id_detalle_alimento={{ a['id_detalle_alimento'] }}" title="agregar">eliminar</a></td>
											 
										  </tr>
							{% endfor %}					
        </tbody>
</table>
{% endblock %}