<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>	
<header class="header_alta">
					        <h2>DATOS DEL PEDIDO</h2>
</header>
<table id="tabla_info">
						                  <tr>										      										  
										      <th>NUMERO PEDIDO</th><td><?php echo $numero_pedido;?></td>
										  </tr> 
 										  <tr>  
											  <th>FECHA DE INGRESO</th><td><?php echo $pedido_modelo['fecha_ingreso'];?></td>
									      </tr>											  
										   
										  <tr> 
										      <th>CON ENVIO</th><td><?php if($pedido_modelo['con_envio'] == 1){ echo 'Si';} else { echo 'No';}?></td>
										  </tr>
										  <tr>  
											  <th>ENTIDAD RECEPTORA</th><td><?php echo $entidad_receptora['razon_social'];echo ' , '; echo $entidad_receptora['domicilio']?></td>
										  </tr> 
                                          <tr>  
									         <th>ESTADO DEL PEDIDO</th><td><?php echo $descripcion_estado;?></td>
									      </tr>										  
										  <tr> 
										      <th>ALIMENTO </th><td> <?php echo $alimento_descripcion; echo ' '; echo $detalle_alimento['cantidad_contenido']; echo ' X'; echo $detalle_alimento['peso_unitario']; echo $detalle_alimento['medida'];?></td>
										  </tr> 
                                          <tr>  
										      <th>CANTIDAD RESERVADA</th><td><?php echo $cantidad;?></td>
									      </tr>										  
										  <tr>  
											  <th>FECHA DEL TURNO</th><td><?php echo $turno_entrega['fecha'];?></td>
									      </tr>	
									      <tr>  
											  <th>HORA DEL TURNO</th><td><?php echo $turno_entrega['hora'];?></td>
									      </tr>	
										  	
                                          											  
</table>