<?php echo validation_errors(); 
?>
<?= form_open('/prueba/validarEditarP',array('name'=>'editar','onsubmit' => 'return valida_enviar77();')) ?>

 
<?php 
	$nombre = array(
		'name' => 'nombre',
		'value' => ($query->nombre),
		'placeholder' => 'Escribi tu nombre'
	);
	
	$apellido = array(
		'name' => 'apellido',
		'value' => ($query->apellido),
		'placeholder' => 'Escribi tu apellido'
	);
	$email = array(
		'name' => 'email',
		'value' => ($query->email),
		'placeholder' => 'Escribi tu E-mail'
	);
	$clave = array(
		'name' => 'clave',
		'value' => ($query->clave),
		'placeholder' => 'Escribi tu clave'
	);
	
	$telefono = array(
		'name' => 'telefono',
		'value' => ($query->telefono),
		'placeholder' => 'Escribi tu telefono'
	);
	
	$edad = array(
		'name' => 'edad',
		'value' => ($query->edad),
		'placeholder' => 'Escribi tu edad'
	);
	
	$ciudad = array(
		'name' => 'ciudad',
		'value' => ($query->idLocalidad),
		'placeholder' => 'Selecciona tu ciudad'
	);
	$ciudad1 = $query->idLocalidad;
	
?>
<center>
<div class="d1">
<h1><u>Editar perfil</u></h1>
	<?= form_label('Nombre: ','nombre') ?>
	<?= form_input($nombre, 'onClick="valida_enviar()"') ?>
<br>
<br>
	<?= form_label('Apellido: ','apellido') ?>
	<?= form_input($apellido) ?>
<br>
<br>
	<?= form_label('Clave: ','clave') ?>
	<?= form_input($clave) ?>
<br>
<br>
	<?= form_label('Telefono: ','telefono') ?>
	<?= form_input($telefono) ?>
<br>
<br>
	<?= form_label('Edad: ','edad') ?>
	<?= form_input($edad) ?>
<br>
<br>
	<?php
		$query = $this->db->query("SELECT * FROM localidades");
		$loc = array ();
		$loc[0] = 'Selecciona tu ciudad';
		$i=1;
		foreach($query->result() as $row){
			$loc[$i] = $row->localidad;	
			$i++;
		}
	?>	
	<?= form_label('Ciudad: ','ciudad') ?>
	<?= form_dropdown('localidades',$loc,$ciudad1 ) ?>
<br>
<br>	
	<?= form_submit('','Enviar') ?>
	<?= form_close() ?>
</div>
</center>
</body>
</html>