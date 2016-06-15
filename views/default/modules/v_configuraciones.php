{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<script>
$(function(){
   $('.edit').click(function(){
	        var id=$(this).attr('data-id');
			$.ajax({
		          type: 'post',
		          url: '../controller/c_edit_configuracion.php',
		          data: {variable : id},
		          success: function(data)
		          {
				    $('#block').show();
                    $('#res').show(); 
		            $('#res').html(data);
					
		          }
		   
	     });
	   
	})
})	

$(function(){	
	$('#contenedor').on('click', '#cancel', function(){
	          $('#block').hide();
              $('#res').hide();
			  return false;
	})

          
   
      $('#contenedor').on('click', '#close', function(){
          			$('#block').hide();
                    $('#res').hide();
   })
   

})	
</script>
<div id="block"></div>
<div id="res"></div>
<div id="res2"></div>
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header class="header_alta">
					        <h2>CONFIGURACIONES DEL SISTEMA</h2>
</header>
<table id="tabla_info">
                            {% for c in configuraciones %} 
						                  <tr class="row">											       
										      <th>{{ c['clave'] }}</th><td>{{ c['valor'] }}</td><td class="oculto"><a class="edit" href="javascript:void(0);" data-id="{{ c['id_configuracion'] }}" title="editar">editar</a></td>
											  
										  </tr> 
                            {% endfor %}
                            <tr class="row">											       
										      <th>{{ latitud_banco['clave'] }}</th><td colspan="2">{{ latitud_banco['valor'] }}
							</tr>
                            <tr class="row">											       
										     <th>{{ longitud_banco['clave'] }}</th><td colspan="2">{{ longitud_banco['valor'] }}
							</tr>							
</table>
<form id="coordenadas" action="../controller/c_apply_coordenadas.php" method="POST">
<input type="hidden" id="id_lat" name="id_lat" value="{{latitud_banco['id_configuracion']}}"/>
<input type="hidden" id="id_long" name="id_long" value="{{longitud_banco['id_configuracion']}}"/>
<div>
<h3>EDITAR COORDENADAS DEL BANCO</h3>
<span> CLAVE: </span>
<input id="clave_lat" name="clave_lat" type="text" value="{{ latitud_banco['clave'] }}"> 
<span> VALOR: </span>
<input id="loglat" name="loglat" type="text" value=""> 
</div>
<div>
<span> CLAVE: </span> 
<input id="clave_long" name="clave_long" type="text" value="{{ longitud_banco['clave'] }}"> 
<span> VALOR: </span> 
<input id="loglong" name="loglong" type="text" value="">
</div>   
<input id="guardar" type="submit" name="guardar" value="Guardar">
</form>
<div id="map_canvas"></div>
{% endblock %}