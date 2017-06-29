<center>
<div class="d1">
<?php
	$mail=$this->session->userdata('email');
	if($mail==$query->email){?> <h1><u>Mi Perfil</u></h1> <?php }
	else {?>
	<h1><u>Perfil</u></h1><?php } ?>
Nombre:
<?php 
	echo $query->nombre;?><br>
	Apellido: <?php echo $query->apellido;?><br>
	E-mail: <?php echo $query->email;?><br>
<?php	if($mail==$query->email){ ?>
		Edad: <?php echo $query->edad;?><br>
		Telefono: <?php echo $query->telefono;?><br>
		Localidad: <?php echo $query->localidad;?><br>	
		Categoría: (No implementado aún) <?php echo $query->idCategoria;?><br>
		Puntaje:
		<br><br><a href="editarPerfil?email=<?php echo $query->email?>">Editar Perfil</a><?php
		}?><br>
		
</div>
</center>
</body>
</html>