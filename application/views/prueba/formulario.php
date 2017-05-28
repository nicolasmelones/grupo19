<?php echo validation_errors(); ?>
<?= form_open('/prueba/validarFormulario') ?>
<?php
	$nombre = array(
		'name' => 'nombre',
		'placeholder' => 'Escribe tu nombre'
	);
	
	$apellido = array(
		'name' => 'apellido',
		'placeholder' => 'Escribe tu apellido'
	);
	
	$email = array(
		'name' => 'email',
		'placeholder' => 'Escribe tu E-mail'
	);
	
	$clave = array(
		'name' => 'clave',
		'placeholder' => 'Escribe tu clave'
	);
	
	$telefono = array(
		'name' => 'telefono',
		'placeholder' => 'Escribe tu telefono'
	);
	
	$edad = array(
		'name' => 'edad',
		'placeholder' => 'Escribe tu edad'
	);
	
	$ciudad = array(
		'name' => 'ciudad',
		'placeholder' => 'Selecciona tu ciudad'
	);
	
?>
	<?= form_label('Nombre: ','nombre') ?>
	<?= form_input($nombre) ?>
<br>
	<?= form_label('Apellido: ','apellido') ?>
	<?= form_input($apellido) ?>
<br>
	<?= form_label('E-mail: ','email') ?>
	<?= form_input($email) ?>
<br>
	<?= form_label('Clave: ','clave') ?>
	<?= form_input($clave) ?>
<br>
	<?= form_label('Telefono: ','telefono') ?>
	<?= form_input($telefono) ?>
<br>
	<?= form_label('Edad: ','edad') ?>
	<?= form_input($edad) ?>
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
	<?= form_dropdown('localidades',$loc) ?>
<br>	
	<?= form_submit('','Enviar') ?>
	<?= form_close() ?>

</body>
</html>