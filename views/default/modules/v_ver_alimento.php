{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header class="header_alta">
					        <h2>DATOS DEL ALIMENTO</h2>
							<h3 class ="h3_numero">NUMERO DE PEDIDO: {{pedido_numero}} </h3>
</header>
<table id="tabla_info">
						                  <tr>										      										  
										      <th>CODIGO</th><td>{{detalle_alimento['alimento_codigo']}}</td>
										  </tr>  
										  <tr>  
											  <th>DESCRICION</th><td>{{descripcion['descripcion']}}</td>
										  </tr>  
										  <tr> 
										      <th>FECHA VENCIMIENTO</th><td>{{detalle_alimento['fecha_vencimiento']}}</td>
										  </tr>  
										  <tr> 
										      <th>CONTENIDO</th><td>{{detalle_alimento['cantidad_contenido']}} X {{detalle_alimento['peso_unitario']}} {{detalle_alimento['medida']}}</td>
										  </tr>  
										  <tr>  
											  <th>CANTIDAD A ENVIAR</th><td>{{cantidad['cantidad']}}</td>
									      </tr>				
</table>
{% endblock %}