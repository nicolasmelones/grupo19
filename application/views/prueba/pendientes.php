<center>
<div class="d1" >
<u><h2>Valoraciones Pendientes</h2></u>
<center><table border="2">
			<tr>
			<th height="30"><strong>Gauchada</strong></td>
			<th height="30"><strong>Usuario</strong></td>
			<th height="30"><strong>Valorar</strong></td>
			<th height="30"><strong>Aceptar</strong></td>
			</tr>

<?php 
     foreach($query as $row):
	 
		$this->db->select('idUsuario');
		$this->db->from('ofrecimientos');
		$this->db->where('idGauchada', $row->id);
		$this->db->where('aceptado', '1');
		$consulta = $this->db->get();
		$id = $consulta->row()->idUsuario;


		$this->db->select('email');
		$this->db->from('usuario');
		$this->db->where('idUsuario', $id);
		$consulta5 = $this->db->get();
		$maaail = $consulta5->row()->email;		
		
		
		
	 
	 
		?><td><center><?php echo $row->titulo; ?></center></td>
		<td><center><?php echo $maaail; ?></center></td>
		<td><center><form action="validarValoracion">
			<select name="valoracion">
			<option value="1">Bien</option>
			<option value="2">Neutro</option>
			<option value="3">Mal</option>
			</select></td>
		<td><center><input type="submit" value="Aceptar"></input></center></td>
		<input type="hidden" name="idG" value="<?php echo $row->id; ?>"></input>
		</form></center><?php
	 endforeach;
	 ?>
	 
	 
	 
	 
</div>
</center>
</body>
</html>