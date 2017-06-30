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
	
	$seccion = array(
		'name' => 'seccion',
		'value' => ($query[0]->idSeccion),
		'placeholder' => ''
	);
	$seccion1 = $query[0]->idSeccion;
	
?>
<center>
<div class="d1">
<h1><u>Editar Gauchada</u></h1>

	<?= form_label('<b>Titulo:</b> ','titulo') ?>
	<br>
	<?= form_input($titulo) ?>
	<?=form_hidden('id', $query[0]->id);?>
<br>
<br>
	<?= form_label('<b>Descripcion:</b> ','descripcion') ?>
	<br>
	<?= form_textarea($descripcion) ?>
<br>
<br><b>Fecha limite actual:</b>
	<?php 
		$fecha = $query[0]->fecha; 
		$fecha2 = explode("-", $fecha);
		echo $fecha2[2]; echo "-";
		echo $fecha2[1]; echo "-";
		echo $fecha2[0];
	?> <br>
	<?= form_label('<b>Nueva fecha Limite (opcional):</b> ','fecha') ?> <br>
	<input type="date" name="fecha" id="fecha" step="1" min="<?php echo date("d/m/Y"); ?>" max="01/01/2020">
<br>
	<?php
		$query2 = $this->db->query("SELECT * FROM secciones");
		$loc = array ();
		$i=1;
		foreach($query2->result() as $row){
			$loc[$i] = $row->seccion;	
			$i++;
		}
	?>	
<br>
<br>	
	<?= form_label('<b>Sección:</b> ','seccion') ?>	
	<?= form_dropdown('seccion',$loc,$seccion1 ) ?>
<br>
<br><b>Imagen actual</b> <br> <td><img src="<?php
if ($query[0]->tipoImagen == ''){?> http://localhost/CodeIgniter/imagenes/icono.png"> <?php }
else{
echo 'data:' . $query[0]->tipoImagen . ';base64,' . base64_encode($query[0]->imagen); ?>" width="400"><?php } ?></td>
<br>
	<?php
	if($query[0]->tipoImagen != ''){?>
	<b>Eliminar imagen actual</b>
	<input type="checkbox" value='1' name="eliminarI">
	<br>
	<br>
	<?php } ?>
	<?= form_label('<b>Imagen nueva (opcional):</b> ','imagen') ?>
	<input type="file" name="imagen">
<br>
<br>	
	<?= form_submit('','Enviar') ?>
	<?= form_close() ?>
</div>
</center>
</body>
</html>