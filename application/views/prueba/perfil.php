<center>
<div class="d1">
<?php
	$mail=$this->session->userdata('email');
	if($mail==$query->email){?> <h1><u>Mi Perfil</u></h1> <?php }
	else {?>
	<h1><u>Perfil</u></h1><?php } ?>
	<b>Nombre:</b>
	<?php 
	echo $query->nombre;?><br>
	<b>Apellido:</b> <?php echo $query->apellido;?><br>
	<b>E-mail:</b> <?php echo $query->email;?><br>
	<b>Categoría:</b> (No implementado aún) <?php // echo $query->idCategoria;?><br>
	
	<?php	
		if($mail==$query->email){ ?>
		<b>Edad:</b> <?php echo $query->edad;?><br>
		<b>Telefono:</b> <?php echo $query->telefono;?><br>
		<b>Localidad:</b> <?php echo $query->localidad;?><br>	
		<b>Puntaje:</b> <?php echo $query->puntaje;?><br>
		<br><br><b><a href="editarPerfil?email=<?php echo $query->email?>">Editar Perfil</a></b><?php
		?>&nbsp &nbsp &nbsp &nbsp &nbsp <b><a href="pendientes">Valoraciones Pendientes</a></b>
		<?php }?><br>
		
</div>
</center>
</body>
</html>