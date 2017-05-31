<body>
<tbody>
<tr>
<td>
<?php foreach($query as $row): ?>
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
	<td><img src= <?php //echo $row->imagen ?> ></td>
		<?php } ?>
		</p><br>
	<p><?php
		echo $row->texto;
	?></p><br>
	<input type="submit" value="Responder" style= "font-weight: bold; width:120px; height:40px" ></input>
	</center></div>
	<?php
	endforeach;
	?>
</td>	
</tr>
</tbody>
</body>
</html>