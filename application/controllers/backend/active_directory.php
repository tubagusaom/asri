<?php
class Active_directory extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        
        $this->load->library('adldap');
        $this->load->library('terabytee');
		$this->load->model('m_active_directory');
	}

    function index() {
        if($this->session->userdata('akses') == '0' | $this->session->userdata('akses') == '1' | $this->session->userdata('akses') == '3'){
            if($this->session->userdata('is_active')=='1'){
                

                $id_admin=$this->session->userdata('idadmin');
				$q=$this->db->query("SELECT * FROM admin WHERE idadmin='$id_admin'");
				$data['admin_detail']=$q->row_array();

                // var_dump($this->auth->is_logged_in()); die();
						
				$this->load->view('template/header');
				$this->load->view('template/menu',$data);	
		        $this->load->view('front/v_active_directory');
		        $this->load->view('template/footer');
            } else {
                echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button>Maaf Anda Tidak Bisa Login <br> Karena Email Anda Belum Terverifikasi:</div>');
                redirect('administrator');
            }
        }else{
	        echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button>Username Atau Password:</div>');
            redirect('administrator');
	    }

    }

    function auth_ad() {
        // var_dump('auth'); die();

        $this->adldap->connect();
    }

}