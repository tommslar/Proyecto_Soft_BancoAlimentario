{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<a href="../controller/c_home.php" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header class="header_alta">
					        <h2>ALARMA - PROXIMOS VENCIMIMIENTOS FECHA LIMITE {{ fecha}}</h2>
</header>

<table id="tabla_listado_alimentos">
        <thead class="especial">
                            <tr>
							     <th>CODIGO</th>
                                 <th>DESCRIPCION</th>
								 <th>CANTIDAD CONTENIDO</th>
								 <th>X</th>
                                 <th>PESO UNITARIO</th>
                                 <th>MEDIDA</th>
								 <th>FECHA VENCIMIENTO</th>
								 <th>STOCK</th>
								 <th colspan="3">OPERACIONES</th>
                            </tr>
        </thead>
        <tbody>
		                   {% for p_v in list_proximos_vencimientos %}			
						                  <tr>

										      <td>{{ p_v['codigo']}}</td>
											  <td>{{ p_v['descripcion'] }}</td>
											  <td>{{p_v['cantidad_contenido']}}</td>
											  <td>x</td>
										      <td>{{ p_v['peso_unitario'] }}</td> 
											  <td>{{ p_v['medida'] }}</td>
										      <td>{{ p_v['fecha_vencimiento'] }}</td>
											  <td>{{ p_v['stock'] }}</td>
											  <td> <a href="../controller/c_alimento_entrega_directa.php?detalle_alimento_id={{p_v['id_detalle_alimento']}}&alimento_descripcion={{p_v['descripcion']}}" title="Entrega Directa">Entrega Directa</a></td>
										  </tr>
							{% endfor %}					
        </tbody>
</table>
{% endblock %}