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
	
	$seccion = array(
		'name' => 'seccion',
		'value' => set_value('seccion'),
		'placeholder' => ''
	);
	
?>
<center>
<div class="d1">
<h1><u>Pedir Gauchada</u></h1>

	<?= form_label('<b>Titulo:</b> ','titulo') ?>
	<br>
	<?= form_input($titulo) ?>
<br>
<br>
	<?= form_label('<b>Descripcion:</b> ','descripcion') ?>
	<br>
	<?= form_textarea($descripcion) ?>
<br>
<br>
	<?= form_label('<b>Fecha Limite:</b> ','fecha') ?>
	<input type="date" name="fecha" id="fecha" step="1" min="<?php echo date("d/m/Y"); ?>" max="01/01/2020">
<br>
<br>
	<?= form_label('<b>Sección:</b> ','fecha') ?>
	<select name='seccion'></li3>
	<option value='0'>Selecciona una sección</option>
	<?php
		$query1 = $this->db->query("SELECT * FROM secciones");
		$loc = array ();
		$i=1;
		foreach($query1->result() as $row){
			?><option value='<?php echo $i ?>'<?php if(isset($_GET['seccion'])){ if ($i == $seccion){echo 'selected';}} ?>><?php
			$loc[$i] = $row->seccion;
			echo $loc[$i];?></option><?php
			$i++;
		}
		?>	
		</select>
<br>
<br>
	<?= form_label('<b>Imagen (opcional):</b> ','imagen') ?>
	<input type="file" name="imagen">
<br>
<br>	
	<?= form_submit('','Enviar','class="btn"') ?>
	<?= form_close() ?>
</div>
</center>
</body>
</html>