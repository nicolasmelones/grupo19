<body><meta charset='utf-8'>


<?php echo validation_errors(); ?>
<?= form_open('/prueba/validarFormulario3',array('name'=>'credito','onsubmit' => 'return valida_enviar2();')) ?>
<?php
	$numero = array(
		'name' => 'numero',
		'value' => set_value('numero'),
		'placeholder' => 'Escribi tu numero de tarjeta'
	);
	$codigo = array(
		'name' => 'codigo',
		'value' => set_value('codigo'),
		'placeholder' => 'Escribi tu codigo'
	);

?>
<center>
<div class="d1" >

<h1><u>Comprar Credito</u></h1>

	<?= form_label('Numero de tarjeta: ','numero') ?>
	<?= form_input($numero) ?>
<br>
<br>
<?= form_label('Codigo de seguridad: ','codigo') ?>
	<?= form_input($codigo) ?>
<br>
<br>	
	<?= form_submit('','Enviar') ?>
	<?= form_close() ?>
</div>
</center>
</body>
</html>