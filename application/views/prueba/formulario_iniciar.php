<?php echo validation_errors(); ?>
<?= form_open('/prueba/validarFormulario2',array('name'=>'iniciar','onsubmit' => 'return valida_enviar1();')) ?>
<?php
	$email = array(
		'name' => 'email',
		'value' => set_value('email'),
		'placeholder' => 'E-mail'
	);
	
	$clave = array(
		'name' => 'clave',
		'placeholder' => 'Clave'
	);
	
	?>
<center>
<div class="d1">
<h1><u>Iniciar Sesión</u></h1>
<br>	
	<?= form_label('E-mail: ','email') ?>
	<?= form_input($email) ?>
<br>
<br>
	<?= form_label('Clave: ','clave') ?>
	<?= form_password($clave) ?>	
<br>
<br>	
	<?= form_submit('','Enviar') ?>
<?= form_close() ?>
	
	</body>
</html>