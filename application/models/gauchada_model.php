<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gauchada_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function pedir_gauchada($data,$mail,$contenido,$array_tipo){
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('email', $mail);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		
		$id= ($resultado->idUsuario);
		$idLocalidad = ($resultado->idLocalidad);
		
		$this->db->insert('gauchada',array('titulo'=>$data['titulo'],'texto'=>$data['descripcion'],
		'fecha'=>$data['fecha'],'imagen'=>$contenido, 'tipoImagen'=> $array_tipo[1], 'idUsuario'=>$id,'idLocalidad'=>$idLocalidad));
	}
	
	function pedir_gauchada2($data,$mail){
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('email', $mail);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		
		$id= ($resultado->idUsuario);
		$idLocalidad = ($resultado->idLocalidad);
		
		$this->db->insert('gauchada',array('titulo'=>$data['titulo'],'texto'=>$data['descripcion'],
		'fecha'=>$data['fecha'], 'idUsuario'=>$id,'idLocalidad'=>$idLocalidad));
	}
	
	function restar_credito($mail){
		$this->db->select('creditos');
		$this->db->from('usuario');
		$this->db->where('email', $mail);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		$num= $resultado->creditos;
		$num=$num-1;
		
		$data7 = array(
			'creditos' => $num
		);
		$this->db->where('email', $mail);
        $this->db->update('usuario', $data7);		
	}
}
?>