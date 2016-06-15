{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<script>
$(function(){
      $('#mostrar_turnos').click(function(){
	         var fecha = $('#fecha').val();		 
			 var f = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
			 if(isNaN(fecha)){
			       
                   var fecha = new Date(new Date(fecha).getFullYear(), new Date(fecha).getMonth(), new Date(fecha).getDate());				   
                   if(Date.parse(fecha) >= Date.parse(f) ){
				        if(fecha.getDay()== 0 || fecha.getDay()== 6){
						      alert('No hay turnos definidos para el dia ingresado. Debe seleccionar un dia Habil');
						      $('#turnos').hide();
						}
						else{
						      var anio = fecha.getFullYear();
						      var mes = fecha.getMonth() + 1;
                              var dia = fecha.getDate();					  
						      $.ajax({
		                          type: 'post',
		                          url: '../controller/c_agenda_turnos.php',
		                          data: {mes : mes,
				                         anio:anio,
						                 dia:dia
						          },
		                          success: function(data)
		                          {				    
		                             $('#turnos').html(data);
					                 $('#turnos').show();
					              }						
		   
	                       })								
						}						
			       }
				   else{
				        alert('no se permite mostrar turnos con fechas menores a la fecha actual');
						$('#turnos').hide();
				   }
			 }
			 else{
			   alert('no se ingreso ninguna fecha');
			 }
      })
      $(function () {          
           $("#fecha").datepicker();
      });
})


</script>
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header class="header_alta">  
          <h1>>>>>>>>>>>> PASO  1 >>>>>>>>>> </h1>
          <h2> ELECCION DEL TURNO</h2>
          <h3>Debe Elegir una Fecha Para la Eleccion Del Turno</h3>   
</header>
<div id ="div_turnos">
<div id="calendario">
<form id="eleccion">
           <div>					
						<label for="fecha">Fecha</label>
						<div id="fecha" name="fecha"> </div>
						<input id="mostrar_turnos" type="button" name="mostrar_turnos" value="Mostrar Turnos"/>
			</div>
</form>
</div>
<div id="turnos"> </div>
<div class="clear"></div>
</div>
{% endblock %}