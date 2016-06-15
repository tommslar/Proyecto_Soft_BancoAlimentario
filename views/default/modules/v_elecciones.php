<table>
 <tr>
     <th>CODIGO</th><th>ALIMENTO</th><th>CONTENIDO</th><th>CANTIDAD A RESERVAR</th><th colspan="2">OPERACION</th>	 
 </tr>
 {% for i in 0..cantidad   %}
 <tr>
     <td>{{alimentos[i]['alimento_codigo']}}</td><td>{{alimentos[i]['descripcion']}}</td><td>{{alimentos[i]['cantidad_contenido']}} x {{alimentos[i]['peso_unitario']}} {{alimentos[i]['medida']}}</td><td>{{cantidades[i]}}</td><td><a class="editar" href="../controller/c_ver_pedido.php?detalle_alimento_id={{alimentos[i]['id_detalle_alimento']}}" title="editar">Editar</a><a class="ver_turno" href="../controller/c_ver_pedido.php?detalle_alimento_id={{alimentos[i]['id_detalle_alimento']}}" title="elimiar">Eliminar</a></td>
</tr>
{% endfor %}
 </table>