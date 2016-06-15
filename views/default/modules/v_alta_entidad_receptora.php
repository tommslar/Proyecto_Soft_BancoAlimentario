{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header class="header_alta">					        
					        <h2>AGREGAR ENTIDAD RECEPTORA</h2>
							
</header>
<form id="alta_entidad_receptora" class="new" action="../controller/c_apply_new_entidad_receptora.php" method="POST">			    
		<fieldset>                  				
				 <div><label for="razon_social:">Razon Social: </label>
                 <input type="text" id="razon_social_er" name="razon_social_er" value="" required></div>
				 <div><label for="telefono">Tel&eacute;fono: </label>
                 <input type="tel" id="telefono" name="telefono" value="" required></div>
				 <div><label for="domicilio">Domicilio: </label>
                 <input type="text" id="domicilio" name="domicilio" value="" required></div>	
				 
				 <div><label for="estado_entidad_id">Estado: </label>
                      <select id="estado_entidad_id" name="estado_entidad_id" required>
					      <option value="" selected="selected">- selecciona -</option>
						         {% for e in estados %}	                          
                                         <option value="{{ e['descripcion'] }}">{{ e['descripcion'] }}</option>  
						         {% endfor %}
                      </select>
				 </div>
		         <div><label for="necesidad_entidad_id">Necesidad: </label>
                      <select id="necesidad_entidad_id" name="necesidad_entidad_id" required>
					      <option value="" selected="selected">- selecciona -</option>
						         {% for n in necesidades %}                           
                                         <option value="{{ n['descripcion'] }}">{{ n['descripcion'] }}</option>  
						         {% endfor %}
                      </select>
				 </div>	  
				 
				 <div><label for="servicio_prestado_id">Servicio: </label>
                      <select id="servicio_prestado_id" name="servicio_prestado_id" required>
					      <option value="" selected="selected">- selecciona -</option>
						         {% for s in servicios %}                             
                                         <option value="{{ s['descripcion'] }}">{{ s['descripcion'] }}</option>  
						         {% endfor %}
                      </select>
				 </div>	
				 
		         <div class="div_botones_alta_alimentos">
					<input type="submit" name="dar_alta" value="Dar Alta">
					<input type="reset" name="limpiar" value="Limpiar">
			     </div>							
        </fieldset>	
</form>
{% endblock %}