<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		 $this->load->helper('url'); 
		$this->load->model('prueba_model');
		$this->load->library('form_validation');
		$this->load->library('../controllers/prueba');
		$this->load->library('session');
	}
	
	function index(){
	$this->load->view('prueba/header');
	if(isset($_GET['cargadocorrecto'])){
		$this->load->view('prueba/compraExitosa');
	}		
	$this->load->model('inicio_model');
    $data['query'] = $this->inicio_model->listarGauchada();   
    $this->load->view('prueba/bienvenido',$data);
	
	}
	
	
	function mostrarGauchada(){
		$idd=$_GET['id'];
		$this->load->view('prueba/header');
		$this->load->model('traer_gauchada');
		$data['query'] = $this->traer_gauchada->mostrarGauchada1($idd);
		$this->load->view('prueba/mostrarGauchada',$data);
	}
	
	function holaMundo(){
		$this->load->view('prueba/header');
		$this->load->view('prueba/bienvenido');
	}
	
	function nuevo(){	
		$this->load->view('prueba/header');
		if(isset($_GET['error'])){
			$this->load->view('prueba/mailExistente');
		}	
		$this->load->view('prueba/formulario');
	}
	/*function ciudad($data){
		if($data!='Selecciona tu ciudad'){
			return true;
		}
		else{
			return false;
		}

	}*/
	
	function validarFormulario(){
		
		if($this->session->userdata('email')){
			redirect('prueba/index');
		}			
		
		$this->form_validation->set_rules('nombre','Nombre','required|trim');
		$this->form_validation->set_rules('apellido','Apellido','required|trim');
		$this->form_validation->set_rules('email','E-mail','required|valid_email');
		$this->form_validation->set_rules('clave','Clave','required|trim');
		$this->form_validation->set_rules('telefono','Teléfono','required|numeric|trim');
		$this->form_validation->set_rules('edad','Edad','required|numeric|trim|greater_than[0]|less_than[131]');
		//$this->form_validation->set_rules('idLocalidad','Ciudad','required|ciudad(idLocalidad)');
				
		
		if($this->form_validation->run() ==	FALSE){
			$this->load->view('prueba/header');
			$this->load->view('prueba/formulario');
			
		}
		else{

	
			$data = array(
			'nombre' => $this->input->post('nombre'),
			'apellido' => $this->input->post('apellido'),
			'email' => $this->input->post('email'),
			'clave' => $this->input->post('clave'),
			'telefono' => $this->input->post('telefono'),
			'edad' => $this->input->post('edad'),	
			'idLocalidad' => $this->input->post('localidades')
		    );
		$emaail=$data['email'];	
		$query = $this->db->query("SELECT * FROM usuario WHERE email='$emaail'");
		if($query->num_rows()==0){	
			$this->prueba_model->crearUsuario($data);
			redirect('prueba/iniciar?registroCorrecto');

		}
		else{
			redirect('prueba/nuevo?error');
		
		}
		}
	
	}
	
	
	function iniciar(){
		if($this->session->userdata('email')){
			redirect('prueba/index');
		}		
		$this->load->view('prueba/header');
		if(isset($_GET['error'])){
			$this->load->view('prueba/inicioIncorrecto');
		}
		if(isset($_GET['registroCorrecto'])){
			$this->load->view('prueba/registroCorrecto');
		}			
		$this->load->view('prueba/formulario_iniciar');

	}
	
	
	function logout(){
		$this->session->sess_destroy();
		redirect('prueba/index');
	}
	
	function validarFormulario2(){
		$this->form_validation->set_rules('email','E-mail','required|valid_email');
		$this->form_validation->set_rules('clave','Clave','required');
		$this->load->model('iniciar_model');
		
		
		
		
		if($this->form_validation->run() ==	FALSE){
			$this->load->view('prueba/header');
			$this->load->view('prueba/formulario_iniciar');
		}
		else{
			$data2 = array(
			'email' => $this->input->post('email'),
			'clave' => $this->input->post('clave')
			);
			
			$result=$this->iniciar_model->iniciar_usuario($data2);
			if ($result!=null){
				$this->session->set_userdata('email', $data2['email']);
				redirect('prueba/index');
			}
			else{
				redirect('prueba/iniciar?error');
				
			}
			
		
		}	
	}

	
	function comprarC(){
		if(!$this->session->userdata('email')){
			redirect('prueba/index');
		}		
		$this->load->view('prueba/header');
		if(isset($_GET['error'])){
			$this->load->view('prueba/tarjetaInvalida');
		}		
		$this->load->view('prueba/comprarCredito');

	}
	
	
	function validarFormulario3(){
		$this->form_validation->set_rules('numero','Número de tarjeta','required|numeric|exact_length[16]');
		$this->form_validation->set_rules('codigo','Código','required|numeric|exact_length[3]');
		$this->load->model('usuario_model');
		
		
		
		
		if($this->form_validation->run() ==	FALSE){
			$this->load->view('prueba/header');
			$this->load->view('prueba/comprarCredito');
		}
		else{
			$data3 = $this->session->userdata('email');
			$numero=$this->input->post('numero');
			if($numero>5555555555555555){
				$this->usuario_model->cargarCredito($data3);
				redirect('prueba/index?cargadocorrecto');
			}
			else{
				redirect('prueba/comprarC?error');
		
			}	
		}
	}	

}

?>