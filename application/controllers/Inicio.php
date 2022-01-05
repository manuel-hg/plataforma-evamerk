<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inicio extends Private_Controller
{
	function __construct(){
        parent:: __construct();
        $this->load->model('mdatos');
    }

	public function index() {
		/*
			Si no esta logueado lo redirigmos al formulario de login.
		*/
		if(!@$this->user) redirect ('Inicio/login');

		redirect ('Home');
	}

	public function respaldo()
	{
		$data['datos']=$this->mdatos->Get_name();		
		$this->load->view('respaldo',$data);
	}

	public function login() {

		$data = array();

		// Añadimos las reglas necesarias.
		$this->form_validation->set_rules('usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		// Generamos el mensaje de error personalizado para la accion 'required'
		$this->form_validation->set_message('required', 'El campo %s es requerido.');

		// Si no esta vacio $_POST
		if(!empty($_POST)) {
			// Si las reglas se entramos a la condicion.
			if ($this->form_validation->run() == TRUE) {
				
				// Obtenemos la informacion del usuario desde el modelo users.
				$logged_user = $this->users->get($_POST['usuario'], md5($_POST['password']));

				// Si existe el usuario creamos la sesion y redirigimos al index.
				if($logged_user) {
					$this->session->set_userdata('logged_user', $logged_user);
					redirect('inicio/index');
				} else {
					// De lo contrario se activa el error_login.
					$data['error_login'] = TRUE;
				}
			}
		}
		
		$this->load->view('inicio', $data);
	}

	public function logout() {
		$this->session->unset_userdata('logged_user');
		redirect('inicio/index');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */