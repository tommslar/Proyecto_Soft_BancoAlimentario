{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header class="header_alta">
					        <h2>DATOS DEL TURNO</h2>
							<h3 class ="h3_numero">NUMERO DE PEDIDO: {{pedido_numero}}</h3>
							
</header>
<table id="tabla_info">
						                  <tr>										      										  
										      <th>FECHA DEL TURNO </th><td>{{turno_entrega['fecha']}}</td>
										  </tr>  
										  <tr>  
											  <th>HORA DEL TURNO</th><td>{{turno_entrega['hora']}}</td>
										  </tr>  										  
</table>
{% endblock %}