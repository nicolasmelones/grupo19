<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iniciar_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}	
	function iniciar_usuario ($data){
		$this->db->select('email');
		$this->db->from('usuario');
		$this->db->where('email',$data['email']);
		$this->db->where('clave',$data['clave']);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		return $resultado;
	}
	}
	
	?>	