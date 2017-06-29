<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Traer_gauchada extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function mostrarGauchada1($idd){
		$query = $this->db->query("SELECT * FROM gauchada INNER JOIN localidades ON (localidades.idLocalidad = gauchada.idLocalidad) INNER JOIN secciones ON (secciones.idSeccion = gauchada.idSeccion) WHERE id='$idd' GROUP BY (gauchada.id)");
		return $query->result();
	}
}
?>