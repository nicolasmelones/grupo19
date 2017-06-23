<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function cargarCredito($data){
		$this->db->select('creditos');
		$this->db->from('usuario');
		$this->db->where('email', $data);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		$num= $resultado->creditos;
		$num=$num+1;
		
		$data7 = array(
			'creditos' => $num
		);
		$this->db->where('email', $data);
        $this->db->update('usuario', $data7);
	}
	
	function traerDatos($email){
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->join('localidades','localidades.idLocalidad = usuario.idLocalidad', 'inner');
		$this->db->where('email', $email);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		return $resultado;
	}
	
	function editarDatos($data5){
		
		$mail=$data5['email'];
		$this->db->where('email', $mail);
        $this->db->update('usuario', $data5);
	}
}
?>