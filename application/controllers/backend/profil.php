<?php
class Profil extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        $this->load->model('m_kontak');
	}

	function index(){
	    if($this->session->userdata('akses')=='1' | $this->session->userdata('akses')=='3'){
				
				$id_admin=$this->session->userdata('idadmin');
				$q=$this->db->query("SELECT * FROM admin WHERE idadmin='$id_admin'");
				$data['admin_detail']=$q->row_array();
						
				$this->load->view('template/header');
				$this->load->view('template/menu',$data);
				$this->load->view('front/v_profil');
				$this->load->view('template/footer');

		}else{
			redirect('administrator');
		}



	}

		function update_profil(){

				$kode=$this->input->post('kode');


				$pass=str_replace("'", "", $this->input->post('pass',TRUE));
				$hp=str_replace("'", "", $this->input->post('hp',TRUE));



				$this->m_kontak->update_profil($kode,$pass,$hp);
				echo $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Terima kasih anda telah merubah data</div>');
				redirect('backend/profil');
				}



}
