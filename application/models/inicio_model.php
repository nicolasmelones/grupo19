<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function listarGauchada($idLoc,$titulo){
		$this->db->select('*')->from('gauchada');
		if($idLoc!=0){
			$this->db->where("idLocalidad='$idLoc'");	
		}
		if($titulo!=''){
			$this->db->like('titulo',$titulo)	;
		}
		
		$this->db->order_by("id","desc");
		$query = $this->db->get();
		return $query->result();
	}
}
?>