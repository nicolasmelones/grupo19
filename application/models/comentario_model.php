<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentario_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function traerComentarios($idGauchada){
		$this->db->select('*');
		$this->db->from('comentarios');
		$this->db->where('idGauchada', $idGauchada);
		$consulta = $this->db->get();
		if($consulta==''){
			return 0;
		}
		else{
		return $consulta->result();}
	}
	
	function comentar($data){
		$this->db->select('idUsuario');
		$this->db->from('usuario');
		$this->db->where('email', $data['email']);
		$consulta = $this->db->get();
		$resultado=$consulta->row();
		$id = $resultado->idUsuario;


		
		$this->db->insert('comentarios',array('idUser'=>$id,'idGauchada'=>$data['idGauchada'], 'comentario'=>$data['comentario'], 'fecha'=>date("Y-m-d")));
		
	}
	
	function responder($data,$idC){
		
		$this->db->where('idComentario', $idC);
		$this->db->update('comentarios', $data);
	}
}