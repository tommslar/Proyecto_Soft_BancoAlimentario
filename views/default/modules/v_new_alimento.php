{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header class="header_alta">					        
		<h2>AGREGAR ALIMENTOS</h2>							
</header>
<form id="alta_alimento" class="new" action="../controller/c_apply_new_alimento.php" method="POST">			    
			<fieldset> 
			     <legend> Seleccione un Alimento </legend>		 			
                         <div><label for="alimento_codigo">Alimento: </label>
    					 <select id="alimento_codigo" name="alimento_codigo" required>
					             <option value="" selected="selected">-Seleccione-</option>
								 {% for c_d in codigos_descripciones %}                                      								 
                                       <option value="{{c_d['codigo']}}">{{c_d['descripcion']}}</option>
						         {% endfor %}
                          </select>
						  </div>
			</fieldset>			 			
            <fieldset> 	 
                  	<legend>Detalle Del Alimento</legend>	
					<div><label for="fecha_vencimiento"> Fecha_Vencimiento: </label>
					<input type="date" id="fecha_vencimiento" name="fecha_vencimiento" value="" required ></div>
					
					<div>
					Contenido:(Ejemplo:4 x 5 lt)	 <!-- esto es Contenido, no cantidad  -->		
					<input type="number" min="0" id="cantidad" name="cantidad" value="" required>  
					Peso_Unitario:
					<input type="number" min="0" id="peso_unitario" name="peso_unitario" value="" required>
					Medida:				
					 <select id="medida" name="medida" required>
					         <option value="" selected="selected"></option>
							 <option value="Kg">Kg</option> 
							 <option value="Lt">Lt</option>
							 <option value="Gr">Gr</option>
                    </select></div>
					
			</fieldset> 			
			<fieldset> 
			     <legend> Datos Donador </legend>	
				  <div><label for="mail_donante">Correo Electronico: </label>					
				  <input type="email" id="mail_donante" name="mail_donante" value=""></div>
				  <div><label for="cantidad_donada">Cantidad Donada (Paquetes): </label>
                  <input type="number" min="0" id="cantidad_donada" name="cantidad_donada" value="" required></div> <!-- aca le puse el mismo nombre a id y a name -->
			</fieldset>			
			<div class="div_botones_alta_alimentos">
			<input type="submit" name="dar_alta" value="Dar Alta">
			<input type="reset" name="limpiar" value="Limpiar"></div>							
		    
</form>
{% endblock %}