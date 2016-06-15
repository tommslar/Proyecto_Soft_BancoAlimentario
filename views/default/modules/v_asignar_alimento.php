{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<script>
 $(function(){
	$('#alimento').on('change',function () {
	         var alimento = $('option:selected',this).val();
             var fecha_reserva=$('#fecha_reserva').val();
             var hora_reserva=$('#hora_reserva').val();			 
			 if(alimento != ""){
                    $.ajax({
		                          type: 'post',
		                          url: '../controller/c_list_alimentos_contenidos.php',
		                          data: {alimento:alimento,
								         fecha_reserva:fecha_reserva,
										 hora_reserva:hora_reserva},
		                          success: function(data)
		                          {				    
		                           $('#alimentos').html(data);
					               $('#alimentos').show();
								   $('option:selected',this).text(alimento.text());
					              }						
		   
	                })			
			 }
 
			 else{
			    $('#alimentos').hide();
			}

	})
})


</script>
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header class="header_alta" >  
          <h1>>>>>>>>>>>> PASO  2 >>>>>>>>>> </h1>
		  <h2> ELECCION DEL ALIMENTO</h2>
          <h3>Debe Elegir El/Los Alimentos A Reservar</h3>   
</header>
<form id="detalles" action="../controller/c_definir_entidad_receptora.php" method="POST">		 			
                         <div><label for="alimento">Alimento: </label>
    					 <select id="alimento" name="alimento" required>
					             <option value="" selected="selected">-Seleccione-</option>
								 {% for c_d in codigos_descripciones %}                                        								 
                                       <option value="{{c_d['codigo']}}">{{c_d['descripcion']}}</option>
						         {% endfor %}
                          </select>
						  </div>
						  
						  <input type="hidden" name="fecha_reserva" id="fecha_reserva" value="{{fecha_reserva}}">
						  <input type="hidden" name="hora_reserva" id="hora_reserva" value="{{hora_reserva}}">
						  <input type="submit" name="finalizar" id="finalizar" value="Finalizar">

</form>
<div id="alimentos">
</div>
{% endblock %}