<?php
class Library extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        $this->load->model('m_kontak');
        $this->load->model('mpengguna');
        	$this->load->library('upload');
		$this->load->helper('download');
	}

	function index(){
		if($this->session->userdata('akses')=='0' | $this->session->userdata('akses')=='1' | $this->session->userdata('akses')=='3'){
                $x['library']=$this->m_kontak->kat_library();

                $id_admin=$this->session->userdata('idadmin');
	            $q=$this->db->query("SELECT * FROM admin WHERE idadmin='$id_admin'");
	            $data['admin_detail']=$q->row_array();
	                        
	            $this->load->view('template/header');
	            $this->load->view('template/menu',$data);
				$this->load->view('front/v_library',$x);
				$this->load->view('template/footer');


		}else{
			redirect('administrator');
		}
	}
	
	function kategori_library(){
    	$kode=$this->uri->segment(4);
	     $x['event']=$this->m_kontak->getlibrary($kode);
	     $x['kat']=$kode;
	    $this->load->view('front/v_detail_library',$x);
	}
	
	function download(){
		$id=$this->uri->segment(4);
		$get_db=$this->mpengguna->get_file_byid($id);
		$q=$get_db->row_array();
		$file=$q['file_data'];
		$path='./assets/files/'.$file;
		$data =  file_get_contents($path);
		$name = $file;

		force_download($name, $data); 
		redirect('backend/library');
	}
	
	function detail_library(){
    	$kode=$this->input->post('kategori');
	    $x['event']=$this->m_kontak->getlibrary($kode);
	    $this->load->view('front/v_detail_library',$x);
	}

    function search(){
	$keyword = $this->input->post('keyword');
	$data['sorting']=$this->m_kontak->get_library_keyword($keyword);
	$this->load->view('front/search_library',$data);
	}

}
