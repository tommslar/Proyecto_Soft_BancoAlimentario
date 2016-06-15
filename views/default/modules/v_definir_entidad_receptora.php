{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header class="header_alta" >  
          <h1>>>>>>>>>>>> PASO  3 >>>>>>>>>> </h1>
		  <h2> ELECCION DE LA ENTIDAD RECEPTORA</h2>
          <h3>Debe Elegir La Entidad Receptora A Donde Se ENVIARA EL Pedido</h3>   
</header>
<form id="reserva" action="../controller/c_apply_reservar_pedido.php" method="POST">
			     <legend> Seleccione Una Entidad Receptora  </legend>		 			
                         <div><label for="entidad_receptora">Entidad Receptora: </label>
    					 <select id="entidad_receptora" name="entidad_receptora" required>
					             <option value="" selected="selected">-Seleccione-</option>
								 {% for e_r in entidades_receptoras %}                                        								 
                                       <option value="{{e_r['id_entidad_receptora']}}">{{e_r['razon_social']}}, {{e_r['domicilio']}}</option>
						         {% endfor %}
                          </select>
						  </div>
						  
						 <div><label for="con_envio">Con Envio: </label>
    					 <select id="con_envio" name="con_envio" required>
					             <option value="" selected="selected">-Seleccione-</option>
					             <option value="0">No</option>
								 <option value="1">Si</option>
                          </select>
						  </div>
						  <input type="hidden" name="fecha_reserva" id="fecha_reserva" value="{{fecha_reserva}}">
						  <input type="hidden" name="hora_reserva" id="hora_reserva" value="{{hora_reserva}}">
						  <input id="reservar" type="submit" name="reservar" value="Reservar"/>

</form>
{% endblock %}