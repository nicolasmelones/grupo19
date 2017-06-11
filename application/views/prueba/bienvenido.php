<body link="00000">
<center><h1>Gauchadas</h1></center>
<?php foreach($query as $row): ?>
	<?php if($row->fecha > date("Y-m-d")){ ?>
<div class="d1"><tr> 
	<center>
	<td><h2><a href="mostrarGauchada?id=<?php echo $row->id ?>"><?php echo $row->titulo; ?>  </a></h2></td>
	<br>
	<?php 
		if ($row->imagen==NULL){?>
			<img src="http://localhost/CodeIgniter/imagenes/icono.png">
		<?php
		}
		else{?>
	<td><img src="<?php echo 'data:' . $row->tipoImagen . ';base64,' . base64_encode($row->imagen); ?>" width="400"></td>
		<?php } ?>
	<br>
	<br>FECHA DE PUBLLICACIÓN Y SACAR BOTON CUANDO NO ESTÁ LOGUEADO
	<td><?php $texto = $row->texto;
		echo $aMostrar=substr($texto, 0, 150);
		if((strlen($texto))>150){
			echo'...';
		}
	}
	?></td>
	</center>
	
</tr></div>
<?php endforeach; ?>

	


</body>
</html>