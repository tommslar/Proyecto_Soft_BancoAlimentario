{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<script type='text/javascript'>
$(function(){ 	
	$('#seleccion').on('change',function () {
	         var seleccion = $('option:selected',this).val();
			 if(seleccion != ""){
			       var link=$('option:selected',this).attr('data-link');				   
                   $('#resultado').load(link);
				   $('#resultado').show();
				   $('option:selected',this).text(seleccion.text());
			 } 
			 else
			     $('#resultado').hide();
			

	});	
})
$(function(){ 	
                  var seleccion = $('option:selected',this).val();
			      if(seleccion != ""){
				            var link=$('option:selected',this).attr('data-link');				   
                            $('#resultado').load(link);
				            $('#resultado').show();
				   }
})		 
</script>
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>						 						 
<header>				
					<h3>Estadísticas</h3>
</header>	
<div id="div_seleccion">
 <form id="estadisticas">
            <fieldset>
					<span><label for="seleccion">Seleccion</label> </span>
                    <select id="seleccion" name="seleccion">
                            <option value="" selected="selected">- selecciona -</option>
                            <option value="seleccion1" data-link="../views/default/modules/v_seleccion-1.php">Kilos De Pedidos Entregados</option>
                            <option value="seleccion2" data-link="../views/default/modules/v_seleccion-2.php">Kilos De Alimentos Entregados A Cada Entidad Receptora</option>
                            <option value="seleccion3" data-link="../views/default/modules/v_seleccion-3.php">Alimentos Vencidos Sin Entregar</option>
                    </select>
			</fieldset>	
 </form>
</div>
<div id="resultado"></div>
{% endblock %}