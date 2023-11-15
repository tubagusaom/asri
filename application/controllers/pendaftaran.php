<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pendaftaran extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('mpendaftaran');
        $this->load->model('mberita');
				$this->load->library('upload');
    }
	public function index()
	{
        $x['paket']=$this->mberita->paket_footer();
        $x['berita']=$this->mberita->berita_footer();
        $x['photo']=$this->mberita->get_photo();

		$this->load->view('front/v_pendaftaran',$x);
}

	function kirim_pesan(){
        $nama=str_replace("'", "", $this->input->post('xnama',TRUE));
				$password=str_replace("'", "", $this->input->post('xpassword',TRUE));
        $email=str_replace("'", "", $this->input->post('xemail',TRUE));
        $kontak=str_replace("'", "", $this->input->post('xkontak',TRUE));
        $kelamin=str_replace("'", "", $this->input->post('xkelamin',TRUE));
				$alamat=str_replace("'", "", $this->input->post('xalamat',TRUE));
        $this->mpendaftaran->kirim_pesan($nama,$password,$email,$kontak,$kelamin,$alamat);
        echo $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert"><span class="fa fa-close"></span></button> Terima kasih telah mendaftar, silahkan cek email anda dan verifikasi link dari kami</div>');
        redirect('Pendaftaran');
    }
}
