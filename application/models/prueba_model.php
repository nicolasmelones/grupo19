<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	function crearUsuario($data){
		$this->db->insert('usuario',array('nombre'=>$data['nombre'],'apellido'=>$data['apellido'],
		'email'=>$data['email'],'clave'=>$data['clave'],'telefono'=>$data['telefono'],'edad'=>$data['edad'],
		'idLocalidad'=>$data['idLocalidad']));
	}
}
?>