<?php echo validation_errors(); 
?>
<body>
<tbody>
<tr>
<td>

<?php foreach($query as $row): ?>
<?php if($row->fecha > date("Y-m-d")){ 

if($row->eliminado==1){ ?>
	<div class="d4"><center><b><?php echo 'Gauchada eliminada.';?></b></center></div>
<?php }
if($row->aceptado==1){ ?>
	<div class="d4"><center><b><?php echo 'Gauchada ya realizada.';?></b></center></div>
<?php }


?>
	<div class="d1">
	<center>
	<h2><u><?php
		echo $row->titulo;
	?></u></h2><br>
	<p>
	<?php 
		if (($row->imagen==NULL) and ($row->tipoImagen =='')){?>
			<img src="http://localhost/CodeIgniter/imagenes/icono.png">
		<?php
		}
		else{?>
	<td><img src="<?php echo 'data:' . $row->tipoImagen . ';base64,' . base64_encode($row->imagen); ?>" width="400"></td>
		<?php } ?>
		</p><br>
	<p><?php
		echo $row->texto;
	?></p><br> <b>Sección:</b>
	<?php 
		echo $row->seccion;
		?>
	<p><b>Fecha límite:</b> <?php
		$fecha = $row->fecha;
		$fecha2 = explode("-", $fecha);
		//echo $row->fecha;
		echo $fecha2[2]; echo "-";
		echo $fecha2[1]; echo "-";
		echo $fecha2[0];
	?></p>
	<b>Localidad:</b> <?php echo $row->localidad; ?>
	
	<?php 
					$this->db->select('email');
					$this->db->from('usuario');
					$this->db->where('idUsuario', $row->idUsuario);
					$consulta = $this->db->get();
					$resultado = $consulta->row();
					$emaail=($resultado->email);	
	if($this->session->userdata('email')){		?>
	
	<p> <b>Usuario:</b> <a href="verPerfil?email=<?=$emaail?>"> <?php
		echo $emaail
	?></a></p><br>
<?php	if($emaail!=$this->session->userdata('email')){	?>
	<!--<input type="submit" value="Ofrecerse" style= "font-weight: bold; width:120px; height:40px"></input>-->
	<?php
	
			
					$mailA=$this->session->userdata('email');
					$this->db->select('idUsuario');
					$this->db->from('usuario');
					$this->db->where('email', $mailA);
					$consulta = $this->db->get();
					$idUA = $consulta->row()->idUsuario;
					
					$this->db->select('*');
					$this->db->from('ofrecimientos');
					$this->db->where('idUsuario', $idUA);
					$this->db->where('idGauchada', $query[0]->id);
					$consulta3 = $this->db->get();
					$resultado3 = $consulta3->row();
					
					
	if ($resultado3 == '' ){?>
	<a href="ofrecer?id=<?php echo $row->id; ?>"> Ofrecerse </a>
	
	
	<?php }
	?>
	<br>
	<br>
	<br>
	<?= form_open('/prueba/validarComentario',array('name'=>'comentario','onsubmit' => 'return valida_enviar();')) ?>
	<textarea name="comentario" rows="4" cols="50"></textarea>
	<br>
	<?=form_hidden('idG', $row->id);?>
	<?php $correo = $this->session->userdata('email'); ?>
	<?=form_hidden('idUsuarioActual', $correo);?>
	<?= form_submit('','Comentar') ?>
	<?= form_close() ?>	
	</center>
	<?php
	}else{
	if(($row->eliminado==0) && ($row->aceptado==0)){
			$emaailll=$this->session->userdata('email');
		
		?><a href="editarGauchada?id=<?php echo $row->id; ?>">Editar Gauchada</a><?php
		?><br><br><a href="eliminarGauchada?id=<?php echo $row->id;?>&email=<?=$emaailll?>" onClick="return confirm('¿Está seguro que desea eliminar esta gauchada?                                                                              ¡Importante!                                                         Si la gauchada no tiene ofrecimientos recuperará el crédito. Caso contrario no recuperará el crédito');">Eliminar Gauchada</a><?php
		?><br><br><a href="verOfrecimientos?id=<?php echo $row->id; ?>">Ver ofrecimientos</a><?php
	}}
	
	}
	
	}
	else{ ?>
	<div class="d4"><center><h2>Gauchada expirada.</center></h2></div>

	<div class="d1">
	<center>
	<h2><u><?php
		echo $row->titulo;
	?></u></h2><br>
	<p>
	<?php 
		if ($row->imagen==NULL){?>
			<img src="http://localhost/CodeIgniter/imagenes/icono.png">
		<?php
		}
		else{?>
		<td><img src="<?php echo 'data:' . $row->tipoImagen . ';base64,' . base64_encode($row->imagen); ?>" width="400"></td>
		<?php } ?>
		</p><br>
		<p><?php
		echo $row->texto;
		?></p><br>
		<p><b>Fecha limite:</b> 
		<?php
		$fecha = $row->fecha;
		$fecha2 = explode("-", $fecha);
		//echo $row->fecha;
		echo $fecha2[2]; echo "-";
		echo $fecha2[1]; echo "-";
		echo $fecha2[0];
		?></p><b>Seccion:</b> 
		<?php 
		echo $row->seccion;
		?>
		<br>
		<br>
		<b>Localidad:</b> <?php echo $row->localidad; ?>
		</center>
		
	<?php }

	endforeach;
	?>
	<center>
	<br>
	<br>
	<br>
	<h2><u>Comentarios</u></h2>
	<?php 
		foreach($query2 as $row2): 


					$this->db->select('email');
					$this->db->from('usuario');
					$this->db->where('idUsuario', $row2->idUser);
					$consulta1 = $this->db->get();
					$resultado1 = $consulta1->row();
					$eemaail=($resultado1->email);	
	?><div class="d5"><br><b>Usuario:</b> <a href="verPerfil?email=<?=$eemaail?>"> <?php
	echo $eemaail;
	?></a>&nbsp &nbsp &nbsp &nbsp &nbsp Publicado el <b><?php
	$fecha4 = $row2->fecha;
		$fecha5 = explode("-", $fecha4);
		//echo $row->fecha;
		echo $fecha5[2]; echo "-";
		echo $fecha5[1]; echo "-";
		echo $fecha5[0];
	?></b><br>--------------------------------------------------------------------------------<br><br><?php
	echo $row2->comentario;
	?><br><br><?php
	if($row2->respuesta != ''){ ?>
	--------------------------------------------------------------------------------
	<br>
	<br>
	<b><u>Respuesta</u></b><br><br> <?php 
		echo $row2->respuesta; ?> <br><br> <?php }
		if($emaail==$this->session->userdata('email') && ($row2->respuesta == '')){?>
			<?= form_open('/prueba/validarRespuesta',array('name'=>'respuesta')) ?>
			--------------------------------------------------------------------------------
			<textarea name="respuesta" rows="4" cols="50"></textarea><br><?php
			echo form_submit('','Responder');
			echo form_hidden('idComentario', $row2->idComentario);
			form_close();
		}
		
	?>
	</div>
	<?php
	
	
	
	endforeach;
	?> 
</center>
</div>
</td>	
</tr>
</tbody>
</body>
</html>