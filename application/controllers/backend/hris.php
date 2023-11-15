<?php
class Hris extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        
	}

	function index(){
		if($this->session->userdata('akses')=='1' | $this->session->userdata('akses')=='3'){

				$id_admin=$this->session->userdata('idadmin');
				$q=$this->db->query("SELECT * FROM admin WHERE idadmin='$id_admin'");
				$data['admin_detail']=$q->row_array();
						
				$this->load->view('template/header');
				$this->load->view('template/menu',$data);
				$this->load->view('front/v_hris');
		        $this->load->view('template/footer');

		}else{
			redirect('administrator');
		}



	}




}
