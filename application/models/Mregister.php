<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Mregister extends CI_Model {

	public function register_usuarios_web($name,$lastname,$mail,$ocupation,$img,$username,$password)
	{
		$data=array(
			'nombre' => $name,
			'apellido' => $lastname,
			'mail' => $mail,
			'id_puesto' => $ocupation,
			'img_usuario_web' => $img);
		$this->db->insert('usuario_web',$data);
		$last_id = $this->db->insert_id();
		$datax=array(
			'username' => $username,
			'password' => $password,
			'id_usuario_web' => $last_id);
		$this->db->insert('login_web',$datax);
	}

	public function delete_usuarios_web($id_usuario_web)
	{
		$this->db->where('id_usuario_web', $id_usuario_web);
		$this->db->delete('usuario_web');
		$this->db->where('id_usuario_web', $id_usuario_web);
		$this->db->delete('login_web');
	}

	public function delete_usuarios_app($id_usuario_app)
	{
		$this->db->where('id_usuario_app', $id_usuario_app);
		$this->db->delete('usuario_app');
		$this->db->where('id_usuario_app', $id_usuario_app);
		$this->db->delete('login_app');
	}


	public function update_usuarios_web($datos){
		$data = array(
	        'nombre' => $datos['nombre'],
	        'apellido' => $datos['apellido'],
	        'mail' => $datos['email'],
	        'id_puesto' => $datos['puesto']
		);
		$this->db->where('id_usuario_web', $datos['id_usuario']);
		$this->db->update('usuario_web', $data);
		$usernam=$datos['usuario'];
		$this->db->set('username',$usernam);
		$this->db->where('id_usuario_web', $datos['id_usuario']);
		$this->db->update('login_web');
	}

	public function insert_usuario_app($datosApp,$datosAppLogin){
		$this->db->insert('usuario_app',$datosApp);
		$last_id = $this->db->insert_id();
		$datax=array(
			'username' => $datosAppLogin["username"],
			'password' => $datosAppLogin["password"],
			'id_usuario_app' => $last_id);
		$this->db->insert('login_app',$datax);
	}

	public function update_usuarios_app($idUsuarioApp,$datosApp,$usernam){
		$this->db->where('id_usuario_app', $idUsuarioApp);
		$this->db->update('usuario_app', $datosApp);
		$this->db->set('username',$usernam);
		$this->db->where('id_usuario_app', $idUsuarioApp);
		$this->db->update('login_app');
	}

	public function insert_store($datos)
	{
		$this->db->insert('tiendas_usuario',$datos);
	}
	public function update_store($datos)
	{
		$data = array(
			'id_tiendas_usuario' => $datos['id_tiendas_usuario'],
			'estado' => $datos['estado'],
			'localidad' => $datos['localidad'],
			'nombre_tienda' => $datos['nombre_tienda']
		);
		$this->db->where('id_tiendas_usuario', $data['id_tiendas_usuario']);
		$this->db->update('tiendas_usuario', $data);
	}

	public function delete_store($id_tiendas_usuario)
	{
		$this->db->where('id_tiendas_usuario', $id_tiendas_usuario);
		$this->db->delete('tiendas_usuario');
	}

	public function insert_marca($marca)
	{
		$this->db->set('marca_producto',$marca);
		$this->db->insert('marca_producto');
	}

	public function insert_modelo($modelo)
	{
		$this->db->set('modelo_producto',$modelo);
		$this->db->insert('modelo_producto');
	}
	public function insert_product($datos)
	{
		$this->db->insert('producto',$datos);
	}

	public function insert_rol($datos)
	{
		$this->db->insert('rol_usuario',$datos);
	}

	public function delete_product($idproduct)
	{
		$this->db->where('sku', $idproduct);
		$this->db->delete('producto');
	}

	public function delete_rol($idrol)
	{
		$this->db->where('id_rol_usuario', $idrol);
		$this->db->delete('rol_usuario');
	}

	public function update_product($datos)
	{
		$this->db->where('sku', $datos['sku']);
		$this->db->update('producto', $datos);
	}

	public function update_rol($datos)
	{
		$this->db->where('id_rol_usuario', $datos['id_rol_usuario']);
		$this->db->update('rol_usuario', $datos);
	}
}
?>
