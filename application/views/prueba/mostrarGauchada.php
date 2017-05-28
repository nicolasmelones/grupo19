<body>
<tbody>
<tr>
<td>
<?php foreach($query as $row): ?>

	<p><?php
		echo $row->titulo;
	?></p><br>
	<p><?php
		echo $row->texto;
	?></p><br>
	<p><?php
		echo $row->imagen;
	?></p><br>
	
	<?php
	endforeach;
	?>
</td>	
</tr>
</tbody>
</body>
</html>