<body>
<center><h1>Gauchadas</h1></center>
<?php foreach($query as $row): ?>
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
	<td><img src= <?php //echo $row->imagen ?> ></td>
		<?php } ?>
	<br>
	<td><?php $texto = $row->texto;
		echo $aMostrar=substr($texto, 0, 150);
		echo'...'
	?></td>
	</center>
	
</tr></div>
<?php endforeach; ?>

	


</body>
</html>