<?php
class Post extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };

		$this->load->library('terabytee');
		$this->load->model('mberita');
	}

	function index(){

		// var_dump($this->session->userdata('akses')); die();
		// var_dump($this->auth->is_logged_in()); die();

		if($this->session->userdata('akses')=='0' | $this->session->userdata('akses')=='1' | $this->session->userdata('akses')=='3'){

			if($this->session->userdata('is_active')=='1'){

				$jum=$this->mberita->count_berita();
				$page=$this->uri->segment(4);

				if(!$page):
					$offset = 0;
					else:
					$offset = $page;
				endif;
					$limit=4;
					$config['base_url'] = base_url() . 'backend/post/index';
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

				$x['data_berita']=$this->mberita->get_news($offset,$limit);
				$berita = $x['data_berita'];
				$x['berita']=$this->terabytee->limit_words($berita,10);
				
				$x['berita_pengumuman']=$this->mberita->berita_pengumuman($limit);
				$berita_p = $x['berita_pengumuman'];
				$x['limit_pengumuman']=$this->terabytee->limit_words($berita_p,10);

				$x['berita_information']=$this->mberita->berita_information($limit);
				$berita_i = $x['berita_information'];
				$x['limit_information']=$this->terabytee->limit_words($berita_i,10);
				
				$id_admin=$this->session->userdata('idadmin');
				$q=$this->db->query("SELECT * FROM admin WHERE idadmin='$id_admin'");
				$data['admin_detail']=$q->row_array();

				// var_dump($x['berita']); die();

				$this->load->view('template/header');
				$this->load->view('template/menu',$data);
				$this->load->view('front/v_post',$x);
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

	function detail_berita(){
		$kode=$this->uri->segment(4);
		$x['com']=$this->mberita->get_all_coments($kode);
		$x['news']=$this->mberita->getberita($kode);
		$this->load->view('front/v_detail_news',$x);
	}

	function simpan_det_pesan(){
		$user=$this->session->userdata('username');
		$gambar=$this->session->userdata('photo');
		$kode=str_replace("'", "", $this->input->post('kode',TRUE));
		$pesan=str_replace("'", "", $this->input->post('pesan',TRUE));
		$simpan=$this->mberita->simpandetpesan($user,$pesan,$gambar,$kode);

		if($simpan){
			echo $this->session->set_flashdata('msg','success');
			redirect("backend/post/detail_berita/$kode");
		}else{
			echo $this->session->set_flashdata('msg','warning');
			redirect("backend/post/detail_berita/$kode");
        }
	}

	function search(){
		$keyword = $this->input->post('keyword');
		$data['sorting']=$this->mberita->get_berita_keyword($keyword);

		$this->load->view('front/search_berita',$data);
	}


}