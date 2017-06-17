<center>
	<ul class="barra">
	<form id='buscar' action='index' method='GET'>
	<li3><label for='titulo'>Búsqueda</label>
	<input type='text' name='titulo' placeholder="Ingrese un título">
	<select name='ciudad'></li3>
	<option value='0'>Selecciona tu ciudad</option>
	<?php
		$query1 = $this->db->query("SELECT * FROM localidades");
		$loc = array ();
		$i=1;
		foreach($query1->result() as $row){
			?><option value='<?php echo $i ?>'><?php
			$loc[$i] = $row->localidad;
			echo $loc[$i];?></option><?php
			$i++;
		}
		?>	
		</select>
		<?= form_submit('','Enviar') ?></li3>
	</form>
	</ul>
</center>