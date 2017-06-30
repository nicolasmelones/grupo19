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
		'fecha'=>$data['fecha'],'idSeccion'=>$data['seccion'],'imagen'=>$contenido, 'tipoImagen'=> $array_tipo[1], 'idUsuario'=>$id,'idLocalidad'=>$idLocalidad));
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
		'fecha'=>$data['fecha'],'idSeccion'=>$data['seccion'], 'idUsuario'=>$id,'idLocalidad'=>$idLocalidad));
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
	function modificar_gauchada($data, $data2, $contenido){

		$id=$data['id'];
		
		$data54 = array(
		'titulo' => $data['titulo'],
		'texto' => $data['texto'],
		'fecha' => $data['fecha'],
		'idSeccion' => $data['idSeccion'],
		'imagen'=>$data2, 
		'tipoImagen'=> $contenido[1],
		'id' => $data['id'],
		 );
		$this->db->where('id', $id);
		$this->db->update('gauchada', $data54);
	}
	function modificar_gauchada2($data){
		$id=$data['id'];
		$this->db->where('id', $id);
		$this->db->update('gauchada', $data);
	}
	function eliminar_gauchada($idG){
		$mail=$this->session->userdata('email');
		$this->db->select('idUsuario');
		$this->db->from('usuario');
		$this->db->where('email', $mail);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		$idU= $resultado->idUsuario;
		
		$this->db->select('idUsuario');
		$this->db->from('gauchada');
		$this->db->where('id', $idG);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		$idUG= $resultado->idUsuario;
		
		$data1 = array('eliminado'=>'1');
		if($idUG==$idU){
			$this->db->where('id', $idG);
			$this->db->update('gauchada',$data1);
			redirect('prueba/index?gauchadaEliminada');
		}
		else{
			redirect('prueba/index?gauchadaDeotro');
			
		}
		
	}
	
	function eliminar_imagen($data){
		$data2 = array(
			'imagen' => NULL,
			'tipoImagen' => ''
		);
		$this->db->where('id', $data['id']);
		$this->db->update('gauchada',$data2);
		
	}
	
	function ofrecer($idG,$idU){
		$data54 = array(
		'idUsuario' => $idU,
		'idGauchada' => $idG
		);
		
		$this->db->insert('ofrecimientos',array('idUsuario'=>$data54['idUsuario'],'idGauchada'=>$data54['idGauchada'], 'aceptado'=>0));
		
	}
	
	function traerOfrecimientos($idG){
		$this->db->select('*');
		$this->db->from('ofrecimientos');
		$this->db->where('idGauchada', $idG);
		$consulta = $this->db->get();
		return $consulta->result();
	}
	
	function traerPendientes(){
		$email = $this->session->userdata('email');
		$this->db->select('idUsuario');
		$this->db->from('usuario');
		$this->db->where('email', $email);
		$consulta = $this->db->get();
		$id = $consulta->row()->idUsuario;
		
		$this->db->select('*');
		$this->db->from('gauchada');
		$this->db->where('idUsuario', $id);
		$this->db->where('aceptado', '1');
		$this->db->where('valorado', '0');
		$consulta2 = $this->db->get();
		
		return $consulta2->result();
	}
	function valorado($id){
		$data = array(
		'valorado' => '1'
		);
		$this->db->where('id', $id);
		$this->db->update('gauchada',$data);
		
		
	}
	
}
?>