<input id="close" type="button" value ="X"/>
<form id="config" action="../controller/c_apply_edit_configuracion.php" method="POST">
					<input type="hidden" id="id_configuracion" name="id_configuracion" value="{{configuracion['id_configuracion']}}"/>
                    <fieldset>
					<div>
					<label>CLAVE</label>
					<input type="text" id="clave" name="clave" value="{{configuracion['clave']}}">
                    </div>
                    <div>
                     <label>VALOR</label>					
				    <input type="text" id="valor" name="valor" value="{{configuracion['valor']}}">
					</div>
					</fieldset>
					<div class="botones_row">
					<input id="cancel" type="button" value ="Cancelar" />
					<input id="reset" type="reset" value="Resetear"/>
					<input id="submit" type="submit" name="guardar" value="Guardar"/>			
			        </div>
</form>