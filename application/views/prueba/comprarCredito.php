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

	<?= form_label('<b>Numero de tarjeta:</b> ','numero') ?>
	<?= form_input($numero) ?>
<br>
<br>
<?= form_label('<b>Codigo de seguridad:</b> ','codigo') ?>
	<?= form_input($codigo) ?>
<br>
<br>	
	<?= form_submit('','Enviar','class="btn"') ?>
	<?= form_close() ?>
</div>
</center>
</body>
</html>