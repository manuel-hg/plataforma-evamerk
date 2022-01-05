<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informes extends Private_controller
{
	   function __construct(){
	   parent:: __construct();
        if(!$this->session->userdata('logged_user')){
            redirect('Inicio/login');
        }
        $this->load->model('mdatos');
    }

    public function index()
    {
    	$data['datos']=$this->mdatos->Get_name();		
    	$data['registros']=$this->mdatos->Get_register_capture();
		$this->load->view('data/Informe',$data);
    }

    public function mapeos()
    {
        $data['datos']=$this->mdatos->Get_name();       
        $data['registros']=$this->mdatos->Get_register_mapeo();
        $this->load->view('data/mapeo',$data);
    }

}

?>