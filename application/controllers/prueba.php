<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('date');
		$this->load->helper('file');
		$this->load->model('prueba_model');
		$this->load->library('form_validation');
		$this->load->library('../controllers/prueba');
		$this->load->library('session');
	}
	
	function index(){
	$this->load->view('prueba/header');
	$this->load->view('prueba/busqueda');
	if(isset($_GET['aceptado'])){
		$this->load->view('prueba/gauchadaAceptada');
	}
	if(isset($_GET['valoracionPendiente'])){
		$this->load->view('prueba/valoracionPendiente');
	}	
	if(isset($_GET['valorado'])){
		$this->load->view('prueba/valorado');
	}	
	if(isset($_GET['cargadocorrecto'])){
		$this->load->view('prueba/compraExitosa');
	}
	if(isset($_GET['tieneOfrecimientos'])){
		$this->load->view('prueba/tieneOfrecimientos');
	}
	if(isset($_GET['noOfrecimientos'])){
		$this->load->view('prueba/noOfrecimientos');
	}	
	if(isset($_GET['ofrecimientoExitoso'])){
		$this->load->view('prueba/ofrecimientoExitoso');
	}	
	if(isset($_GET['respuestaVacio'])){
		$this->load->view('prueba/respuestaVacio');
	}
	if(isset($_GET['respuestaExitosa'])){
		$this->load->view('prueba/respuestaExitosa');
	}
	if(isset($_GET['gauchadaDeotro'])){
		$this->load->view('prueba/gauchadaDeotro');
	}	
	if(isset($_GET['gauchadaEliminada'])){
		$this->load->view('prueba/gauchadaEliminada');
	}
	if(isset($_GET['gauchadaEditada'])){
		$this->load->view('prueba/gauchadaEditada');
	}	
	if(isset($_GET['editPcorrecto'])){
		$this->load->view('prueba/perfilEditado');
	}
	if(isset($_GET['sinCred'])){
		$this->load->view('prueba/sinCredito');
	}
	if(isset($_GET['favorPedido'])){
		$this->load->view('prueba/gauchadaCorrecto');
	}
	if(isset($_GET['comentarioExitoso'])){
		$this->load->view('prueba/comentarioExitoso');
	}	
	if(isset($_GET['noInicio'])){
		$this->load->view('prueba/noInicio');
	}	
	if(isset($_GET['ciudad'])){
		$ciudad=$_GET['ciudad'];
	}
	else{$ciudad=0;}
	
	if(isset($_GET['titulo'])){
		$titulo=$_GET['titulo'];
	}
	else{$titulo='';}
	
	if(isset($_GET['seccion'])){
		$seccion=$_GET['seccion'];
	}
	else{$seccion=0;}
	
	$this->load->model('inicio_model');
    $data['query'] = $this->inicio_model->listarGauchada($ciudad,$titulo,$seccion);
	if ($data['query'] == null){
		$this->load->view('prueba/busquedaNula');
	}
    $this->load->view('prueba/bienvenido',$data);
	
	}
	
	
	function mostrarGauchada(){
		$idd=$_GET['id'];
		$this->load->view('prueba/header');
		$this->load->model('traer_gauchada');
		$this->load->model('comentario_model');
		$data['query'] = $this->traer_gauchada->mostrarGauchada1($idd);
		if($this->comentario_model->traerComentarios($idd)!=''){
			$data['query2'] = $this->comentario_model->traerComentarios($idd);}		
		$this->load->view('prueba/mostrarGauchada',$data);
		
	}
	
	function holaMundo(){
		$this->load->view('prueba/header');
		$this->load->view('prueba/bienvenido');
	}
	
	function nuevo(){
		if($this->session->userdata('email')){
			redirect('prueba/index');
		}				
		$this->load->view('prueba/header');
		if(isset($_GET['error'])){
			$this->load->view('prueba/mailExistente');
		}	
		$this->load->view('prueba/formulario');
	}

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
		//$this->form_validation->set_rules('idLocalidad','Ciudad','required');
		
		if($this->form_validation->run() ==	FALSE){
			$this->load->view('prueba/header');
			$this->load->view('prueba/formulario');
			
		}
		else{

	        $credito=1;
			$data = array(
			'nombre' => $this->input->post('nombre'),
			'apellido' => $this->input->post('apellido'),
			'email' => $this->input->post('email'),
			'clave' => $this->input->post('clave'),
			'telefono' => $this->input->post('telefono'),
			'edad' => $this->input->post('edad'),
			'creditos'=> $credito,
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

	
	
	function pedirG(){
		if(!$this->session->userdata('email')){
			redirect('prueba/index');
		}
		$mail89=$this->session->userdata('email');
		$this->db->select('idUsuario');
		$this->db->from('usuario');
		$this->db->where('email', $mail89);
		$consulta89 = $this->db->get();
		$idUA1 = $consulta89->row()->idUsuario;	
	
		
		$this->db->select('*');
		$this->db->from('gauchada');
		$this->db->where('idUsuario', $idUA1);
		$this->db->where('aceptado', '1');
		$this->db->where('valorado', '0');		
		$consulta99 = $this->db->get();
		if($consulta99->num_rows()!='0'){
			redirect('prueba/index?valoracionPendiente');
			
		}
		
		$data7=$this->session->userdata('email');
		$this->db->select('creditos');
		$this->db->from('usuario');
		$this->db->where('email', $data7);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		$num= $resultado->creditos;
		if($num==0){
			redirect('prueba/index?sinCred');
		}
		
		$this->load->view('prueba/header');
		if(isset($_GET['fechaError'])){
			$this->load->view('prueba/fecha_error');
		}		
		if(isset($_GET['error'])){
			$this->load->view('prueba/pedidoInvalido');
		}		
		$this->load->view('prueba/gauchada');

	}

	
	function validarFormulario4(){
		$this->form_validation->set_rules('titulo','Título','required|max_length[50]');
		$this->form_validation->set_rules('descripcion','Descripción','required|max_length[3000]');
		$this->form_validation->set_rules('fecha','Fecha', 'required');
		//$this->form_validation->set_rules('imagen','Imagen','validate_image['.$_FILES['imagen'].']');
		$this->load->model('gauchada_model');
		
		
		$mail = $this->session->userdata('email');
		$data = array(
		'titulo' => $this->input->post('titulo'),
		'descripcion' => $this->input->post('descripcion'),
		'fecha' => $this->input->post('fecha'),
		'seccion' => $this->input->post('seccion')
		  );
		if($_FILES['imagen']['size']!=0){ 
			$imagen_temporal  = $_FILES['imagen']['tmp_name'];
			//$contenido=file_get_contents($_FILES['imagen']['tmp_name']);
			$tipo=$_FILES['imagen']['type'];
			$tamaño=$_FILES['imagen']['size'];
			$array_tipo=explode('/',$tipo);
			$fp     = fopen($imagen_temporal, 'r+b');
			$data2 = fread($fp, filesize($imagen_temporal));
			fclose($fp);
			
			if($this->form_validation->run() ==	FALSE || ($data['fecha'] < date("Y-m-d")) || ($tamaño > 16777215) || ($array_tipo[1]!='jpeg' && $array_tipo[1]!='jpg' && $array_tipo[1]!='png') ){
				$this->load->view('prueba/header');
				if($data['fecha'] < date("Y-m-d") ){
					$this->load->view('prueba/fecha_error');
				}
				if($array_tipo[1]!='jpeg' && $array_tipo[1]!='jpg' && $array_tipo[1]!='png'){
					$this->load->view('prueba/imagen_error');
				}
				if($tamaño > 16777215){
					$this->load->view('prueba/imagen_error2');
				}
				$this->load->view('prueba/gauchada');
			}
			else{
				$this->gauchada_model->pedir_gauchada($data,$mail,$data2,$array_tipo);
				$this->gauchada_model->restar_credito($mail);
				redirect('prueba/index?favorPedido');
				}	
		}
		else{
				if($this->form_validation->run() ==	FALSE || ($data['fecha'] < date("Y-m-d"))){
					$this->load->view('prueba/header');
					if($data['fecha'] < date("Y-m-d") ){
						$this->load->view('prueba/fecha_error');
				}
					$this->load->view('prueba/gauchada');
				}
			else{
				$this->gauchada_model->pedir_gauchada2($data,$mail);
				$this->gauchada_model->restar_credito($mail);
				redirect('prueba/index?favorPedido');
				}
			
			
		}
		

	}
	
	
	function verPerfil(){
		if(!$this->session->userdata('email')){
			redirect('prueba/index?noInicio');
		}		
		$this->load->view('prueba/header');
		$this->load->model('usuario_model');
		if(isset($_GET['email'])){
			$mail=$_GET['email'];
		}	
		$data70['query'] = $this->usuario_model->traerDatos($mail);
		$this->load->view('/prueba/perfil', $data70);		
		
	
		
	}
	
	function editarPerfil(){
		if(!$this->session->userdata('email')){
			redirect('prueba/index?noInicio');
		}	
		$this->load->view('prueba/header');
		$this->load->model('usuario_model');
		$mail=$this->session->userdata('email');
		
		$data07['query'] = $this->usuario_model->traerDatos($mail);
		$this->load->view('/prueba/editarPerfil', $data07);
		

	}
	function validarEditarP(){
		if(!$this->session->userdata('email')){
			redirect('prueba/index?noInicio');
		}
		$this->load->model('usuario_model');
		$this->form_validation->set_rules('nombre','Nombre','required|trim');
		$this->form_validation->set_rules('apellido','Apellido','required|trim');
		$this->form_validation->set_rules('clave','Clave','required|trim');
		$this->form_validation->set_rules('telefono','Teléfono','required|numeric|trim');
		$this->form_validation->set_rules('edad','Edad','required|numeric|trim|greater_than[0]|less_than[131]');
		
		if($this->form_validation->run() ==	FALSE){
			$this->load->view('prueba/header');
			$mail=$this->session->userdata('email');
			$data07['query'] = $this->usuario_model->traerDatos($mail);
			$this->load->view('prueba/editarPerfil', $data07 );
		}
		else{
			$this->load->model('usuario_model');
			$mail=$this->session->userdata('email');
			$data24 = array(
			'nombre' => $this->input->post('nombre'),
			'apellido' => $this->input->post('apellido'),
			'email'=> $mail,
			'clave' => $this->input->post('clave'),
			'telefono' => $this->input->post('telefono'),
			'edad' => $this->input->post('edad'),
			'idLocalidad' => $this->input->post('localidades')
		    );
			$this->usuario_model->editarDatos($data24);
			redirect('prueba/index?editPcorrecto');
		
		}
	}
	function editarGauchada(){
		if(!$this->session->userdata('email')){
			redirect('prueba/index?noInicio');
		}	
		$this->load->view('prueba/header');
		$this->load->model('traer_gauchada');
		$this->load->model('gauchada_model');
		if(isset($_GET['id'])){
			$id=$_GET['id'];
		}
		$data508['query'] = $this->gauchada_model->traerOfrecimientos($id);
		if($data508['query']!=null){
			redirect('prueba/index?tieneOfrecimientos');
		}		
		
		$data89['query'] = $this->traer_gauchada->mostrarGauchada1($id);
	
		$this->load->view('/prueba/editarGauchada', $data89);
		
		
	}
	function validarEditarG(){	
		$this->load->model('traer_gauchada');
		$this->load->model('gauchada_model');		
		
		if(!$this->session->userdata('email')){
			redirect('prueba/index?noInicio');
		}		
		$this->form_validation->set_rules('titulo','Título','required|max_length[50]');
		$this->form_validation->set_rules('descripcion','Descripción','required|max_length[3000]');

		$mail = $this->session->userdata('email');
		$data = array(
		'titulo' => $this->input->post('titulo'),
		'texto' => $this->input->post('descripcion'),
		'fecha' => $this->input->post('fecha'),
		'idSeccion' => $this->input->post('seccion'),
		'id' => $this->input->post('id')
		  );
		$id= $data['id']; 
						
		
		$data98['query'] = $this->traer_gauchada->mostrarGauchada1($id);  
		if($this->input->post('fecha')==''){
			$fecha=$data98['query'][0]->fecha;
			$data['fecha'] = $fecha;
		}
		if($_FILES['imagen']['size']!=0){ 
			$imagen_temporal  = $_FILES['imagen']['tmp_name'];
			//$contenido=file_get_contents($_FILES['imagen']['tmp_name']);
			$tipo=$_FILES['imagen']['type'];
			$tamaño=$_FILES['imagen']['size'];
			$array_tipo=explode('/',$tipo);
			$fp     = fopen($imagen_temporal, 'r+b');
			$data2 = fread($fp, filesize($imagen_temporal));
			fclose($fp);
			
			if($this->form_validation->run() ==	FALSE || ($data['fecha'] < date("Y-m-d")) || ($tamaño > 16777215) || ($array_tipo[1]!='jpeg' && $array_tipo[1]!='jpg' && $array_tipo[1]!='png') ){
				$this->load->view('prueba/header');
				if($data['fecha'] < date("Y-m-d") ){
					$this->load->view('prueba/fecha_error');
				}
				if($array_tipo[1]!='jpeg' && $array_tipo[1]!='jpg' && $array_tipo[1]!='png'){
					$this->load->view('prueba/imagen_error');
				}
				if($tamaño > 16777215){
					$this->load->view('prueba/imagen_error2');
				}
				$this->load->view('/prueba/editarGauchada', $data98);
			}
			else{
				$this->gauchada_model->modificar_gauchada($data,$data2,$array_tipo);
				redirect('prueba/index?gauchadaEditada');
				}	
		}
		else{
			if($this->form_validation->run() ==	FALSE || ($data['fecha'] < date("Y-m-d"))){
					$this->load->view('prueba/header');
					if($data['fecha'] < date("Y-m-d") ){
						$this->load->view('prueba/fecha_error');
				}
					$this->load->view('/prueba/editarGauchada', $data98);
				}
			else{
				if ($this->input->post('eliminarI')== 1){
					$this->gauchada_model->eliminar_imagen($data);
				}
				$this->gauchada_model->modificar_gauchada2($data);
				redirect('prueba/index?gauchadaEditada');
				}

			
		}
		
	}
	function eliminarGauchada(){
		//FALTA PREGUNTAR CRITERIOS DE ELIMINACION
		$id=$_GET['id'];
		$mail=$_GET['email'];
		$this->load->model('usuario_model');
		$this->load->model('gauchada_model');
		$this->db->select('*');
		$this->db->from('ofrecimientos');
		$this->db->where('idGauchada', $id);
		$consulta = $this->db->get();
		if($consulta->row()==''){
			$this->usuario_model->cargarCredito($mail);
		}
		$this->gauchada_model->eliminar_gauchada($id);
	}
	
	function validarComentario(){
		$this->form_validation->set_rules('comentario','Comentario','required');
		$this->load->model('comentario_model');
		
		if($this->form_validation->run() ==	FALSE){
			$this->load->view('prueba/header');
			$this->load->view('prueba/index');
		}
		else{
			$data88 = array(
			'comentario' => $this->input->post('comentario'),
			'email' => $this->input->post('idUsuarioActual'),
			'idGauchada'=> $this->input->post('idG')
			);
			$this->comentario_model->comentar($data88);
			$iddd=$this->input->post('idG');
			redirect('prueba/index?comentarioExitoso');
		}
	}

	function validarRespuesta(){
		$this->form_validation->set_rules('respuesta','Respuesta','required');
		$this->load->model('comentario_model');
		
		if($this->form_validation->run() ==	FALSE){
			redirect('prueba/index?respuestaVacio');
		}
		else{
			$data108 = array(
			'respuesta' => $this->input->post('respuesta'),
			);
			$idC=$this->input->post('idComentario');
			$this->comentario_model->responder($data108,$idC);
			redirect('prueba/index?respuestaExitosa');
		}
		
		
	}
	
	function ofrecer(){
		$idG=$_GET['id'];
		$this->load->model('gauchada_model');
		$mail = $this->session->userdata('email');
		$this->db->select('idUsuario');
		$this->db->from('usuario');
		$this->db->where('email', $mail);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		$idU= $resultado->idUsuario;

		$this->gauchada_model->ofrecer($idG,$idU);	
		redirect('prueba/index?ofrecimientoExitoso');
	}
	function verOfrecimientos(){
		if(!$this->session->userdata('email')){
			redirect('prueba/index?noInicio');
		}		
		$idG=$_GET['id'];
		$this->load->model('gauchada_model');
		$this->load->view('prueba/header');
		
		$data508['query'] = $this->gauchada_model->traerOfrecimientos($idG);
		if($data508['query']==null){
			redirect('prueba/index?noOfrecimientos');
		}

		$this->load->view('/prueba/verOfrecimientos', $data508);				
	}
	
	function aceptar(){
		$idO=$_GET['idO'];
		$idG=$_GET['idG'];
		$data188 = array(
			'aceptado' => 1
			);
		$this->db->where('idOfrecimiento', $idO);
        $this->db->update('ofrecimientos', $data188);

		$this->db->where('id', $idG);
        $this->db->update('gauchada', $data188);
		redirect('prueba/index?aceptado');
	}
	
	function pendientes(){
		$this->load->view('prueba/header');
		$this->load->model('gauchada_model');
		$data['query']=$this->gauchada_model->traerPendientes();
		$this->load->view('prueba/pendientes', $data);
	}
	
	function validarValoracion(){
		$valoracion = $_GET['valoracion'];
		$id = $this->input->get('idG');
		$this->load->model('usuario_model');
		$this->load->model('gauchada_model');
		$this->db->select('idUsuario');
		$this->db->from('ofrecimientos');
		$this->db->where('idGauchada', $id);
		$this->db->where('aceptado', '1');
		$consulta = $this->db->get();
		$resultado = $consulta->row();
		$idU = $resultado->idUsuario;
		
		$this->db->select('email');
		$this->db->from('usuario');
		$this->db->where('idUsuario', $idU);
		$consulta2 = $this->db->get();
		$resultado2 = $consulta2->row();
		$email = $resultado2->email;
		$this->gauchada_model->valorado($id);
		if ($valoracion == 1){
			$this->usuario_model->sumarPunto($idU);
			$this->usuario_model->cargarCredito($email);
		}
		if ($valoracion == 3) {
			$this->usuario_model->restarPunto($idU);
		}
		redirect('prueba/index?valorado');
	}
}
?>