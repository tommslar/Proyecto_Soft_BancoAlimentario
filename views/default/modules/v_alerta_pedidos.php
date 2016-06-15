<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>
<header class="header_alta">
					        <h2>ALARMA - PEDIDOS</h2>
</header>
<table id="tabla_listado_alimentos">
        <thead class="especial">
                            <tr>
							
							     <th>NUMERO PEDIDO</th>
								 <th>FECHA DE INGRESO</th>
								 <th>CON ENVIO</th>
								 <th>ESTADO</th>
								 <th>TURNO ENTREGA</th>
                                 <th>FECHA</th>
                                 <th>HORA</th>
								 <th colspan="3">OPERACIONES</th>
                            </tr>
        </thead>
        <tbody>
						   <?php $index =0; foreach ($list_pedidos_turnos_fecha_actual as $p){ $index++;?>
						                  <tr>
										      
										      <td><?php echo $p['numero_pedido_modelo'];?></td>
											  <td><?php echo $p['fecha_ingreso'];?></td>											    
											  <td><?php if($p['con_envio'] == 1){
											               echo 'Si';
											               }else{
														   echo 'No';
											  }?></td>											  
											  <td><?php echo $p['descripcion'];?></td>
											  <td><?php echo $p['turno_entrega_id'];?></td>
										      <td><?php echo $p['fecha'];?></td> 
											  <td><?php echo $p['hora'];?></td>											  
											  <td><a href="../controller/c_ver_alimento.php?detalle_alimento_id=<?php echo $p['detalle_alimento_id'];?>&numero_pedido=<?php echo $p['numero_pedido_modelo'];?>" title="ver alimento">Ver Alimento</a></td> 
											  <td> <a href="../controller/c_ver_entidad_receptora.php?entidad_receptora_id=<?php echo $p['entidad_receptora_id'];?>&numero_pedido=<?php echo $p['numero_pedido_modelo'];?>" title="ver entidada receptora">Ver Entidad Receptora</a>
											  </td>
											  <?php if(strtotime($p['hora']) < strtotime(date('H:i:s')) and $p['estado_pedido_id'] == 3){?>
											           <td>	<a href="../controller/c_marcar_no_entregado.php?numero_pedido=<?php echo $p['numero_pedido_modelo'];?>" title="marcar como no entregado">Marcar No Entregado</a> </td>
										     <?php }?>											  		   
										  </tr>
										  
							<?php }?>					
        </tbody>
</table>		