{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<script>
	$(function () { 
		 $('#grafico').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'KILOS DE ALIMENTOS ENTREGADOS A CADA ENTIDAD RECEPTORA'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'Kilos',
                data: [{% for k_e_r in kilos_pedidos_entregados_x_entidad_receptora %} 
				                      ['{{k_e_r['razon_social']}}',   {{k_e_r['cantidad']}}],
					   {% endfor %}
                ]
            }]
        });
    });
</script>
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header>
   <h2>Resultados De Su Busqueda Para Las Fechas {{fecha_desde}}  Y  {{fecha_hasta}}</h2>
</header>

<div id="grafico"></div>
{% endblock %}