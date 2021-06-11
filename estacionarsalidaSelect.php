<select name="patente" class="form-control">
	<?php foreach ($listado as $datos) {?>
		<option value="<?php echo $datos[0]; ?>"><?php echo $datos[0]; ?> </option>
	<?php }	?>
</select>
