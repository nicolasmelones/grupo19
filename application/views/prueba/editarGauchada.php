<?php echo validation_errors(); ?>
<?= form_open_multipart('/prueba/validarEditarG',array('name'=>'gauchada','onsubmit' => 'return valida_enviar70();')) ?>
<?php



	$titulo = array(
		'name' => 'titulo',
		'value' => ($query[0]->titulo),
		'placeholder' => 'Ingrese el titulo'
	);
	
	$descripcion = array(
		'name' => 'descripcion',
		'value' => ($query[0]->texto),
		'placeholder' => 'Ingrese la descripcion de la gauchada'
	);
	
	$fecha = array(
		'name' => 'fecha',
		'value' => ($query[0]->fecha),
		'placeholder' => 'Ingrese la fecha'
	);
	
	$imagen = array(
		'name' => 'imagen',
		'value' => set_value('imagen'),
		'placeholder' => ''
	);
	
	
?>
<center>
<div class="d1">
<h1><u>Editar Gauchada</u></h1>

	<?= form_label('Titulo: ','titulo') ?>
	<br>
	<?= form_input($titulo) ?>
	<?=form_hidden('id', $query[0]->id);?>
<br>
<br>
	<?= form_label('Descripcion: ','descripcion') ?>
	<br>
	<?= form_textarea($descripcion) ?>
<br>
<br>Fecha limite actual: <?php echo $query[0]->fecha;?> <br>
	<?= form_label('Nueva fecha Limite (opcional): ','fecha') ?> <br>
	<input type="date" name="fecha" id="fecha" step="1" min="<?php echo date("d/m/Y"); ?>" max="01/01/2020">
<br>
<br> Imagen actual <br> <td><img src="<?php echo 'data:' . $query[0]->tipoImagen . ';base64,' . base64_encode($query[0]->imagen); ?>" width="400"></td>
<br>
	<?= form_label('Imagen (opcional): ','imagen') ?>
	<input type="file" name="imagen">
<br>
<br>	
	<?= form_submit('','Enviar') ?>
	<?= form_close() ?>
</div>
</center>
</body>
</html>