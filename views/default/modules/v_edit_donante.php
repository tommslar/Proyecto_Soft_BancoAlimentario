{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header class="header_alta">					        
					        <h2>EDITAR DONANTE</h2>							
</header>



<form class="new" action="../controller/c_apply_edit_donante.php" method="POST">	<!-- ACA EL ID FORM TENDRIA QUE SER EDITALIMENTO, lo deje por si tiene css --> 		    
		<fieldset>                  				
				 <input type="hidden" name="id_donante" id="id_donante" value="{{donante['id_donante']}}"/>

				 <div><label for="nombre:">Nombre: </label>
                 <input type="text" id="nombre_contacto" name="nombre_contacto" value="{{donante['nombre_contacto']}}" required></div>
				 
				 <div><label for="apellido">Apellido: </label>
                 <input type="text" id="apellido_contacto" name="apellido_contacto" value="{{donante['apellido_contacto']}}" required></div>
				 
				 <div><label for="telefono">Tel&oacute;fono: </label>
                 <input type="tel" id="telefono_contacto" name="telefono_contacto" value="{{donante['telefono_contacto']}}" required></div>	
				 
				 <div><label for="email">Email: </label>
                 <input type="email" id="mail_contacto" name="mail_contacto" value="{{donante['mail_contacto']}}" required></div>
				 				 <input type="hidden" name="mailviejo" id="mailviejo" value="{{donante['mail_contacto']}}"/>

				 
				 <div><label for="razon_social">Raz&oacute;n Social: </label>
                 <input type="text" id="razon_social" name="razon_social" value="{{donante['razon_social']}}" required></div>
				 
				 <div><label for="domicilio_contacto">Domicilio: </label>
                 <input type="text" id="domicilio_contacto" name="domicilio_contacto" value="{{donante['domicilio_contacto']}}" required></div>
				 				 
		         <div class="div_botones_alta_alimentos">
					<input type="submit" name="Modificar" value="Modificar">
					<input type="reset" name="limpiar" value="Limpiar">
			     </div>							
        </fieldset>	
</form>
{% endblock %}