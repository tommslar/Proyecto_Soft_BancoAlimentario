{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header class="header_alta">					        
					        <h2>MODIFICAR ENTIDAD RECEPTORA</h2>
							
</header>


<form id="alta_entidad_receptora" class="new" action="../controller/c_apply_edit_entidad_receptora.php" method="POST">			    
		<fieldset>                  				
			<input type="hidden" name="id_entidad_receptora" id="id_entidad_receptora" value="{{entidad_receptora['id_entidad_receptora']}}"/>

				 <div><label for="razon_social:">Razon Social: </label>
                 <input type="text" id="razon_social_er" name="razon_social_er" value="{{entidad_receptora['razon_social']}}" required ></div>
				 
				 <div><label for="telefono">Tel&eacute;fono: </label>
                 <input type="tel" id="telefono" name="telefono" value="{{entidad_receptora['telefono']}}" required></div>
				 
				 <div><label for="domicilio">Domicilio: </label>
                 <input type="text" id="domicilio" name="domicilio" value="{{entidad_receptora['domicilio']}}"required></div>	
				 
                 <div><label for="estado_entidad_id">Estado: </label>
                      <select id="estado_entidad_id" name="estado_entidad_id">
					      <option value="{{entidad_receptora['estado']}}" selected="selected">{{entidad_receptora['estado']}}</option>
						         {% for e in estados %}                           
                                         <option value="{{e['descripcion']}}">{{e['descripcion']}}</option>  
						         {% endfor %}
                      </select>
				 </div>
		         <div><label for="necesidad_entidad_id">Necesidad: </label>
                      <select id="necesidad_entidad_id" name="necesidad_entidad_id">
					      <option value="{{entidad_receptora['necesidad']}}" selected="selected">{{entidad_receptora['necesidad']}}</option>
						         {% for n in necesidades %}                          
                                         <option value="{{n['descripcion']}}">{{n['descripcion']}}</option>  
						         {% endfor %}
                      </select>
				 </div>	  
				 
				 <div><label for="servicio_prestado_id">Servicio: </label>
                      <select id="servicio_prestado_id" name="servicio_prestado_id">
					      <option value="{{entidad_receptora['servicio_prestado']}}" selected="selected">{{entidad_receptora['servicio_prestado']}}</option>
						         {% for s in servicios %}                           
                                         <option value="{{s['descripcion']}}">{{s['descripcion']}}</option>  
						        {% endfor %}
                      </select>
				 </div>	
				 
				 <!--
				 {% for option in habitats %}
								<option value="{{option.id_habitat}}" {%  if option.id_habitat == rows.id_habitat %} {{ "selected" }} {% endif %} > {{option.name}} </option>
							 {% endfor %}
							 -->
				 
		         <div class="div_botones_alta_alimentos">
					<input type="submit" name="modificar" value="modificar">
					<input type="reset" name="limpiar" value="Limpiar">
			     </div>							
        </fieldset>	
</form>
{% endblock %}