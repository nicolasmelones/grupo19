<!DOCTYPE html>
<html lang='es'>
<head>
<title> Una Gauchada </title>
<meta charset='utf-8'>
<link rel="icon" type="image/png" href="icono.png" />
</head>

	<ul class="barra">
		<li><a href="index">Inicio</a></li>
		
		<?php 
			if(!$this->session->userdata('email')){ ?>
				<li><a href="nuevo">Registrarse</a></li>
				<li><a href="iniciar">Iniciar Sesión</a></li>				
			<?php }
		
		    else{ ?>
				<li><a href="logout">Cerrar Sesión</a></li>
				
			<?php } ?>
		

		<li><a href="sesion_iniciada.php">Mi perfil</a></li>
		<?php //}?>
		


	
	</ul>