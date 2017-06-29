<!DOCTYPE html>
<html lang='es'>
<head>
<title> Una Gauchada </title>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>estilo/estilo.css">
<meta charset='utf-8'>
<link rel="icon" type="image/png" href="http://localhost/CodeIgniter/imagenes/icono.png" />
<script type="text/javascript" src="<?= base_url() ?>js/javascript.js"></script>
</head>

	<ul class="barra">
		<li><a href="index">Inicio</a></li>
		<!--<li><a href="sesion_iniciada.php">Mi perfil</a></li>-->
		<?php 
			if(!$this->session->userdata('email')){ ?>
				<li><a href="nuevo">Registrarse</a></li>
				<li><a href="iniciar">Iniciar Sesión</a></li>				
			<?php }
		
		    else{ ?>
				<li2><a href="logout" style="color:white">Cerrar Sesión</a></li2>
				<li><a href="pedirG" style="color:white">Pedir Gauchada</a></li>
				<li><a href="comprarC" style="color:white">Comprar Crédito</a></li>
				<li2><a><?php
					$usuario = $this->session->userdata('email');
					$this->db->select('creditos');
					$this->db->from('usuario');
					$this->db->where('email', $usuario);
					$consulta = $this->db->get();
					$resultado = $consulta->row();
					echo 'Créditos: ';
					echo ($resultado->creditos);
				?></a></li2>
				<li2><a href="verPerfil?email=<?= $this->session->userdata('email');?>" style="color: white"><?php echo $this->session->userdata('email'); ?></a></li2>
	  <?php } ?>
			
	</ul>

	<img src="<?php echo('http://localhost/CodeIgniter/imagenes/fondo.png'); ?>">
