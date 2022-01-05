<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Private_controller
{
	function __construct(){
        parent:: __construct();
        if(!$this->session->userdata('logged_user')){
            redirect('Inicio/login');
        }
        $this->load->model('mdatos');
         $this->load->model('mregister');
                
    }
	public function index()
	{
		$data['datos']=$this->mdatos->Get_name();		
		$this->load->view('Home',$data);

	}
	public function usuarios_web()
	{
		$data['datos']=$this->mdatos->Get_name();	
		$data['usuarios']=$this->mdatos->Get_users_web();
		$data['puesto']=$this->mdatos->Get_job();
		$this->load->view('usuarios_web',$data);
	}
	public function usuarios_app()
	{
		$data['datos']=$this->mdatos->Get_name();	
		$data['usuarios']=$this->mdatos->Get_users_app();
		$this->load->view('usuarios_app',$data);
	}
	public function productos()
	{
		$data['datos']=$this->mdatos->Get_name();	
		$data['products']=$this->mdatos->Get_products();
		$data['marca']=$this->mdatos->Get_brand();
		$data['modelo']=$this->mdatos->Get_model();
		$this->load->view('products',$data);
	}
	
	public function tiendas()
	{
		$data['datos']=$this->mdatos->Get_name();	
		$data['stores']=$this->mdatos->Get_stores();
		$data['data_count']=$this->mdatos->Count_stores();
		$this->load->view('stores',$data);
	}
	public function roles()
	{
		$data['datos']=$this->mdatos->Get_name();	
		$data['role']=$this->mdatos->Get_role();
		$data['stores']=$this->mdatos->Get_stores();
		$data['usuarios']=$this->mdatos->Get_users_app();
		$this->load->view('role',$data);
	}
	public function set_usuarios_web()
	{
		$id_usuario_web=$this->input->post("id_usuario_web");
		$result_usuario_web=$this->mdatos->Set_users_web($id_usuario_web);
		echo json_encode($result_usuario_web);
	}

	public function set_user_app(){
		$id_usuario_app=$this->input->post("id_usuario_app");
		$result_usuario_app=$this->mdatos->Set_users_app($id_usuario_app);

		echo json_encode($result_usuario_app);
	}
	public function delete_usuarios_web()
	{
		$id_usuario_web=$this->input->post("id_usuario_web");
		$this->mregister->delete_usuarios_web($id_usuario_web);
	}

	public function delete_usuarios_app()
	{
		$id_usuario_app=$this->input->post("id_usuario_app");
		$this->mregister->delete_usuarios_app($id_usuario_app);
	}

	public function puesto(){
		$puestos=$this->mdatos->Get_job();
		echo json_encode($puestos);
	}

	public function update_usuario_web(){
		$datos['id_usuario']=$this->input->post("iduser");
		$datos['nombre']=$this->input->post("nombre");
		$datos['apellido']=$this->input->post("apellido");
		$datos['email']=$this->input->post("email");
		$datos['usuario']=$this->input->post("usuario");
		$datos['puesto']=$this->input->post("puesto");
		$this->mregister->update_usuarios_web($datos);
		redirect('usuarios_web');
	}

	public function set_stores_user(){
		$id_tiendas_usuario=$this->input->post("idstore");
		$result_tiendas_usuario=$this->mdatos->Set_stores_user($id_tiendas_usuario);
		echo json_encode($result_tiendas_usuario);
	}
	public function delete_store()
	{
		$id_tiendas_usuario=$this->input->post("idstore");
		$this->mregister->delete_store($id_tiendas_usuario);
	}

	public function set_products_user(){
		$idproduct=$this->input->post("idproduct");
		$result_productos_user=$this->mdatos->set_products_user($idproduct);
		echo json_encode($result_productos_user);
	}

	public function delete_producto()
	{
		$idproduct=$this->input->post("idproduct");
		$this->mregister->delete_product($idproduct);
	}

	public function set_role()
	{
		$idrol=$this->input->post("idrol");
		$result_rol=$this->mdatos->set_role($idrol);
		echo json_encode($result_rol);	
	}

	public function delete_rol()
	{
		$idrol=$this->input->post("idrol");
		$this->mregister->delete_rol($idrol);
	}

	public function marca()
	{
		$marca=$this->mdatos->Get_brand();
		echo json_encode($marca);
	}
	public function modelo()
	{
		$modelo=$this->mdatos->Get_model();
		echo json_encode($modelo);
	}	
	public function stores()
	{
		$tiendas=$this->mdatos->Get_Stores();
		echo json_encode($tiendas);
	}

	public function users_app()
	{
		$usuarios=$this->mdatos->Get_users_app();
		echo json_encode($usuarios);
	}

}

?>
