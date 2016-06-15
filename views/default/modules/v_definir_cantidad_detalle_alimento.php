<script>
$(function(){
     $('#definir_cantidad').on('submit',function () {
	      var stock_d_a = $('#stock_d_a').val();
		  var cantidad_reserva = $('#cantidad_reserva').val();
		  if(stock_d_a != ' ' && cantidad_reserva !=' ' && parseInt(stock_d_a) < parseInt(cantidad_reserva)){
		         $('#msj').text('No Hay Suficiente Stock');
				 $('#msj').show();
				 return false;
		  }
		  else{
		       $('#msj').hide();

		  }
	 })
	 
	 $('#volver_elegir').click(function(){
	        var id_detalle_alimento = $('#id_detalle_alimento').val();
			var cantidad_reserva = $('#cantidad_reserva').val();
			var fecha_reserva=$('#fecha_reserva').val();
			var hora_reserva = $('#hora_reserva').val();
			var stock = $('#stock_d_a').val();
			if(parseInt(stock) >= parseInt(cantidad_reserva)){
            $.ajax({
		          type: 'post',
		          url: '../controller/c_elecciones.php',
		          data: {id_detalle_alimento : id_detalle_alimento,
				         cantidad_reserva:cantidad_reserva,
						 fecha_reserva:fecha_reserva,
						 hora_reserva:hora_reserva
						 },
		          success: function(data)
		          {
				   $('#block').hide();
                   $('#res2').hide();           
				   $('#elecciones').show();
				   $('#elecciones').html(data);
				  
				  
				   
		          }
		   
	     });
		 }
		 else{
		 $('#msj').text('No Hay Suficiente Stock');
         $('#msj').show();
		 }
	})
	 
})
</script>
<input id="close" type="button" value ="X"/>
<h4>Ingrese La Cantidad Que Desea Reservar</h4>
<form id="definir_cantidad">			    
				  <div><label for="cantidad_reserva">Cantidad A Reservar: </label>
                  <input type="number" min="0" id="cantidad_reserva" name="cantidad_reserva" value="" required></div>
			 
			<input type="hidden" name="id_detalle_alimento" id="id_detalle_alimento" value="{{detalle_alimento_id}}">
			<input type="hidden" name="fecha_reserva" id="fecha_reserva" value="{{fecha_reserva}}">
            <input type="hidden" name="hora_reserva" id="hora_reserva" value="{{hora_reserva}}">
			<input type="hidden" name="stock_d_a" id="stock_d_a" value="{{stock}}">
			<p id="msj"></p>
			<div class="div_botones_alta_alimentos">
			<input id="cancel" type="button" name="cancelar" value="cancelar">
            <input id="volver_elegir" type="button" name="volver_elegir" value="Volver A Elegir">			
		    
</form>