{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header class="header_alta">
					        <h2>LISTADO DE ALIMENTOS EN STOCK</h2>
</header>
<table id="tabla_listado_alimentos">
        <thead class="especial">
                            <tr>
							     <th>CODIGO</th>
                                 <th>DESCRIPCION</th>
								 <th>STOCK</th>
                                 <th>CANTIDAD RESERVADA</th>
                            </tr>
        </thead>
        <tbody>
		                   {% for a_e_s in alimentos_en_stock %}
						                  <tr>
										      <td>{{ a_e_s['codigo'] }}</td>
											  <td>{{ a_e_s['descripcion'] }}</td>
										      <td>{{ a_e_s['stock'] }}</td>
											  <td>{{ a_e_s['cantidad_reservada'] }}</td>
											 
										  </tr>
                           {% endfor %}										  
        </tbody>
</table>
{% endblock %}