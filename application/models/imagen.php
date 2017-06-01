<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imagen extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function getalldata(){
		$query = $this->db->get('file');
		return $query->result();
	}
}	
?>