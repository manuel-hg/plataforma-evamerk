<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdatos extends CI_Model  {

	public function Get_name(){
		$query = $this->db->query("SELECT CONCAT(nombre, ' ' , apellido) AS nombre_completo, nombre, img_usuario_web FROM usuario_web WHERE id_usuario_web=".$this->user->id_usuario_web);
		return $query->result_array();
	}

	public function Get_users_web(){	
		$query=$this->db->query("SELECT B.id_usuario_web, A.nombre, A.apellido, A.mail, C.nombre_puesto, A.img_usuario_web,B.username, B.password FROM usuario_web A RIGHT JOIN login_web B ON B.id_usuario_web=A.id_usuario_web INNER JOIN puesto C ON C.id_puesto= A.id_puesto");
		return $query->result_array();
	}

	public function Get_users_app(){	
		$query=$this->db->query("SELECT A.id_usuario_app, A.nombre, A.apellido, A.mail, A.puesto, A.img_usuario_app,B.username, B.password FROM usuario_app A INNER JOIN login_app B ON B.id_usuario_app=A.id_usuario_app");
		return $query->result_array();
	}

	public function Get_products(){
		$query=$this->db->query("SELECT A.sku,B.marca_producto,C.modelo_producto,A.descripcion FROM producto A INNER JOIN marca_producto B ON B.id_marca_producto=A.id_marca_producto INNER JOIN modelo_producto C ON C.id_modelo_producto=A.id_modelo_producto");
		return $query->result_array();
	}
	public function Get_stores()
	{
		$query=$this->db->query("SELECT * FROM `tiendas_usuario`");
		return $query->result_array();
	}
	public function Get_role()
	{
		$query=$this->db->query("SELECT A.id_rol_usuario,B.nombre,B.apellido,B.mail,C.estado,C.localidad,C.nombre_tienda from rol_usuario A INNER JOIN usuario_app B ON B.id_usuario_app=A.id_usuario_app INNER JOIN tiendas_usuario C ON C.id_tiendas_usuario=A.id_tiendas_usuario");
		return $query->result_array();
	}
	public function Get_job()
	{
		$query=$this->db->query("SELECT id_puesto,nombre_puesto from puesto");
		return $query->result_array();
	}	
	public function Get_brand()
	{
		$query=$this->db->query("SELECT id_marca_producto,marca_producto from marca_producto ORDER BY marca_producto ");
		return $query->result_array();
	}
	public function Get_model()
	{
		$query=$this->db->query("SELECT id_modelo_producto,modelo_producto from modelo_producto ORDER BY modelo_producto ");
		return $query->result_array();
	}

	public function Set_users_web($id_usuario_web)
	{
		$query=$this->db->query("SELECT A.id_usuario_web, A.nombre, A.apellido, A.mail, A.id_puesto,C.nombre_puesto, A.img_usuario_web,B.username, B.password FROM usuario_web A INNER JOIN login_web B ON B.id_usuario_web=A.id_usuario_web INNER JOIN puesto C ON C.id_puesto= A.id_puesto WHERE A.id_usuario_web=".$id_usuario_web);
		return $query->result_array();
	}

	public function Set_users_app($id_usuario_app)
	{
		$query=$this->db->query("SELECT A.id_usuario_app, A.nombre, A.apellido, A.mail, A.puesto, A.img_usuario_app,B.username, B.password FROM usuario_app A INNER JOIN login_app B ON B.id_usuario_app=A.id_usuario_app WHERE A.id_usuario_app=".$id_usuario_app);
		return $query->result_array();
	}
	public function Count_stores()
	{
		$query=$this->db->query("SELECT * FROM tiendas_usuario");
		return $query->result_array();
	}

	public function Get_register_capture()
	{
		$query=$this->db->query("SELECT a.id_registros_app,a.fecha,a.hora,b.nombre,b.apellido,c.nombre_tienda,a.sku,a.inventario_inicial,a.inventario_final,a.resurtido,a.ventas,a.precio,a.comentarios, a.direccion,d.img_path from registros_app a INNER JOIN usuario_app b on b.id_usuario_app=a.id_usuario_app INNER JOIN tiendas_usuario c on c.id_tiendas_usuario=a.id_tienda_usuario INNER JOIN img_registros_app d ON d.id=a.id_registros_app");
		return $query->result_array();
	}
	public function Get_register_mapeo()
	{
		$query=$this->db->query("SELECT a.id_registros_comparacion,a.fecha,a.hora,b.nombre,b.apellido,c.nombre_tienda,a.sku,a.precio,a.sku_comp,a.marca_comp,a.modelo_comp,a.desc_comp,a.precio_comp,d.img_path,a.direccion from registros_comparacion a INNER JOIN usuario_app b ON b.id_usuario_app=a.id_usuario_app INNER JOIN tiendas_usuario c ON c.id_tiendas_usuario=a.id_tienda_usuario INNER JOIN img_registros_comparacion d ON d.id=a.id_registros_comparacion");
		return $query->result_array();
	}

	public function Set_stores_user($id_tiendas_usuario)
	{
		$query=$this->db->query("SELECT estado,localidad,nombre_tienda FROM tiendas_usuario WHERE id_tiendas_usuario=".$id_tiendas_usuario);
		return $query->result_array();
	}

	public function set_products_user($sku){
		$query=$this->db->query("SELECT A.sku,A.id_marca_producto,B.marca_producto,A.id_modelo_producto,C.modelo_producto,A.descripcion FROM producto A INNER JOIN marca_producto B ON A.id_marca_producto=B.id_marca_producto INNER JOIN modelo_producto C ON A.id_modelo_producto=C.id_modelo_producto WHERE sku='$sku'");
		return $query->result_array();

	}
	public function set_role($idrol)
	{
		$query=$this->db->query("SELECT A.id_rol_usuario,A.id_tiendas_usuario,A.id_usuario_app,B.nombre,B.apellido,B.mail,C.estado,C.localidad,C.nombre_tienda from rol_usuario A INNER JOIN usuario_app B ON B.id_usuario_app=A.id_usuario_app INNER JOIN tiendas_usuario C ON C.id_tiendas_usuario=A.id_tiendas_usuario WHERE id_rol_usuario=".$idrol);
		return $query->result_array();
	}

	public function Get_privileges(){
		$this->db->select('id_privilegios');
		$this->db->from('login_web');
		$this->db->where('id_usuario_web',$this->user->id_usuario_web);
		$sql=$this->db->get();
		return $sql->row();
	}
}
