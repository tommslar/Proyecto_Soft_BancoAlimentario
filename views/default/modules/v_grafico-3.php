{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<script>
	$(function () { 
		$('#grafico').highcharts({
			chart: {
				type: 'column'
			},
			title: {
				text: 'ALIMENTOS VENCIDOS SIN ENTREGAR' 
			},
			xAxis: {
				categories: {{alimentos|raw}},
				title: {
                        text:'Alimento'
				}
				
			},
			yAxis: {
				title: {
					text: 'Kilos'
				}
			},
			series: [{
				name: 'cantidad sin entregar',
				data: {{cantidades|raw}}
			}]
		});
	});

</script>
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header> 
       <h2> Resultado De Su Busqueda Para el año: {{year}} y mes: {{month }}</h2>
</header>
<div id="grafico"></div>
{% endblock %}