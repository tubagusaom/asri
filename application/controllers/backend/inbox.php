<?php
class Inbox extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_kontak');
		$this->load->model('mberita');
			$this->load->library('upload');
	}

	function index(){
		if($this->session->userdata('akses')=='1' | $this->session->userdata('akses')=='3'){
				if($this->session->userdata('is_active')=='1'){
				    $jum=$this->m_kontak->count_event();
            $page=$this->uri->segment(4);
            if(!$page):
            $offset = 0;
             else:
            $offset = $page;
            endif;
            $limit=4;
            $config['base_url'] = base_url() . 'backend/inbox/index/';
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

						$x['pesan']=$this->m_kontak->get_all_inboxdepan($offset,$limit);

						$id_admin=$this->session->userdata('idadmin');
			            $q=$this->db->query("SELECT * FROM admin WHERE idadmin='$id_admin'");
			            $data['admin_detail']=$q->row_array();
			                        
			            $this->load->view('template/header');
			            $this->load->view('template/menu',$data);
						$this->load->view('front/v_inbox',$x);
            			$this->load->view('template/footer');

				}else{
					echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button>Maaf Anda Tidak Bisa Login <br> Karena Email Anda Belum Terverifikasi:</div>');
						redirect('administrator');
					}
			}else{
					echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button>Username Atau Password:</div>');
						redirect('administrator');
			}
	}

  function simpan_pesan(){
        $config['upload_path'] = './web/images/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->upload->initialize($config);
	    if(!empty($_FILES['gambar']['name'])){
	        if ($this->upload->do_upload('gambar')){
	        	$gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./web/images/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;

	            $config['new_image']= './web/images/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $gambar=$gbr['file_name'];
		$user=$this->session->userdata('username');
		$judul=str_replace("'", "", $this->input->post('judul',TRUE));
 	 	$pesan=str_replace("'", "", $this->input->post('pesan',TRUE));
		$this->m_kontak->simpanpesan($user,$pesan,$gambar,$judul);
		echo $this->session->set_flashdata('msg','success');
		redirect('backend/inbox');
	        }else{
            echo $this->session->set_flashdata('msg','warning');
            redirect('backend/inbox');
        }

        }else{
            redirect('backend/inbox');
        }
   }

   function simpan_det_pesan(){
		$user=$this->session->userdata('username');
		$gambar=$this->session->userdata('photo');
		$kode=str_replace("'", "", $this->input->post('kode',TRUE));
 	 	$pesan=str_replace("'", "", $this->input->post('pesan',TRUE));
		$simpan=$this->m_kontak->simpandetpesan($user,$pesan,$gambar,$kode);
		if($simpan){
		echo $this->session->set_flashdata('msg','success');
		redirect("backend/inbox/detail_inbox/$kode");
	        }else{
            echo $this->session->set_flashdata('msg','warning');
           redirect("backend/inbox/detail_inbox/$kode");
        }


   }

   function detail_inbox(){
    	$kode=$this->uri->segment(4);

    	$x['com']=$this->m_kontak->get_all_coments($kode);
	    $x['inbox']=$this->mberita->getinbox($kode);
	    $this->load->view('front/v_detail_inbox',$x);
	}

	function search(){
		$keyword = $this->input->post('keyword');
		$data['sorting']=$this->mberita->get_inbox_keyword($keyword);

		$this->load->view('front/search_inbox',$data);
	}
}
