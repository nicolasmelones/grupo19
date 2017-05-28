
<body>

	<h1>Titulo</h1>
	
	<tbody>
<?php foreach($query as $row): ?>
<tr> 
   
	<td><a href="mostrarGauchada?id=<?php echo $row->id ?>"><?php echo $row->titulo; ?>  </a></td> 
	<br>
	<td><?php echo $row->texto; ?></td>
	<br>
	<?php 
		if ($row->imagen==NULL){?>
			<!--<img src="C:\xampp\htdocs\CodeIgniter\application\imagenes\icono.png">-->
			<img src="<?php echo base_url('application/imagenes/icono.png');?>"/>
		<?php
		}
		else{?>
	<td><img src= <?php //echo $row->imagen ?> ></td>
		<?php } ?>
	<br>
	<td><?php echo $row->texto; ?></td>
	
</tr>
<br>
<br>
<br>
<br>
<?php endforeach; ?>
</tbody>
	


</body>
</html>