{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<header class="header_alta">
					        <h2>LISTADO DE ENTIDADES RECEPTORAS</h2>
</header>
<div class="boton_agregar">
<a href="../controller/c_alta_entidad_receptora.php" title="agregar entidad receptora"> Agregar Entidad Receptora </a>
</div>
<table id="tabla_listado_alimentos">
        <thead class="especial">
                            <tr>
                                 <th>RAZON SOCIAL</th>
                                 <th>TELEFONO</th>
                                 <th>DOMICILIO</th>
                                 <th>SERVICIO PRESTADO</th>
								 <th>ESTADO</th>
								 <th>NECESIDAD</th>
								<th colspan="3">OPERACIONES</th>
                            </tr>
        </thead>
        <tbody>
		                    {% for r_e in entidades_receptoras %}
						                  <tr>
										      <td>{{ r_e['razon_social'] }}</td>
											  <td>{{ r_e['telefono'] }}</td>
										      <td>{{ r_e['domicilio'] }}</td> 
										      <td>{{ r_e['servicio_prestado'] }}</td>
											  <td>{{ r_e['estado'] }}</td> 
											  <td>{{ r_e['necesidad'] }}</td> 
											  <td><a href="../controller/c_edit_entidad_receptora.php?id_entidad_receptora={{ r_e['id_entidad_receptora'] }}" title="editar">editar</a></td> 
											  <td> <a href="../controller/c_delete_entidad_receptora.php?id_entidad_receptora={{ r_e['id_entidad_receptora'] }}" title="agregar">eliminar</a></td>
										  </tr>
							{% endfor %}					
        </tbody>
</table>
{% endblock %}