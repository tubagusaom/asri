<?php
class Karyawan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('mlogin');
	}
	function index(){
	if($this->session->userdata('akses')=='1' | $this->session->userdata('akses')=='3'){
		     $jum=$this->mlogin->count_event();
            $page=$this->uri->segment(4);
            if(!$page):
            $offset = 0;
             else:
            $offset = $page;
            endif;
            $limit=4;
            $config['base_url'] = base_url() . 'backend/karyawan/index/';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 4;
            $config['first_link'] = 'Awal';
            $config['last_link'] = 'Akhir';
						$config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        
            $this->pagination->initialize($config);
            $x['page'] =$this->pagination->create_links();
			$x['karyawan'] = $this->mlogin->karyawan($offset,$limit);

            $id_admin=$this->session->userdata('idadmin');
            $q=$this->db->query("SELECT * FROM admin WHERE idadmin='$id_admin'");
            $data['admin_detail']=$q->row_array();
                        
            $this->load->view('template/header');
            $this->load->view('template/menu',$data);
			$this->load->view('front/v_karyawan',$x);
            $this->load->view('template/footer');


		}else{
			redirect('administrator');
		}

	}

    function search(){
	$keyword = $this->input->post('keyword');
	$data['sorting']=$this->mlogin->get_karyawan_keyword($keyword);
	$this->load->view('front/search_karyawan',$data);
	}
}
