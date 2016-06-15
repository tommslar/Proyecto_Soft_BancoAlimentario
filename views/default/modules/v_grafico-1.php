{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<script>
	
	$(function () {
		$('#grafico').highcharts({
			chart: {
				type: 'bar'
			},
			title: {
				text: 'KILOS DE PEDIDOS ENTREGADOS '
			},
			xAxis: {
				categories: {{pedidos|raw}},
				title: {
                        text:'Pedidos'
				}
			},
			yAxis: {
				title: {
					text: 'Kilos'
				}
			},
			series: [{
				name: 'Cantidad Entregada',
				data: {{cantidades|raw}}
			}]
		});
	});	
</script>
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header>
   <h2>Resultados De Su Busqueda Para Las Fechas{{fecha_desde}}  Y  {{fecha_hasta}}</h2>
</header>

<div id="grafico"></div>
{% endblock %}






