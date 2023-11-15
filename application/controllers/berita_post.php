<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Berita_post extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('mberita');
    }
	public function index()
	{
        $x['paket']=$this->mberita->paket_footer();
        $x['berita']=$this->mberita->berita_footer();
        $x['photo']=$this->mberita->get_photo();
		$jum=$this->mberita->count_berita();
        $page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=3;
        $config['base_url'] = base_url() . 'berita_post/index/';
            $config['total_rows'] = $jum->num_rows();
            $config['per_page'] = $limit;
            $config['uri_segment'] = 3;
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
		$x['news']=$this->mberita->get_berita($offset,$limit);
        $x['brt']=$this->mberita->tampil_berita();
		$this->load->view('front/v_berita',$x);
	}
	function detail_berita(){
        $x['paket']=$this->mberita->paket_footer();
        $x['berita']=$this->mberita->berita_footer();
        $x['photo']=$this->mberita->get_photo();
		$kode=$this->uri->segment(3);
        $this->db->query("UPDATE berita SET views=views+1 WHERE idberita='$kode'");
		$x['brt']=$this->mberita->tampil_berita();
		$x['news']=$this->mberita->getberita($kode);
		$this->load->view('front/v_detail_berita',$x);
	}

	function search(){
	$keyword = $this->input->post('keyword');
	$data['sorting']=$this->mberita->get_berita_keyword($keyword);
	$data['paket']=$this->mberita->paket_footer();
	$data['brt']=$this->mberita->tampil_berita();
	$this->load->view('front/search_berita',$data);
	}

}
