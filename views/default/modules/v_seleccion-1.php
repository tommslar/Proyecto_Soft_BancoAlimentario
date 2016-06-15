<script type='text/javascript'>
$(function(){

  $('#seleccion1').on('submit',function () {  
						      var fecha_desde = $('#fecha_desde',this).val();
		                      var fecha_hasta = $('#fecha_hasta',this).val();
							  if(!isNaN(fecha_desde) && !isNaN(fecha_hasta)){
						            alert("debe ingresar datos");
									return false;
							  }
									

	});
		$(function () {          
           $("#fecha_desde").datepicker();
		   $("#fecha_hasta").datepicker();
           });
})	
</script>
<header>
       <h4>Ingrese Las Fechas Correspondientes Para El Resultado De Su Seleccion</h4>
</header>
<form class="formulario" id="seleccion1" action="../controller/c_estadistica-1.php" method="POST"> 
			<fieldset>					
					<span><label for="fecha_desde">Fecha Desde:</label></span>
					<input type="text" id="fecha_desde" name="fecha_desde" value=""/>
                    <span><label for="fecha_hasta">Fecha Hasta:</label></span>
					<input type="text" id="fecha_hasta" name="fecha_hasta" value=""/>
			</fieldset>
			<input id="generar_grafico" type="submit" name="generar_grafico" value="Generar Grafico"/>
</form>