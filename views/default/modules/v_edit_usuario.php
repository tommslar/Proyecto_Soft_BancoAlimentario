{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<script>
		$(function () {          
           $("#fecha_nacimiento").datepicker();
           });
</script>
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header class="header_alta">					        
		<h2>MODIFICAR USUARIO</h2>							
</header>
<form id="alta_alimento" class="new" action="../controller/c_apply_edit_usuario.php" method="POST">			    
			<fieldset> 
			     <input type="hidden" name="id_usuario" id="id_usuario" value="{{datos_usuario['id_usuario']}}"/>
			     <p> Seleccione un Perfil </p>		 			
                         <div><label for="id_perfil_usuario">Perfil: </label>
    					 <select id="perfil_usuario_id" name="perfil_usuario_id" required>
					             <option value="{{datos_usuario['perfil_usuario_id']}}" selected="selected">{{datos_usuario['perfil']}}</option>
								 {% for p in perfiles %}                                         								 
                                       <option value="{{p['id_perfil_usuario']}}">{{p['perfil']}}</option>
						         {% endfor %}
                          </select>
						  </div>	
						  
					      <div><label for="fecha_nacimiento">Fecha Nacimiento:</label>
					      <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="{{datos_usuario['fecha_nacimiento']}}"/></div>
						  
				          <div><label for="nombreyapellido">Nombre y Apellido: </label>					
				          <input type="text" id="nombreyapellido" name="nombreyapellido" value="{{datos_usuario['nomyape']}}"></div>
						  
						  <div><label for="nombreusuario">Nombre Usuario: </label>					
				          <input type="text" id="nombreusuario" name="nombreusuario" value="{{datos_usuario['nombreusuario']}}"></div>
						  <input type="hidden" name="usuarioviejo" id="usuarioviejo" value="{{datos_usuario['nombreusuario']}}"/>
						  
						  <div><label for="pass">Password: </label>					
				          <input type="password" id="pass" name="pass" value="{{datos_usuario['password']}}"></div>
				 
			</fieldset>			
			<div class="div_botones_alta_alimentos">
			<input type="submit" name="modificar" value="Modificar">
			<input type="reset" name="limpiar" value="Limpiar"></div>							
		    
</form>
{% endblock %}