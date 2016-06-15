{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<header class="header_alta">
					        <h2>LISTADO DE DONANTES</h2>
</header>

<div class="boton_agregar">
<a href="../controller/c_alta_donante.php" title="agregar donante">Agregar Donante</a>
</div>

<table id="tabla_listado_alimentos">
        <thead class="especial">
                            <tr>
                                 <th>NOMBRE</th>
                                 <th>APELLIDO</th>
                                 <th>EMAIL</th>
                                 <th>TELEFONO</th>
								 <th>DOMICILIO</th>
								 <th>RAZON_SOCIAL</th>
								 <th colspan="3">OPERACIONES</th>
								
                            </tr>
        </thead>
        <tbody> 
						   {% for d in donantes %}
						                  <tr>
										      <td> {{ d['nombre_contacto'] }}</td>
											  <td> {{ d['apellido_contacto'] }}</td>
										      <td> {{ d['mail_contacto'] }}</td> 
										      <td> {{ d['telefono_contacto'] }}</td>
											  <td> {{ d['domicilio_contacto'] }}</td> 
										      <td> {{ d['razon_social'] }}</td> 
											  <td><a href="../controller/c_editar_donante.php?id_donante={{ d['id_donante'] }}" title="editar">editar</a></td> 
											  <td> <a href="../controller/c_delete_donante.php?id_donante={{ d['id_donante']}}" title="agregar">eliminar</a></td>
											 
										  </tr>
							{% endfor %}					
        </tbody>
</table>
{% endblock %}