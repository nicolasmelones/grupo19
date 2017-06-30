<center>
<div class="d1" >
<?php
        $idG=$query[0]->idGauchada;
		$this->db->select('titulo');
		$this->db->from('gauchada');
		$this->db->where('id', $idG);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		$titulo= $resultado->titulo;

?><h2><u>Ofrecimientos de la gauchada "<?php echo $titulo;?>"
</u></h2>
<br>
<center><table border="2">
			<tr>
			<th height="30"><strong>Usuario que se ofrece</strong></td>
			<th height="30"><strong>Aceptar</strong></td>
			
			</tr>
<?php 
     foreach($query as $row):

		$idU=$row->idUsuario;

		$this->db->select('email');
		$this->db->from('usuario');
		$this->db->where('idUsuario', $idU);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		$email= $resultado->email;

	 ?>
	 
	 <tr>
		<td height="40"><center><a href="verPerfil?email=<?=$email?>"><?php echo $email;?></a></center></td>
		<td height="40"><center><a href="aceptar?idO=<?php echo $row->idOfrecimiento; ?>&idG=<?php echo $idG?>">Aceptar</a></center></td>
		



<?php
endforeach;
?></center>

</div>
</center>
</body>
</html>