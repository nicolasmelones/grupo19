<body>
<tbody>
<tr>
<td>
<?php foreach($query as $row): ?>
<?php if($row->fecha > date("Y-m-d")){ ?>
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
	<p>Fecha limite (aaaa/mm/dd): <?php
		echo $row->fecha;
	?></p><br>	
	
	<?php 
					$this->db->select('email');
					$this->db->from('usuario');
					$this->db->where('idUsuario', $row->idUsuario);
					$consulta = $this->db->get();
					$resultado = $consulta->row();
					$emaail=($resultado->email);	
	if($this->session->userdata('email')){		?>
	
	<p> Usuario : <a href="verPerfil?email=<?=$emaail?>"> <?php
		echo $emaail
	?></a></p><br>
<?php	if($emaail!=$this->session->userdata('email')){	?>
	<input type="submit" value="Ofrecerse" style= "font-weight: bold; width:120px; height:40px" ></input>
	</center></div>
	<?php
	}
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
		<p>Fecha limite (aaaa/mm/dd): <?php
		echo $row->fecha;
		?></p><br>	
		
		</center></div>
		
	<?php }
	
	endforeach;
	?>
</td>	
</tr>
</tbody>
</body>
</html>