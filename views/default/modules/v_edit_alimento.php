{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header class="header_alta">					        
		<h2>MODIFICAR ALIMENTO</h2>	
</header>
<form id="alta_alimento" class="new" action="../controller/c_apply_edit_alimento.php" method="POST">			    
			<fieldset> 
			     <legend> Seleccione un Alimento </legend>
                         <input type="hidden" name="id_detalle_alimento" id="id_detalle_alimento" value="{{ detalle_alimento['id_detalle_alimento'] }}">				 
                         <div><label for="alimento_codigo">Alimento: </label>	
						 <select id="alimento_codigo" name="alimento_codigo" required>	
					             <option value="{{detalle_alimento['alimento_codigo']}}" selected="selected">{{ detalle_alimento['descripcion'] }}</option>
								  {% for c_d in codigos_descripciones %}
                                       <option value="{{ c_d['codigo'] }}">{{ c_d['descripcion'] }}</option>
						        {% endfor %}
								 
                          </select>		 
						  </div>
			</fieldset>			 			
            <fieldset> 	 
                  	<legend>Detalle Del Alimento</legend>	
					<div><label for="fecha_vencimiento"> Fecha_Vencimiento: </label>
					<input type="date" id="fecha_vencimiento" name="fecha_vencimiento" value="{{ detalle_alimento['fecha_vencimiento'] }}" required ></div>					
					<div>
					<span>Cantidad:(Ejemplo:4 x 5 lt)</span>				
                    <input type="number" min="0" id="cantidad_contenido" name="cantidad_contenido" value="{{ detalle_alimento['cantidad_contenido'] }}" required>
					<span>Peso_Unitario:</span>
					<input type="number" min="0" id="peso_unitario" name="peso_unitario" value="{{ detalle_alimento['peso_unitario'] }}" required>
					<span>Medida:</span>	
					<input type="text" id="medida" name="medida" value="{{ detalle_alimento['medida'] }}" required></div>	
				    <div><label for="stock">Stock: </label>					
				    <input type="number" min="0" id="stock" name="stock" value="{{ detalle_alimento['stock'] }}" required></div>
				    <div><label for="stock">Reservado: </label>					
				    <input type="number" min="0" id="reservado" name="reservado" value="{{ detalle_alimento['reservado'] }}" required></div> 	
			</fieldset>			
			<div class="div_botones_alta_alimentos">
			<input type="submit" name="Modificar" value="Modificar">
			<input type="reset" name="limpiar" value="Limpiar"></div>							
		    
</form>
{% endblock %}