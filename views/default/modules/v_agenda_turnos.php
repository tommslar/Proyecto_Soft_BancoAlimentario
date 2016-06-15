<table id="tabla_listado_alimentos">

         <thead class="especial">
		  <tr> <th colspan ="2">{{fecha}}</th></tr>
	      <tr>		     
		      <th>HORA</th>
			  <th>TURNO</th>
		  </tr>
		  
		  </thead>
		  
		  <tbody>  
		         {% for t in turnos %}
                 <tr>
				     <td>{{t['hora']}}</td><td><a class="ver_turno" href="../controller/c_ver_pedido.php?id_turno={{t['id_turno_entrega']}}" title="ver pedido">Ver Pedido</a></td>
				 </tr>	
				 {% endfor %}
				 
                 {% for i in 0..cantidad   %}
				 <tr>
				      <td> {{ horas[i]}}</td><td><a class="asignar_turno" href="../controller/c_asignar_alimento.php?fecha_reserva={{fecha}}&hora_reserva={{ horas[i]}}" title="asignar_turno">Asignar Turno</a></td>
				 </tr>
                    
                {% endfor %}
				 
		 <tbody>
</table>