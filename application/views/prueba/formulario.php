<?php echo validation_errors(); ?>
<?= form_open('/prueba/validarFormulario') ?>
<?php
	$nombre = array(
		'name' => 'nombre',
		'value' => set_value('nombre'),
		'placeholder' => 'Escribi tu nombre'
	);
	
	$apellido = array(
		'name' => 'apellido',
		'value' => set_value('apellido'),
		'placeholder' => 'Escribi tu apellido'
	);
	
	$email = array(
		'name' => 'email',
		'value' => set_value('email'),
		'placeholder' => 'Escribi tu E-mail'
	);
	
	$clave = array(
		'name' => 'clave',
		'value' => set_value('clave'),
		'placeholder' => 'Escribi tu clave'
	);
	
	$telefono = array(
		'name' => 'telefono',
		'value' => set_value('telefono'),
		'placeholder' => 'Escribi tu telefono'
	);
	
	$edad = array(
		'name' => 'edad',
		'value' => set_value('edad'),
		'placeholder' => 'Escribi tu edad'
	);
	
	$ciudad = array(
		'name' => 'ciudad',
		'value' => set_value('ciudad'),
		'placeholder' => 'Selecciona tu ciudad'
	);
	
?>
<center>
<div class="d1">
<h1><u>Registrate como usuario</u></h1>

	<?= form_label('Nombre: ','nombre') ?>
	<?= form_input($nombre) ?>
	
	<h5>Username</h5>
	<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />

<br>
<br>
	<?= form_label('Apellido: ','apellido') ?>
	<?= form_input($apellido) ?>
<br>
<br>
	<?= form_label('E-mail: ','email') ?>
	<?= form_input($email) ?>
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
	<?= form_dropdown('localidades',$loc) ?>
<br>
<br>	
	<?= form_submit('','Enviar') ?>
	<?= form_close() ?>
</div>
</center>
</body>
</html>