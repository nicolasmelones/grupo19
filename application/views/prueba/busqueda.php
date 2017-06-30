<?php
	if(isset($_GET['titulo'])){
	$titulo=$_GET['titulo'];
	}
	if(isset($_GET['ciudad'])){
	$ciudad=$_GET['ciudad'];
	}
	if(isset($_GET['seccion'])){
	$seccion=$_GET['seccion'];
	}
?>
<center>
	<ul class="barra">
	<form id='buscar' action='index' method='GET'>
	<li3><label for='titulo'>Búsqueda</label>
	<input type='text' name='titulo' value="<?php if(isset($_GET['titulo'])){ echo $titulo;} ?>" placeholder="Ingrese un título">
	<select name='seccion'></li3>
	<option value='0'>Selecciona una sección</option>
	<?php
		$query2 = $this->db->query("SELECT * FROM secciones");
		$loc1 = array ();
		$i=1;
		foreach($query2->result() as $row){
			?><option value='<?php echo $i ?>'<?php if(isset($_GET['seccion'])){ if ($i == $seccion){echo 'selected';}} ?>><?php
			$loc1[$i] = $row->seccion;
			echo $loc1[$i];?></option><?php
			$i++;
		}
		?>	
		</select>
	<select name='ciudad'></li3>
	<option value='0'>Selecciona tu ciudad</option>
	<?php
		$query1 = $this->db->query("SELECT * FROM localidades");
		$loc = array ();
		$i=1;
		foreach($query1->result() as $row){
			?><option value='<?php echo $i ?>'<?php if(isset($_GET['ciudad'])){ if ($i == $ciudad){echo 'selected';}} ?>><?php
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