{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<header class="header_alta">
					        <h2>LISTADO DE USUARIOS</h2>
</header>
<div class="boton_agregar">
<a href="../controller/c_new_usuario.php" title="agregar alimento"> Agregar Usuario </a>
</div>
<table id="tabla_listado_alimentos">
        <thead class="especial">
                            <tr>
							     <th>APELLIDO Y NOMBRE </th>                                 
                                 <th>FECHA DE NACIMIENTO</th>
                                 <th>NOMBRE DE USUARIO</th>
								 <th>PERFIL</th>
                                 <th>ACTIVO</th>								 
								 
								 <th colspan="3">OPERACIONES</th>
                            </tr>
        </thead>
        <tbody>
		                   {% for u in usuarios %}
						                  <tr>
										      <td>{{ u['nomyape'] }}</td>
											  <td>{{ u['fecha_nacimiento'] }}</td>
										      <td>{{ u['nombreusuario'] }}</td> 
										      <td>{{ u['perfil'] }}</td>	
                                              <td>{% if u['activo'] == 1 %} Activado {% else %} Bloqueado {% endif %}</td>	
											  
											  <td><a href="../controller/c_edit_usuario.php?id_usuario={{  u['id_usuario'] }}" title="editar">editar</a></td> 
											  <td> <a href="../controller/c_delete_usuario.php?id_usuario={{ u['id_usuario'] }}" title="agregar">eliminar</a></td>
											 
										  </tr>
							{% endfor %}					
        </tbody>
</table>
{% endblock %}