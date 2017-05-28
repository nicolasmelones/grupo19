<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function listarGauchada(){
		$query = $this->db->select('*')->from('gauchada')->get();
		return $query->result();
	}
}
?>