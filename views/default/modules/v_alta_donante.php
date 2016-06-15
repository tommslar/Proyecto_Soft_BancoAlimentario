{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header class="header_alta">					        
					        <h2>AGREGAR DONANTE</h2>
							
</header>
<form id="alta_donante" class="new" action="../controller/c_apply_new_donante.php" method="POST">			    
		<fieldset>                  				
				 <div><label for="nombre_contacto:">Nombres: </label>
                 <input type="text" id="nombre_contacto" name="nombre_contacto" value="" required></div>
				 
				 <div><label for="apellido_contacto">Apellidos: </label>
                 <input type="text" id="apellido_contacto" name="apellido_contacto" value="" required></div>
				 
				 <div><label for="telefono_contacto">Tel&oacute;fono: </label>
                 <input type="tel" id="telefono_contacto" name="telefono_contacto" value="" required ></div>	
				 
				 <div><label for="mail_contacto">Email: </label>
                 <input type="email" id="mail_contacto" name="mail_contacto" value="" required ></div>
				 
				 <div><label for="razon_social">Raz&oacute;n Social: </label>
                 <input type="text" id="razon_social" name="razon_social" value="" required ></div>
				 
				 <div><label for="domicilio_contacto">Domicilio: </label>
                 <input type="text" id="domicilio_contacto" name="domicilio_contacto" value="" required ></div>
				 
		         <div class="div_botones_alta_alimentos">
					<input type="submit" name="dar_alta" value="Dar Alta">
					<input type="reset" name="limpiar" value="Limpiar">
			     </div>							
        </fieldset>	
</form>  
{% endblock %}