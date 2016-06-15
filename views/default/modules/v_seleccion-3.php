<script type='text/javascript'>
$(function(){

  $('#seleccion3').on('submit',function () {  
						
						      var mes = $('#mes',this).val();
		                      var anio = $('#anio',this).val();
							  if(mes !="" && anio !=""){
						            return true;
							  }
							  else{
							        alert("debe ingresar datos");
									return false;
							  }
									

	});
})	
</script>
<header>
      <h4>Ingrese El Mes y El Año Correspondientes Para El Resultado De Su Seleccion</h4>
</header>
<form class="formulario" id="seleccion3" action="../controller/c_estadistica-3.php" method="POST">			
			<fieldset>					
                        <span><label for="mes">Mes</label></span>
						<select name="mes" id="mes">
						        <option value="" selected="selected">- selecciona -</option>
				                <?php for($mes=01;$mes<=12; $mes++) { ?>                                
				                      <option value="<?php echo $mes; ?>"><?php setlocale(LC_TIME, "spanish"); echo strftime("%B", mktime(0, 0, 0, $mes, 1, date("Y") ) );?></option>
						        <?php } ?> 			
                        </select> 
						<span><label for="anio">Año</label></span>
						<select name="anio" id="anio">
						        <option value="" selected="selected">- selecciona -</option>
				                <?php for($anio=(date("Y")+1); date("Y")<=$anio; $anio--) {?>                                
				                      <option value="<?php echo $anio;?>"><?php echo $anio ;?></option>
						        <?php } ?> 			
                        </select> 
						<input id="mostrar" type="submit" name="mostrar" value="Mostrar"/>
			</fieldset>					
					
</form>



	