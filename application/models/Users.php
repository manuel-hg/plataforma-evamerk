<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model {

	protected $table;
	protected $id;

	function __construct() {
		parent::__construct();
		$this->table = 'login_web';
		$this->id = 'id_login_web';
		$this->privilegios = 'id_privilegios';
	}
	function get($username='', $password='') {
		return $this->db->get_where(
			$this->table, array(
				'username' => $username,
				'password' => $password
			)
		)->row();
	}

}