{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header class="header_alta">					        
		<h2> ENTREGA DIRECTA DEL ALIMENTO </h2>
		<h3>{{ alimento_descripcion }}</h3>							
</header>
<form id="alimento_entrega_directa" class="new" action="../controller/c_apply_alimento_entrega_directa.php" method="POST">	
            <fieldset>
               <legend>Ingrese La Cantidad Que Se Enviara</legend>		    
		 		 <input type="hidden" name="id_detalle_alimento" id="id_detalle_alimento" value="{{ detalle_alimento_id }}"/>
				  <div><label for="cantidad_enviar">Cantidad A Enviar: </label>
                  <input type="number" min="0" id="cantidad_enviar" name="cantidad_enviar" value="" required></div>
		     </fieldset>
			<div class="div_botones_alta_alimentos">
			<input type="submit" name="Enviar" value="Enviar">
			<input class="volver" type="button" name="cancelar" value="cancelar" onclick="javascript:history.back()">
			<input type="reset" name="limpiar" value="Limpiar"></div>							
		    
</form>
{% endblock %}