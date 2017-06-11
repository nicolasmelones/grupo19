<?php echo validation_errors(); ?>
<?= form_open_multipart('/prueba/validarFormulario4',array('name'=>'gauchada','onsubmit' => 'return valida_enviar3();')) ?>
<?php
	$titulo = array(
		'name' => 'titulo',
		'value' => set_value('titulo'),
		'placeholder' => 'Ingrese el titulo'
	);
	
	$descripcion = array(
		'name' => 'descripcion',
		'value' => set_value('descripcion'),
		'placeholder' => 'Ingrese la descripcion de la gauchada'
	);
	
	$fecha = array(
		'name' => 'fecha',
		'value' => set_value('fecha'),
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
<h1><u>Pedir Gauchada</u></h1>

	<?= form_label('Titulo: ','titulo') ?>
	<br>
	<?= form_input($titulo) ?>
<br>
<br>
	<?= form_label('Descripcion: ','descripcion') ?>
	<br>
	<?= form_textarea($descripcion) ?>
<br>
<br>
	<?= form_label('Fecha Limite: ','fecha') ?>
	<input type="date" name="fecha" id="fecha" step="1" min="<?php echo date("d/m/Y"); ?>" max="01/01/2020">
<br>
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