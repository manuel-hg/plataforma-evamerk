<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends Private_controller {
	function __construct(){
        parent:: __construct();
        $this->load->model('mdatos');   
        $this->load->model('mregister');
    }


	public function register_usuarios_web()
		{
			$name=$this->input->post("nombre");
			$lastname=$this->input->post("apellido");
			$mail=$this->input->post("email");
			$position=$this->input->post("puesto");
			$username=$this->input->post("usuario");
			$password=md5($this->input->post("password"));
			if($position==0){
				$this->form_validation->set_message('puesto','es necesario uno');
			}	
			$this->form_validation->set_rules('nombre', 'Nombre', 'required');
			$this->form_validation->set_rules('apellido', 'Apellido', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('puesto', 'Puesto', 'required');
			$this->form_validation->set_rules('usuario', 'Usuario', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_message('required', '%s es requerido.');
			if ($this->form_validation->run() == FALSE) {
				$data['datos']=$this->mdatos->Get_name();	
				$data['usuarios']=$this->mdatos->Get_users_web();
				$data['puesto']=$this->mdatos->Get_job();
				$this->load->view('usuarios_web',$data);
				echo  "<script type='text/javascript'>         	
	        	alert('Ha ocurrido un error, trate de nuevo!');	        	
	        	</script>' ";
			}else{
				$destino='assets/img/usuarios/'.$_FILES["archivo"]["name"][0];
				$img=$destino;
				if(move_uploaded_file($_FILES["archivo"]["tmp_name"][0],$destino) ) {
					$this->mregister->register_usuarios_web($name,$lastname,$mail,$position,$img,
					$username,$password);
	        	$this->session->set_flashdata('msg', '<script type="text/javascript">alert("Usuario insertado correctamente");</script>');
					}
				else{
			    $this->session->set_flashdata('msg-error', '<script type="text/javascript">alert("Ha ocurrido un error");</script>');
				}
			}
			redirect('usuarios_web');
	}	


	public function register_usuarios_app()
	{
		$datosApp["nombre"]=$this->input->post("nombre-app");
		$datosApp["apellido"]=$this->input->post("apellido-app");
		$datosApp["mail"]=$this->input->post("email-app");
		$datosApp["puesto"]=$this->input->post("puesto");
		$datosAppLogin["username"]=$this->input->post("usuario-app");
		$datosAppLogin["password"]=$this->input->post("password-app");
		$servidor="http://evamerk.bartecmx.com.mx";
		$destino=$servidor.'/usuarios/app/'.$_FILES["archivoApp"]["name"][0];
		$datosApp["img_usuario_app"]=$destino;
		$destino="usuarios/app/".$_FILES["archivoApp"]["name"][0];
		if(move_uploaded_file($_FILES["archivoApp"]["tmp_name"][0],$destino) ) {
			$this->mregister->insert_usuario_app($datosApp,$datosAppLogin);
			redirect('usuarios_app');
		}
		else{
			$reg="<script type='text/javascript'>alert('Ha ocurrido un error');</script>";
	    	echo  json_encode($reg);
		}
			
	}	

	public function update_user_app(){
		$idUsuarioApp=$this->input->post("iduser");
		$datosApp["nombre"]=$this->input->post("nombre-app");
		$datosApp["apellido"]=$this->input->post("apellido-app");
		$datosApp["mail"]=$this->input->post("email-app");
		$datosApp["puesto"]=$this->input->post("puesto");
		$usernam=$this->input->post("usuario-app");
		$this->mregister->update_usuarios_app($idUsuarioApp,$datosApp,$usernam);
		redirect('usuarios_app');
	}

	public function insert_store()
	{
		$datostore["estado"]=$this->input->post("estado");
		$datostore["localidad"]=$this->input->post("localidad");
		$datostore["nombre_tienda"]=$this->input->post("tienda");
		$this->mregister->insert_store($datostore);
	}

	public function update_store()
	{
		$datostore['id_tiendas_usuario']=$this->input->post("idstore");
		$datostore["estado"]=$this->input->post("estado");
		$datostore["localidad"]=$this->input->post("localidad");
		$datostore["nombre_tienda"]=$this->input->post("tienda");
		$this->mregister->update_store($datostore);
		redirect('tiendas');
	}

	public function insert_marca()
	{
		$marca=$this->input->post("marcam");
		$marca = strtoupper($marca);
		$this->mregister->insert_marca($marca);
		redirect("productos#modal_products");
	}
	public function insert_modelo()
	{
		$modelo=$this->input->post("modelom");
		$modelo = strtoupper($modelo);
		$this->mregister->insert_modelo($modelo);
		redirect("productos#modal_products");
	}
	public function insert_product()
	{
		$datos['sku']=$this->input->post("sku");
		$datos['id_marca_producto']=$this->input->post("marca");
		$datos['id_modelo_producto']=$this->input->post("modelo");
		$datos['descripcion']=$this->input->post("descripcion");
		$this->mregister->insert_product($datos);
		redirect('productos');
	}

	public function insert_rol()
	{
		$datos['id_usuario_app']=$this->input->post("usuario_rol");
		$datos['id_tiendas_usuario']=$this->input->post("tienda_rol");
		$this->mregister->insert_rol($datos);
		redirect("roles");
	}
	public function update_product()
	{
		$datos['sku']=$this->input->post("sku");
		$datos['id_marca_producto']=$this->input->post("marca");
		$datos['id_modelo_producto']=$this->input->post("modelo");
		$datos['descripcion']=$this->input->post("descripcion");
		$this->mregister->update_product($datos);
		redirect('productos');
	}

	public function update_rol()
	{
		$datos['id_rol_usuario']=$this->input->post("idrol");
		$datos['id_usuario_app']=$this->input->post("usuario_rol");
		$datos['id_tiendas_usuario']=$this->input->post("tienda_rol");
		$this->mregister->update_rol($datos);
		redirect("roles");
	}

}