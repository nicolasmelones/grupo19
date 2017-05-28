<?php echo validation_errors(); ?>
<?= form_open('/prueba/validarFormulario2') ?>
<?php
	$email = array(
		'name' => 'email',
		'placeholder' => 'E-mail'
	);
	
	$clave = array(
		'name' => 'clave',
		'placeholder' => 'Clave'
	);
	
	?>
	
	<?= form_label('E-mail: ','email') ?>
	<?= form_input($email) ?>
<br>
	<?= form_label('Clave: ','clave') ?>
	<?= form_password($clave) ?>	
	
	<?= form_submit('','Enviar') ?>
<?= form_close() ?>
	
	</body>
</html>