<center>
<div class="d1" >
<h2><u>Ofrecimientos de la gauchada
<?php
        $idG=$query[0]->idGauchada;
		$this->db->select('titulo');
		$this->db->from('gauchada');
		$this->db->where('id', $idG);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		$titulo= $resultado->titulo;

 echo $titulo;?>
</u></h2>
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
Ofrecimiento de
<?php
echo $email;
?>

<a href="aceptar?idO=<?php echo $row->idOfrecimiento; ?>&idG=<?php echo $idG?>">Aceptar</a>
<br><br>


<?php
endforeach;
?>

</div>
</center>
</body>
</html>