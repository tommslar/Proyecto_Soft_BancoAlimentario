<script>
$(function(){
   $('.elegir').on('click', function(){
            var id=$(this).attr('data-id');
			var fecha_reserva=$(this).attr('data-fecha');
			var hora_reserva=$(this).attr('data-hora');
			var stock=$(this).attr('data-stock');
            $.ajax({
		          type: 'post',
		          url: '../controller/c_definir_cantidad_detalle_alimento.php',
		          data: {id : id,
				         fecha_reserva:fecha_reserva,
						 hora_reserva:hora_reserva,
						 stock:stock},
		          success: function(data)
		          {
				    $('#block').show();
                    $('#res2').show(); 
		            $('#res2').html(data);
					
		          }
		   
	     });
	})
})
$(function(){	
	$('#contenedor').on('click', '#cancel', function(){
	          $('#block').hide();
              $('#res2').hide();
			  return false;
	})

          
   
      $('#contenedor').on('click', '#close', function(){
          			$('#block').hide();
                    $('#res2').hide();
   })

})	
</script>
<div id="elecciones">
 
</div>
<header class="header_alta">
					        <h2>LISTADO DE DETAlLES ALIMENTOS ASOCIADOS A </h2>
							<h1> {{alimento_descripcion['descripcion']}} </h1>
</header>
<table id="tabla_listado_alimentos">
        <thead class="especial">
                            <tr>
                                 <th>CONTENIDO</th>
								 <th>STOCK</th>
                                 <th>OPERACION</th>
                            </tr>
        </thead>
        <tbody> 
		                   {% for d in detalles %}  
						                  <tr>
										      <td>{{d['cantidad_contenido']}} X {{d['peso_unitario']}} {{d['medida']}}</td>
											  <td>{{d['stock']}}</td>
											  <td><a class="elegir" href="javascript:void(0);" data-id="{{d['id_detalle_alimento']}}" data-fecha="{{fecha_reserva}}" data-hora="{{hora_reserva}}" data-stock="{{d['stock']}}"title="elegir">Elegir</a></td> 
											 
										  </tr>
							{% endfor %}							
        </tbody>,
</table>

<div id="block"></div>
<div id="res2"></div>